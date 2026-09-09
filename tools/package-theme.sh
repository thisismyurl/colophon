#!/usr/bin/env bash
# package-theme.sh — build a WordPress.org distribution zip for Colophon.
#
# Usage:
#   bash package-theme.sh <slug>
#
#   slug      The theme slug (= WP.org text domain / zip root dir name).
#             This is also the GitHub repo name — published theme repos are
#             named for the theme alone (thisismyurl/quillwork).
#
# Colophon carries no self-updater and ships to WordPress.org only, so there
# is one build, not a --wporg/--github choice. (Earlier revisions offered a
# --github build that included inc/github-updater.php; that file is gone
# from core entirely as of themes.trac #276778 — see ARCHITECTURE.md's "No
# self-updater in Colophon core.") A theme still distributed only via GitHub
# releases and carrying its own updater is a fork's concern, not this script's.
#
# Version:
#   Read from style.css. Set it first with bump-version.sh.
#   Format: 1.Yjjj[.hhmm] (see bump-version.sh for details).
#
# Output:
#   <slug>-<version>-wporg.zip
#
# Requires: gh (authenticated), rsync, zip, jq

set -euo pipefail

SLUG="${1:?Usage: $0 <slug>}"
BUILD="wporg"

# Published theme repos are named for the theme alone — thisismyurl/quillwork,
# thisismyurl/masthead. This read "colophon-$SLUG", which matches no repo that
# exists, so every packaging run failed at the clone step. Override with
# COLOPHON_REPO=<owner/name> if a theme ever lives somewhere else.
REPO="${COLOPHON_REPO_NAME:-$SLUG}"
WORK_DIR="$(mktemp -d)"
trap 'rm -rf "$WORK_DIR"' EXIT

echo "=== Colophon package builder ==="
echo "  repo:  thisismyurl/$REPO"
echo "  slug:  $SLUG"
echo "  build: $BUILD"

# 1. Clone the theme repo (shallow — we only need HEAD)
# Source. Default is a shallow clone of the published repo; COLOPHON_SRC_DIR
# builds from a local working tree instead.
#
# The local option matters because a WP.org submission zip should be inspectable
# BEFORE anything is pushed. Cloning from GitHub means the only way to see what
# you are about to submit is to publish first and check afterwards, which is the
# wrong order for an artifact that gets rejected on file hygiene.
if [ -n "${COLOPHON_SRC_DIR:-}" ]; then
  echo "  src:   $COLOPHON_SRC_DIR (local working tree, not the published repo)"
  mkdir -p "$WORK_DIR/src"
  rsync -a "$COLOPHON_SRC_DIR/" "$WORK_DIR/src/"
else
  gh repo clone "thisismyurl/$REPO" "$WORK_DIR/src" -- --depth=1 --quiet

  # Build from a specific ref when asked. Needed because a theme's shipped line is
  # not always its default branch: quillwork's released tags sit on a history that
  # shares no commits with main, so packaging its default branch would produce a
  # zip of the wrong lineage entirely.
  if [ -n "${COLOPHON_REPO_REF:-}" ]; then
    echo "  ref:   $COLOPHON_REPO_REF (not the default branch)"
    git -C "$WORK_DIR/src" fetch --depth=1 --quiet origin "$COLOPHON_REPO_REF"
    git -C "$WORK_DIR/src" checkout --quiet FETCH_HEAD
  fi
fi

# 2. Read version from style.css
VERSION=$(grep '^Version:' "$WORK_DIR/src/style.css" \
  | sed 's/Version:[[:space:]]*//' | tr -d '[:space:]')
echo "  version: $VERSION"
echo ""

# 3. Validate Text Domain matches slug
TEXT_DOMAIN=$(grep '^Text Domain:' "$WORK_DIR/src/style.css" \
  | sed 's/Text Domain:[[:space:]]*//' | tr -d '[:space:]')
if [ "$TEXT_DOMAIN" != "$SLUG" ]; then
  echo "ERROR: Text Domain in style.css is '$TEXT_DOMAIN' but expected '$SLUG'."
  echo "  Fix style.css before packaging — WP.org rejects mismatched text domains."
  exit 1
fi

# 4. Build the dist directory.
#    Root dir name = $SLUG (MUST match Text Domain for WP.org — not the repo name).
DIST="$WORK_DIR/$SLUG"

RSYNC_ARGS=(-a)

if [ -f "$WORK_DIR/src/.distignore" ]; then
  RSYNC_ARGS+=(--exclude-from="$WORK_DIR/src/.distignore")
fi

rsync "${RSYNC_ARGS[@]}" "$WORK_DIR/src/" "$DIST/"

# 5. Belt-and-suspenders: a theme in the WP.org directory must not carry a
# self-update path. Core no longer ships inc/github-updater.php at all, but
# this catches the file anyway if a fork or an old checkout still has one —
# the previous submission's rejection (themes.trac #276778) was exactly this
# file leaking into an uploaded zip.
if [ -f "$DIST/inc/github-updater.php" ]; then
  echo "ERROR: inc/github-updater.php is present in the dist — WP.org will reject this."
  echo "  Colophon core no longer ships this file; remove it from $WORK_DIR/src before packaging."
  exit 1
fi

# 6. Build the zip
OUT="${SLUG}-${VERSION}-${BUILD}.zip"
(cd "$WORK_DIR" && zip -r "$OLDPWD/$OUT" "$SLUG/" --quiet)

ZIP_SIZE=$(du -h "$OUT" | cut -f1)
echo ""
echo "Output: $OUT ($ZIP_SIZE)"
echo "  zip root: $SLUG/  ← matches Text Domain '$TEXT_DOMAIN'"

THEME_URI=$(grep '^Theme URI:' "$WORK_DIR/src/style.css" \
  | sed 's/Theme URI:[[:space:]]*//' | tr -d '[:space:]')

if [ "$BUILD" = "wporg" ]; then
  echo ""
  echo "WP.org checklist before submitting:"
  echo "  [ ] Theme URI page returns 200: $THEME_URI"
  echo "  [ ] screenshot.png is exactly 1200×900 px"
  echo "  [ ] readme.txt is present and complete"
  echo "  [ ] No inc/github-updater.php in zip (verified above)"
  echo "  [ ] run Theme Check plugin on a test install"
fi

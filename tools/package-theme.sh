#!/usr/bin/env bash
# package-theme.sh — build a distribution zip for a Colophon derived theme.
#
# Usage:
#   bash package-theme.sh <slug> [--wporg|--github]
#
#   slug      The theme slug (= WP.org text domain / zip root dir name).
#             This is also the GitHub repo name — published theme repos are
#             named for the theme alone (thisismyurl/quillwork).
#
# Build flags (default: --wporg):
#   --wporg   WP.org submission build.
#             Excludes inc/github-updater.php. Zip root is <slug>/ — required
#             by WP.org to match the Text Domain field in style.css.
#   --github  GitHub release build.
#             Includes inc/github-updater.php for GitHub-native auto-updates.
#             Same zip structure; useful for the GitHub release artifact.
#
# Version:
#   Read from style.css. Set it first with bump-version.sh.
#   Format: 1.Yjjj[.hhmm] (see bump-version.sh for details).
#
# Output:
#   <slug>-<version>-wporg.zip   or   <slug>-<version>-github.zip
#
# Requires: gh (authenticated), rsync, zip, jq

set -euo pipefail

SLUG="${1:?Usage: $0 <slug> [--wporg|--github]}"
BUILD="wporg"

for arg in "${@:2}"; do
  case "$arg" in
    --github) BUILD="github" ;;
    --wporg)  BUILD="wporg" ;;
  esac
done

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
  if [ "$BUILD" = "github" ]; then
    # .distignore lists inc/github-updater.php, because its main job is producing
    # the WP.org build. Honouring it verbatim here made --github a no-op: it
    # promised to include the updater and then excluded it anyway, so the two
    # builds came out byte-identical and GitHub-native self-updates never worked.
    # Strip that one line for the GitHub build; everything else in .distignore
    # still applies.
    grep -v '^inc/github-updater\.php[[:space:]]*$' "$WORK_DIR/src/.distignore" \
      > "$WORK_DIR/distignore.github"
    RSYNC_ARGS+=(--exclude-from="$WORK_DIR/distignore.github")
  else
    RSYNC_ARGS+=(--exclude-from="$WORK_DIR/src/.distignore")
  fi
fi

if [ "$BUILD" = "wporg" ]; then
  # Exclude the GitHub updater. WP.org uses its own update mechanism, and a theme
  # in the directory must not carry a self-update path. The file_exists() guard in
  # functions.php makes this a safe exclusion (no fatal error when it is absent).
  RSYNC_ARGS+=(--exclude="inc/github-updater.php")
  echo "  Excluded for WP.org build:"
  echo "    inc/github-updater.php (use WP.org update API instead)"
else
  echo "  Including inc/github-updater.php (GitHub release build)"
fi

rsync "${RSYNC_ARGS[@]}" "$WORK_DIR/src/" "$DIST/"

# 5. Confirm github-updater exclusion
if [ "$BUILD" = "wporg" ] && [ -f "$DIST/inc/github-updater.php" ]; then
  echo "ERROR: inc/github-updater.php is present in the WP.org dist — rsync exclude failed."
  exit 1
fi

# 6. Build the zip
OUT="${SLUG}-${VERSION}-${BUILD}.zip"
(cd "$WORK_DIR" && zip -r "$OLDPWD/$OUT" "$SLUG/" --quiet)

ZIP_SIZE=$(du -h "$OUT" | cut -f1)
echo ""
echo "Output: $OUT ($ZIP_SIZE)"
echo "  zip root: $SLUG/  ← matches Text Domain '$TEXT_DOMAIN'"

if [ "$BUILD" = "wporg" ]; then
  echo ""
  echo "WP.org checklist before submitting:"
  echo "  [ ] Theme URI page exists at https://thisismyurl.com/$SLUG/"
  echo "  [ ] screenshot.png is exactly 1200×900 px"
  echo "  [ ] readme.txt is present and complete"
  echo "  [ ] No inc/github-updater.php in zip (verified above)"
  echo "  [ ] run Theme Check plugin on a test install"
fi

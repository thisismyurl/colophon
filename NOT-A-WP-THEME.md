# Colophon — CORE/SKIN architecture layer

This directory is **not a WordPress theme**. It is the shared design
documentation, preview system, and architecture reference for the
Colophon theme collection.

## What this directory contains

- `preview/` — Static HTML previews demonstrating the Colophon design
  system (typography, colour, spacing, components). Used to validate
  CORE architectural decisions before they propagate to individual themes.
- `screenshot.png` — The design-system showcase screenshot (not a WP.org
  submission screenshot).

## The actual themes

The WordPress.org submissions are in sibling directories:

| Theme | Target audience | Status |
|-------|----------------|--------|
| `quillwork/` | Calligraphers, print studios, paper goods | Submitted |
| `kern/` | Type foundries, brand consultancies | Ready |
| `masthead/` | Digital publishers, newspapers | Ready |
| `wake/` | Maritime journals, sailing clubs | Ready |
| `parcel/` | DTC subscription brands | Ready |

Each of those themes contains the full CORE/SKIN structure:
`functions.php` → `inc/bootstrap.php` + `inc/setup.php` + `inc/assets.php`
+ `inc/bindings.php` + `inc/skin.php`, plus `theme.json`, templates,
parts, and patterns.

## CORE/SKIN split

The Colophon CLI (`colophon sync`) owns CORE files:

- `inc/bootstrap.php` — namespace + identity constants
- `inc/setup.php` — theme supports, i18n, navigation, a11y scaffolding
- `inc/assets.php` — stylesheet enqueue + font preload
- `inc/bindings.php` — copyright year + footer credit block bindings
- `inc/admin.php` — WP.org-compliant Get-started page
- `assets/css/core/reset.css` — cascade contract + design-agnostic reset
- `assets/css/core/base.css` — WCAG scaffolding + semantic token contract

`inc/skin.php` is the one file the CLI never overwrites — all
theme-specific behaviour lives there.

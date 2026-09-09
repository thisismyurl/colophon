=== Colophon ===

Contributors: thisismyurl
Tags: blog, full-site-editing, block-patterns, custom-colors, custom-logo, custom-menu, editor-style, featured-images, rtl-language-support, translation-ready, wide-blocks
Requires at least: 6.7
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 1.6252.1241
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A minimal WordPress FSE starter theme — the shared foundation for the Colophon theme collection.

== Description ==

Colophon is a free, full-site-editing WordPress theme built to be extended. It ships a clean, accessible base that works on its own and also serves as the foundation for a growing collection of niche editorial themes — Kern, Masthead, Parcel, and Wake are all built on it.

Use Colophon as-is for a minimal, fast, and accessible blog or site. Or use it as a starting point: the CORE/SKIN architecture separates portable infrastructure from your theme's personality into two distinct files, so you can build your own design without ever editing the scaffolding that makes the theme work.

Features:

* Full Site Editing — every element customisable in the Site Editor
* System font stack — no external requests; typography uses the visitor's native fonts until you add your own
* Built to WCAG 2.2 AA guidelines — visible focus rings, screen-reader utilities, semantic landmark elements
* RTL-ready — all layout written with CSS logical properties
* Core Web Vitals optimised — zero render-blocking JavaScript, cascade-ordered CSS, no dead weight
* Reduced-motion support — all decorative animation is governed by a single global guard
* Block patterns — starter patterns for hero, content, and navigation layouts
* WooCommerce compatible — declares support automatically when the plugin is active
* Zero plugin dependencies

== The CORE/SKIN split ==

Every file in inc/ is labelled [CORE] or [SKIN].

[CORE] files are the portable infrastructure: theme supports, a11y scaffolding, the block-bindings copyright footer, and the WP.org-compliant onboarding flow. These are the same across every theme in the collection.

[SKIN] is inc/skin.php — the one file that carries your theme's personality: image crop sizes, bundled fonts, block style registrations, pattern categories, and the onboarding copy. The Colophon CLI (`colophon sync`) never overwrites skin.php, so you can rebuild or update the core without losing your customisations.

== Installation ==

1. In your WordPress admin, go to Appearance → Themes → Add New.
2. Search for "Colophon" or upload the theme zip.
3. Activate the theme.
4. Go to Appearance → Colophon: Get started for optional setup steps.

== Frequently Asked Questions ==

= Is this theme free? =

Yes. Licensed GPLv2 or later, with no upsells or required paid extensions.

= What is it for? =

Two things. First, it works as a standalone minimal theme for blogs and personal sites that want a clean, fast, accessible foundation without a specific editorial personality. Second, it is the documented base for a collection of niche WordPress themes — each of those themes is Colophon with a specific skin applied.

= What are the Colophon themes? =

Kern (type studios and brand consultancies), Masthead (digital newspapers and editorial publications), Parcel (direct-to-consumer brands), and Wake (maritime journals and coastal lifestyle sites). Each is a full standalone theme on WordPress.org, built on this foundation.

= How do I add my own fonts? =

Register them in theme.json under settings.typography.fontFamilies, add the font files to assets/fonts/, and update inc/skin.php to preload the LCP-critical font via the colophon/preload_fonts filter. No other file needs editing.

= How do I add custom block styles? =

Register them in the skin_block_styles() function in inc/skin.php and add the CSS treatment in assets/css/skin.css. The CORE files do not need editing.

= Is it compatible with page builders? =

Colophon is a block theme built for the WordPress Site Editor. Page builders that support the block editor work alongside it; legacy drag-and-drop builders that bypass the block system are not supported.

== Changelog ==

= 1.6252.1241 =
Fixes for WordPress.org theme review ticket #276778 (closed not-approved):

* Removed inc/github-updater.php entirely — not merely excluded from the WP.org
  build. Colophon's own submission zip had leaked the file even with the prior
  .distignore-based exclusion, because a build-time step is one more thing that
  can fail. A theme still wanting a GitHub-release self-updater can keep its own
  copy; core no longer tracks or syncs the path.
* Fixed Theme URI — it pointed to a page that 404s; now points to the theme's
  actual download page (thisismyurl.com/downloads/colophon/).
* Fixed a real PHP warning the reviewer caught under WP_DEBUG: theme.json's
  settings.blocks.core/navigation.typography used the plural preset-list key
  ("fontSizes": false) where the singular UI-toggle key was intended
  ("fontSize": false). The plural key holds an array of preset objects; setting
  it to a boolean made WordPress core try to foreach() over false. Confirmed
  fixed by activating the theme with WP_DEBUG on and rendering front page,
  single, page, search, and 404 templates with a clean debug.log.
* readme.txt already carried the required copyright/license sections and the
  accessibility-ready tag was already removed as of 1.6201.1029 — both were
  cited in the same rejection but were fixed before this release; noted here
  for the record.
* tools/bump-version.sh: fixed a stale sed pattern (const VERSION → the actual
  define('COLOPHON_VERSION', ...)) that had been silently failing to update
  inc/bootstrap.php on every release since the namespace-to-prefix migration,
  and a missing-jq code path that silently no-opted colophon.json's version
  bump. update_file() now fails loudly instead of reporting success on a
  no-op match.
* Removed templates/front-page.html. It always wins over index.html when
  WordPress considers the request the front page — including the default
  "Your latest posts" configuration, not only a static front page — and a
  front-page.html built around wp:post-content alone has no post context to
  render there, so it shipped blank. The front page now falls through to
  index.html (posts-on-front) or page.html (a static page assigned as front
  page); both already had working content.
* i18n: block-template HTML isn't scanned by wp i18n make-pot. Several
  hardcoded strings across templates/ and parts/header.html — a "Latest
  posts" heading, three query-no-results messages, a 404 message, the skip
  link, and several block-attribute overrides (post-excerpt's "Read more",
  the search block's label/button text, home-link's label, the post
  navigation labels) — are now either backed by a small hidden pattern
  (Inserter: false, translation-string carrier only) or simply no longer
  overridden, so WordPress core's own already-translated default applies.
  The hand-rolled skip link is gone entirely: core injects an equivalent one.
* templates/404.html: replaced wp:home-link (invalid outside core/navigation,
  and its rendered li was sitting inside a hand-written p) with a plain,
  translatable link.
* patterns/content-grid.php and feature-section.php: the four unconfigured
  wp:image blocks had no src attribute, so inserting either pattern and
  publishing without swapping the image shipped three or four broken images.
  They now reference a bundled placeholder.png.
* Accessibility: fixed real WCAG 1.4.3 contrast failures, not just claims
  about them. The 404 page's oversized "404" used base-rule as a text colour
  — a border/separator tint never meant to carry text, ~1.4:1 in every style
  variation — swapped for base-mid. patterns/site-footer.php's dark, inverted
  layout used base-mid (tuned for light backgrounds) for muted text on a dark
  background, failing everywhere; swapped for base-rule, which was already
  the right shade for a dark background and needed no new colour. base-mid
  itself was independently too light against its light backgrounds in the
  Forest, Slate, and Warm style variations, and base-accent too dark (Warm)
  or too dark for a dark theme (Midnight) against the backgrounds it
  actually appears on; all four are now within their real contrast floor,
  verified by direct WCAG relative-luminance calculation across every text/
  background pair actually used, not spot-checked.
* Regenerated languages/colophon.pot and reconciled a duplicate msgid: the
  copyright block binding (inc/bindings.php) and the Site Footer pattern
  share one "© %1$s %2$s. All rights reserved." string with two different
  translator comments, which is a make-pot warning; both now read the same.
* Replaced screenshot.png. The previous file was an unmodified copy of a
  preview/ mockup render using fonts and features (a display serif, a
  category eyebrow, a reading-time label, header buttons) that don't exist
  in the shipped theme. The current one is a real render of the actual
  theme with real demo content.
* Normalised line endings to LF across every shipped file type and added
  .gitattributes so a future edit on Windows doesn't reintroduce CRLF.

= 1.6201.1029 =
The theme line moves off a PHP namespace and onto a per-theme function prefix.
This is a breaking change for anyone building on Colophon, and it is not optional.
It is what the WordPress.org Theme Review Team requires.

WHY: ticket #280625 closed Masthead as not-approved. A namespace is accepted only
at the class level, because a WordPress site loads a large number of vendor
functions into the global scope, so a bare `function setup()` inside
`namespace Masthead;` still reads as unprefixed to the review tooling. Every
function, constant and class defined in the global scope needs the theme's own
prefix, no abbreviations. Colophon shipped the namespace pattern into every theme
generated from it, so the fix belongs here rather than in each theme.

* Core: removed `namespace Colophon;` from all eight files in inc/. 28 functions
  are now `colophon_*`, 8 constants are `COLOPHON_*` (file-scope `const` converted
  to `define()`, since a bare global `const SLUG` is itself an unprefixed global
  symbol), and the WP-CLI class is `Colophon_CLI_Command`. Hook names are
  unchanged, so a theme's filters keep working across the upgrade.
* Core: 17 translated strings converted from `__()` to `esc_html__()`. Six keep
  bare `__()` deliberately, because they are escaped with `esc_html()` at the point of
  echo, and converting them would escape twice and render an apostrophe as a
  literal `&#039;`. Each carries an inline comment so the exception is not read as
  an oversight.
* CLI: the substitution that rewrote `namespace Colophon;` is replaced by three
  prefix rules: `COLOPHON_` to `{SLUG}_`, `Colophon_` to `{Studly}_`, and
  `colophon_` to `{slug}_`, applied before the quote-anchored rules so a callback
  string like `'colophon_setup'` is rewritten as one symbol. The one-place-to-
  re-prefix property is preserved.
* CLI: version injection matched `const VERSION = '...';` and would have silently
  stopped working now that bootstrap.php uses `define()`. It matches the renamed
  constant instead. Caught before release; no generated theme shipped with a stale
  version because of it.
* CLI: `--namespace` was left with nothing to do by the change above. It now sets
  the class prefix (defaulting, as before, to the slug), so the flag means
  something again rather than being silently ignored.
* CLI: `colophon doctor`'s stray-identity check still grepped for
  `namespace Colophon;`, a string that no longer exists, so it would have
  reported a clean bill of health on a theme with a leaked core prefix. It now
  checks the three prefix forms.
* Tooling: `package-theme.sh` cloned `thisismyurl/colophon-<slug>`, which matches
  no repository that exists, because published theme repos are named for the theme alone.
  Every packaging run failed at the clone step. It also gained a
  `COLOPHON_REPO_REF` override, because a theme's shipped line is not always its
  default branch.
* Docs: ARCHITECTURE.md §4 and GUIDE.md described the namespace mechanism as the
  design. Both now describe the prefix rules, and say plainly why the namespace
  was rejected, so nobody rediscovers it the hard way.

= 1.6160.1430 =
Submitted to WordPress.org (themes.trac ticket #276778); closed not-approved.
See 1.6252.1241 above for the fixes made in response.

= 1.6159.0900 =
* Expanded templates: added archive, front-page, page (wide), and page (blank).
* Added a block-pattern library: page hero, feature section, content grid, post list, pull quote, subscribe CTA, site footer, and main navigation.
* Added five style variations: Focus, Forest, Midnight, Slate, and Warm.
* Accessibility: explicit h1 on the blog index; archive and search titles set to heading level 1.
* Internationalisation: all block-pattern copy wrapped for translation.
* Prepared for the WordPress.org directory: removed development tooling and the optional GitHub self-updater; footer credit line bound to a filterable, translatable source.

= 1.6148 =
* Initial release.
* Templates: index, single, page, 404, search.
* Parts: header, footer.
* CORE/SKIN architecture with documented extension points.
* WCAG 2.2 AA scaffolding in base.css.
* Block bindings: copyright year and footer credit.

== Resources ==

* assets/images/placeholder.png — a flat, solid-colour PNG generated for this
  theme (no photographic or third-party content), used only as the default
  image in the Content Grid and Feature Section patterns so an unconfigured
  block never ships as a bare `<img>` with no `src`. Licensed GPLv2 or later,
  same as the rest of the theme.

== License ==

Colophon WordPress Theme is licensed under the GNU General Public License v2 or later.

This program is free software: you can redistribute it and/or modify it under the
terms of the GNU General Public License as published by the Free Software Foundation,
either version 2 of the License, or (at your option) any later version.

== Copyright ==

Colophon WordPress Theme, Copyright 2026 Christopher Ross
Colophon is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

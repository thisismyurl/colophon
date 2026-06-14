=== Colophon ===

Contributors: thisismyurl
Tags: blog, full-site-editing, block-patterns, custom-colors, custom-logo, custom-menu, editor-style, featured-images, accessibility-ready, rtl-language-support, translation-ready, wide-blocks
Requires at least: 6.7
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.6165.0919
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

The FSE starter you build a theme line on — not another minimal blog theme. One CORE, infinite skins: change one file and ship a fully distinct sibling theme without touching the accessible, translation-ready scaffolding underneath.

== Description ==

For developers shipping a theme line, and anyone who wants a clean, fast, accessible blog: Colophon is both a finished standalone theme and the documented foundation you build siblings on.

Colophon is a CORE/SKIN architected WordPress starter: every file in inc/ is labelled [CORE] or [SKIN], and the CORE is shared infrastructure (a11y scaffolding, block bindings, WooCommerce guard, onboarding) that never changes between themes. The SKIN is a single file — inc/skin.php — that carries your theme's entire personality. Kern, Masthead, Parcel, and Wake are all the same CORE with a different skin. A developer can ship a fully distinct theme by editing one file and never touching the scaffolding that makes the whole thing work.

It is also a complete theme on its own: use Colophon as-is for a minimal, fast, accessible blog or site with no setup beyond activation.

Features:

* Full Site Editing — every element customisable in the Site Editor
* System font stack — no external requests; typography uses the visitor's native fonts until you add your own
* WCAG 2.2 AA foundations — a skip link to main content, visible focus rings on every interactive element, screen-reader utility classes, and ARIA landmarks (header, nav, main, footer). Every text and UI colour pair in the default palette and in all six style variations is verified to meet AA contrast (4.5:1 normal text, 3:1 large text and UI). Your own content and media are yours to check against the same bar.
* RTL-ready — layout is written with CSS logical properties (margin-inline, padding-inline, inset-*), so WordPress handles left-to-right and right-to-left direction without a separate stylesheet. On WordPress 6.7+ block-level direction conversion is automatic; if RTL rendering looks off, verify you are on 6.7+.
* Core Web Vitals optimised — zero render-blocking JavaScript, cascade-ordered CSS, no dead weight
* Reduced-motion support — all decorative animation is governed by a single global guard
* Block patterns — eight starter patterns: page hero, feature section, content grid, post list, pull quote, subscribe call-to-action, main navigation, and site footer
* Style variations — six one-click looks in the Site Editor: Focus, Forest, Midnight, Slate, Warm (colour palettes), and Editorial, which switches headings to the bundled EB Garamond and pull quotes to Spectral
* Self-hosted editorial fonts — EB Garamond and Spectral ship as WOFF2 and load only when a variation or your own skin opts in; the default render uses a system stack and makes no font request
* WooCommerce compatible — declares support automatically when the plugin is active
* Zero plugin dependencies

== The CORE/SKIN split ==

Every file in inc/ is labelled [CORE] or [SKIN].

[CORE] files are the portable infrastructure: theme supports, a11y scaffolding, the block-bindings copyright footer, and the WP.org-compliant onboarding flow. These are the same across every theme in the collection.

[SKIN] is inc/skin.php — the one file that carries your theme's personality: image crop sizes, bundled fonts, block style registrations, pattern categories, and the onboarding copy. The Colophon CLI (`colophon sync`) never overwrites skin.php, so you can rebuild or update the core without losing your customisations.

== Building a sibling theme on Colophon ==

A sibling theme is Colophon's CORE with your own SKIN. The whole personality lives in two files you control; everything underneath — WCAG scaffolding, WooCommerce guard, block bindings, admin onboarding, content-width validation, i18n groundwork — is portable infrastructure you inherit and never have to maintain separately.

Four files, one pass:

1. Copy the theme directory. In inc/bootstrap.php, change the namespace, slug, and version — this is the single re-prefix point. Every asset handle, hook name, and i18n text domain derives from that one constant, so renaming it re-points the whole theme at once.
2. Open inc/skin.php — the only file `colophon sync` never overwrites. Replace the personality: register your block styles, add your image crop sizes, preload your LCP-critical font, and rewrite the onboarding copy through the `colophon/get_started_content` filter.
3. Add your design tokens to theme.json (palette, type scale, spacing, layout) and your CSS treatment to assets/css/skin.css. The CORE CSS in assets/css/core/ does not need editing.
4. Leave the CORE files alone. Run `colophon sync` whenever Colophon ships a patch to pick up accessibility fixes, security hardening, and i18n improvements without touching your skin.

inc/skin.php carries header comments that walk through the same four steps in code alongside the functions they describe, so the pattern is readable in context without switching back to this document. Kern, Masthead, Parcel, and Wake all ship using this process: they share a single CORE and diverge only in skin.php, theme.json, and assets/css/skin.css.

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

== For developers ==

Colophon exposes a small set of filters so a child theme or companion plugin can
adjust the footer credit, copyright line, and onboarding screen without editing a
template or a CORE file. All examples are PHP 7.4 compatible.

Filters:

* `colophon/developer_guide_url` (string) — the URL the "developer guide" link on
  the Appearance → Colophon: Get started screen points to. Override it in a child
  theme to point at your own documentation. The default is the Colophon developer
  guide at https://thisismyurl.com/colophon

      add_filter( 'colophon/developer_guide_url', function ( $url ) {
          return 'https://example.com/my-theme/docs';
      } );

* `colophon/copyright_date_format` (string) — PHP date-format string for the
  copyright year. Default: 'Y' (four-digit year). Return a literal string for a
  fixed range. Fires from get_copyright_value() in inc/bindings.php.

      add_filter( 'colophon/copyright_date_format', function () {
          return 'Y'; // or a literal like '2022–2026'
      } );

* `colophon/copyright_text` (string) — the complete copyright sentence. Use it to
  replace the whole line. Fires from get_copyright_value() in inc/bindings.php.

      add_filter( 'colophon/copyright_text', function ( $line ) {
          return '© ' . date( 'Y' ) . ' Acme Inc.';
      } );

* `colophon/footer_credit` (string) — the footer credit HTML ("Built with the
  {Theme} theme."). Return an empty string to remove it. Output is sanitised with
  wp_kses to a minimal anchor allow-list. Fires from get_footer_credit_value() in
  inc/bindings.php.

      add_filter( 'colophon/footer_credit', '__return_empty_string' );

* `colophon/onboarding_capability` (string) — the capability required to view the
  Get started screen. Default: 'edit_theme_options'. Fires from inc/admin.php.

      add_filter( 'colophon/onboarding_capability', function () {
          return 'manage_options';
      } );

* `colophon/get_started_content` (array) — the entire Get started page content
  array. A SKIN replaces any key with its own voice in inc/skin.php. See
  get_started_content() in inc/admin.php for the array shape.

== Changelog ==

= 1.6165.0919 =
Accessibility (WCAG 2.2 AA colour contrast):
* Audited every text and UI colour pair against its actual rendered background in
  the default palette and in all six style variations, computed with WCAG
  relative-luminance. Fixed every pair below 4.5:1 (normal text) or 3:1 (large text
  and UI), preserving each variation's design intent rather than flattening palettes.
* Style variations: darkened base-mid in Forest, Slate, and Warm so muted text
  (post dates, excerpts, captions, footer copyright) clears 4.5:1 on the light
  grounds it renders on. Re-pitched base-accent in Midnight (lighter) and Warm
  (deeper) so links, buttons, and the skip link clear 4.5:1 as text on the page
  ground and under the button label.
* 404 template: the large "404" heading was bound to base-rule, which sat near
  1.5:1 on the page ground in every variation. It now uses base-mid, clearing the
  3:1 large-text bar everywhere while keeping the muted, oversized treatment.
* Site Footer pattern: the pattern paints a stable dark ground (base-black). Its
  column headings and copyright line moved from base-mid to base-rule, and its
  navigation links now resolve to base-paper through an element link-colour binding,
  so every line clears AA in all six variations instead of going low-contrast where
  the mid/accent tokens dipped. The footer's design intent (dark ground, light text)
  is unchanged.

Documentation:
* Readme: resolved the accessibility-ready wording so it states the verified fact
  (AA contrast confirmed across the default palette and all six variations) rather
  than hedging with "built toward," and corrected the block-patterns feature line to
  name all eight bundled patterns.

Migration:
* No template or API change for existing sites. Sites using the Forest, Slate, Warm,
  or Midnight variations will see slightly deeper muted text and re-pitched accent
  links; sites using the Site Footer pattern will see its secondary text and links
  render at full contrast. No editor action is required.

= 1.6164.1500 =
i18n:
* Removed hardcoded English from block-JSON attributes across the templates so the
  translation-ready claim holds in every locale. The post-excerpt "Read more"
  override, the search block "Search" label/buttonText, the 404 "← Back to start"
  home-link label, and the "Previous"/"Next" post-navigation labels are gone; each
  block now falls back to the string WordPress core ships and translates (core
  supplies "Search", "Home", and the "Previous:"/"Next:" navigation prefixes).
* The skip link is now rendered in PHP on wp_body_open via esc_html__(), not as
  hardcoded English in parts/header.html. Non-English sites get the translated
  "Skip to content" on first load with no Site Editor work. Exactly one skip link
  remains in the DOM, positioned directly after <body>.
* The Site Footer pattern's demo strings (site name, tagline, navigation labels,
  contact lines, and the copyright sentence) are now wrapped in esc_html__() /
  printf( esc_html__() ), so the pattern is fully translatable. The copyright year
  is generated with gmdate() instead of a hardcoded 2026.

Typography / style variations:
* Added the bundled EB Garamond and Spectral faces as theme.json fontFamilies with
  self-hosted WOFF2 @font-face wiring, so the previously-unreferenced font files are
  now real, opt-in design assets rather than dead weight.
* Added an "Editorial" style variation that switches headings, site title, and post
  title to EB Garamond and pull quotes/quotes to Spectral. The default theme keeps
  the system-font stack (zero font requests); the personality is one click away in
  the Site Editor.

Accessibility / templates:
* page-blank.html now documents its header/footer omission inline as a WCAG
  navigation exception, naming the scaffold that remains intact (main#main-content,
  single editor-fillable h1, wp_body_open skip link).

Packaging:
* .distignore now also excludes the `colophon` CLI executable and
  colophon.manifest.json, so no developer tooling ships in the distributed zip.

Compliance evidence:
* Every PHP file passes `php -l`; languages/colophon.pot is regenerated with
  `wp i18n make-pot` so the translation catalog matches the source. The PHP 7.4
  honesty and pot freshness are enforced by these two gates before each release.

= 1.6163.2212 =
* Requirements: corrected the PHP requirement to 7.4 (was 8.1). The distributed
  theme uses no PHP 8.0+ syntax; the only str_*_with calls lived in the
  developer-only self-updater, which is excluded from the distributed zip.
* Templates: reconciled the author, attachment, and singular templates to
  Colophon's own design tokens and conventions. They previously carried a
  different skin's class prefix, an undefined "line" colour, and an unregistered
  eyebrow block style, so their borders, separators, and eyebrows rendered
  unstyled. They now use the base-rule colour, the registered colophon-eyebrow
  style, and the same colophon-main structure as the rest of the templates.
* i18n: the index and archive no-results states now offer the search form for
  retry instead of hardcoded English prose, matching search and 404 and keeping
  every template language-neutral.
* i18n: shipped languages/colophon.pot — the generated translation catalog the
  translation-ready tag requires.
* Accessibility (WCAG 2.1 1.3.1): every template now resolves to exactly one h1.
  Front-page and page-blank carry an empty, editor-fillable h1; index and archive
  promote the query-title to h1; search renders its query-title as the h1 and drops
  the redundant eyebrow label.
* Hardened comment-form attribute injection: the field rewrite now uses a guarded
  preg_replace (single replacement, null-check, no-match fallback) instead of a naive
  str_replace, so it can't double-inject or mangle markup.
* Content width for oEmbeds now reads from theme.json contentSize (pixel-validated,
  720px fallback) instead of a hardcoded literal.
* The developer-guide URL on the Get started screen is now filterable via
  `colophon/developer_guide_url` for child themes pointing at custom docs.
* i18n: the 404 template no longer ships a hardcoded English explanation
  sentence. The heading, search form, and home link orient the visitor and stay
  language-neutral.
* i18n: the footer "Built with …" credit is now a block binding
  (`colophon/footer-credit`) instead of hardcoded markup, so it is translatable
  and removable through the `colophon/footer_credit` filter.
* Docs: added a "For developers" section documenting every public filter with a
  runnable PHP 7.4-compatible example.
* Docs: reframed the accessibility line as built-toward WCAG 2.2 AA with its
  specific evidence (skip link, focus rings, landmarks); documented the RTL
  logical-properties approach and its WordPress 6.7+ caveat.
* Tested up to: corrected to 6.8 (the previous 7.0 value referenced a
  WordPress release that does not exist).

= 1.6148 =
* Initial release.
* Templates: index, single, page, 404, search.
* Parts: header, footer.
* CORE/SKIN architecture with documented extension points.
* WCAG 2.2 AA scaffolding in base.css.
* Block bindings: copyright year and footer credit.

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

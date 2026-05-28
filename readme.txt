=== Colophon ===
Contributors: thisismyurl
Requires at least: 7.0
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.6148
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: blog, one-column, two-columns, full-site-editing, block-patterns, editor-style, custom-colors, custom-logo, custom-menu, featured-images, accessibility-ready, translation-ready, rtl-language-support, wide-blocks, threaded-comments

A deliberately plain, technically exacting full-site-editing starter core, built to be copied and re-skinned rather than inherited.

== Description ==

Colophon is the shared core behind a small line of free WordPress themes. It is
a starter, not a finished design: a clean set of bones — the accessibility
scaffolding, the Core Web Vitals discipline, a six-layer CSS cascade contract, a
one-file re-prefixing point, and a set of thin, standards-correct templates — on
which a fully designed theme is built by re-skinning, not by inheriting.

There is no parent/child coupling. A theme built on Colophon is copied from it
and ships as a self-contained, standalone theme with no runtime dependency on
Colophon at all. The shared core stays in sync during development through a small
command-line tool; the shipped theme is just a normal WordPress theme.

The default skin is intentionally restrained: system fonts (no bundled font
files, no third-party calls), a grayscale palette with one calm accent, and a
reading-first layout. It is meant to be replaced.

* Full-site editing — every template and template part editable in the Site Editor.
* Zero front-end JavaScript, zero plugin dependencies.
* WCAG 2.2 AA accessibility scaffolding — skip link, visible focus, sensible heading order, `prefers-reduced-motion` honoured globally.
* Core Web Vitals discipline — `font-display: swap`, no render-blocking third-party requests.
* Six-layer CSS cascade (`reset, base, layout, components, blocks, utilities`).
* A semantic-token contract (`--cl-*`) that lets the portable core stay colour-agnostic while each skin binds the tokens to its own palette.
* Translation-ready — every user-facing string is internationalised.
* RTL-ready through CSS logical properties.

== Installation ==

1. In your WordPress admin, go to Appearance > Themes > Add New.
2. Click Upload Theme, choose the Colophon .zip, and click Install Now.
3. Click Activate.
4. Visit Appearance > Get started for setup guidance.

To build your own theme on Colophon, see ARCHITECTURE.md in the theme folder.

== Changelog ==

= 1.6148 =
* Updated Theme URI to https://thisismyurl.com/colophon.
* Removed external video iframes from the admin onboarding page for WordPress.org compliance.

= 1.6147 =
* Unified versioning to the x.Yddd calendar scheme used across the This Is My URL family.
* Confirmed compatibility with WordPress 7.0.


= 1.0.0 =
* Initial release — the shared starter core.

== Copyright ==

Colophon WordPress Theme, (C) 2026 Christopher Ross.
Colophon is distributed under the terms of the GNU General Public License v2 or later.

=== Colophon ===
Contributors: thisismyurl
Requires at least: 7.0
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.6150
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: blog, one-column, two-columns, full-site-editing, block-patterns, editor-style, custom-colors, custom-logo, custom-menu, featured-images, accessibility-ready, translation-ready, rtl-language-support, wide-blocks, threaded-comments

A literary full-site-editing theme — warm type, classical proportions, zero front-end JavaScript — and the documented starter core behind the Christopher Ross free theme line.

== Description ==

Colophon is for people who take reading seriously.

The type is EB Garamond for headings and Spectral for prose — a classical-revival display serif paired with a screen-optimised old-style that reads comfortably at body size. The palette runs warm: stone whites, ink browns, and a single forest-green accent. The layout is reading-first, the proportions are classical, and nothing competes with the words. Literary details — drop caps, pull-quote bracket rules, old-style numerals, the paragraph indent convention from printed literary magazines — are included and documented. Remove any of them in two minutes by editing skin.css.

It is also technically exacting: zero front-end JavaScript, self-hosted OFL fonts that do not phone home, WCAG 2.2 AA accessibility scaffolding, Core Web Vitals tuning, and a six-layer CSS cascade you can extend predictably. Every template is editable in the Site Editor. A WP-CLI command gives you version, info, and cache-flush without touching the admin.

And it is the shared core behind a small family of free WordPress themes. Each theme in the line is copied from Colophon and re-skinned — not inherited. There is no parent/child coupling, no runtime dependency, and no Pro tier behind a gate. A theme built on Colophon is a standalone, self-contained thing you can install, audit, and trust without dragging a parent along. GUIDE.md, which ships inside the theme folder, explains how to build your own.

* Full-site editing — every template and template part editable in the Site Editor.
* EB Garamond (display) and Spectral (body) — self-hosted OFL fonts, zero third-party requests.
* Literary CSS — drop caps, pull-quote rules, old-style numerals, common ligatures, paragraph indent convention. Each feature is isolated and removable.
* Zero front-end JavaScript, zero plugin dependencies.
* WCAG 2.2 AA accessibility — skip link, visible focus, sensible heading order, prefers-reduced-motion honoured globally.
* Core Web Vitals discipline — self-hosted fonts, font-display: swap, LCP font preloaded, no render-blocking requests.
* Six-layer CSS cascade (reset, base, layout, components, blocks, utilities).
* WP-CLI — wp colophon version, info, flush.
* Filterable hooks at every extension point — content_width, skip_link_target, skip_link_label, register_nav_menus, copyright_date_format, register_image_sizes, register_block_styles, register_pattern_categories, onboarding_capability, footer_credit, and more.
* Translation-ready — every user-facing string is internationalised.
* RTL-ready through CSS logical properties.

== Setting up your site ==

Three touchpoints get you from an installed theme to a reading site:

1. Settings > Reading. Choose a static front page and give your posts their own page. This is the most important step — without it, your home page is a raw post stream.

2. Appearance > Editor. Open Styles to see the warm palette and type choices. Use the template editor to adjust any layout. Nothing you do in the Editor is permanent until you click Save, and nothing breaks the theme from underneath.

3. Posts > Add New. Write something. The theme gets out of the way.

== Frequently Asked Questions ==

= Does this theme contact any third-party servers? =

No. EB Garamond and Spectral are bundled as self-hosted WOFF2 files inside the theme folder. No fonts load from Google Fonts, Adobe Fonts, or any other external service. No analytics or tracking scripts are included.

= Is this related to other themes in a line? =

Yes. Masthead, Margin, and Quillwork are each built on the same Colophon core: copied and re-skinned with their own type families, palettes, and template personalities. Each theme is standalone; installing Colophon is not required to use them. GUIDE.md, included in the theme folder, describes how to build your own theme in the same way.

= Can I add a different typeface? =

Yes. Add your font files to assets/fonts/, declare them in theme.json under settings.typography.fontFamilies, and assign them in Styles inside the Site Editor. The theme ships with EB Garamond and Spectral; nothing prevents you from adding others alongside them or replacing them entirely.

= How do I remove the literary paragraph indent convention? =

Open assets/css/skin.css and delete the three rules in the "Paragraph rhythm" block (the p+p text-indent section). The comment marks exactly where they are.

= How do I remove the footer credit? =

Two ways. In the Site Editor, open the Footer template part and delete the credit paragraph — takes about 30 seconds. Or, in a child theme or custom plugin, add:

  add_filter( 'colophon/footer_credit', '__return_empty_string' );

Either way. No hard feelings.

== Installation ==

1. In your WordPress admin, go to Appearance > Themes > Add New.
2. Click Upload Theme, choose the Colophon .zip, and click Install Now.
3. Click Activate.
4. Visit Appearance > Colophon: Get started for setup guidance.

To build your own theme on Colophon, see GUIDE.md in the theme folder.

== Changelog ==

= 1.6150 =
* Added EB Garamond and Spectral as self-hosted OFL fonts. Zero Google Fonts requests.
* New warm literary palette: stone whites (#faf9f6 paper, #f2f0eb paper-soft), ink browns (#1c1917 ink, #433e3b ink-soft, #6b6460 ink-muted), forest-green accent (#3d6b5e).
* Literary CSS: drop caps, pull-quote bracket rules, OpenType features (common ligatures, old-style numerals), paragraph text-indent convention, text-wrap: pretty, hanging-punctuation. Each feature isolated and removable.
* LCP font preload wired up for EB Garamond normal subset.
* WP-CLI: wp colophon version / info / flush commands.
* New templates: author.html (author archive), attachment.html (media attachment), singular.html (showpiece post variant).
* New hooks: colophon/content_width, colophon/skip_link_target, colophon/skip_link_label, colophon/register_nav_menus, colophon/copyright_date_format, colophon/register_image_sizes, colophon/register_block_styles, colophon/register_pattern_categories, colophon/onboarding_capability.
* admin.php: get_onboarding_capability() helper centralises the capability check. All four gate points now use it; one filter changes all four at once.
* New xs font size (0.75rem) in type scale.
* editor-style.css expanded: OpenType features, pull-quote treatment, eyebrow style — all mirrored from the front end.

= 1.6148 =
* Updated Theme URI to https://thisismyurl.com/colophon.
* Removed external video iframes from the admin onboarding page for WordPress.org compliance.

= 1.6147 =
* Unified versioning to the x.Yddd calendar scheme used across the Christopher Ross family.
* Confirmed compatibility with WordPress 7.0.

= 1.0.0 =
* Initial release — the shared starter core.

== Copyright ==

Colophon WordPress Theme, (C) 2026 Christopher Ross.
Colophon is distributed under the terms of the GNU General Public License v2 or later.

EB Garamond, (C) 2017 The EB Garamond Project Authors.
EB Garamond is distributed under the SIL Open Font License 1.1.
https://github.com/octaviopardo/EBGaramond12

Spectral, (C) 2017 The Spectral Project Authors (Production Type).
Spectral is distributed under the SIL Open Font License 1.1.
https://github.com/productiontype/Spectral

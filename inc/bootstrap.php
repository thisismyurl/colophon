<?php
/**
 * [CORE] Bootstrap — the single re-prefixing point for the whole theme line.
 *
 * This is the ONE place a theme's identity lives. Change the namespace and the
 * COLOPHON_SLUG constant and the entire theme re-prefixes, because every other file
 * derives its asset handles, hooks, and i18n keys from this namespace and these
 * constants. With Colophon, the `colophon` CLI rewrites the namespace, slug, and
 * version here from the theme's colophon.json on every sync. The constants are
 * the source of truth at runtime; the CLI just keeps them honest.
 *
 * Why a namespace instead of a `colophon_`-style function prefix:
 * callbacks register as `'COLOPHON_fn'`, so renaming the namespace
 * re-points every hook at once, with no second list of callback strings to sync.
 * WordPress.org requires a unique prefix per theme; this concentrates that whole
 * requirement into the one line below.
 *
 * NOTE — the one place "tidy" is a bug: the text DOMAIN in __()/_e()/esc_html__()
 * stays a string LITERAL ('colophon'), never the COLOPHON_SLUG constant. `wp i18n make-pot`
 * reads source statically and only recognises a literal as the domain argument;
 * hand it a constant and it extracts nothing and ships an untranslatable theme.
 *
 * Pillar 9 (Archaeological Records): this header is the authoritative record of
 * who this theme is. Change it here and only here.
 *
 * @package colophon
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme slug — the text-domain-equivalent identity used for asset handles,
 * pattern and block-style prefixes, and the block-bindings source namespace.
 */
define( 'COLOPHON_SLUG', 'colophon' );

/**
 * Theme version — cache-bust for enqueued assets and the WordPress.org version.
 */
define( 'COLOPHON_VERSION', '1.6252.1241' );

/**
 * Absolute filesystem path to the theme root (no trailing slash).
 */
define( 'COLOPHON_DIR', get_template_directory() );

/**
 * Public URL to the theme root (no trailing slash).
 */
define( 'COLOPHON_URI', get_template_directory_uri() );

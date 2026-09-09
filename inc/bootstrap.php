<?php
/**
 * [CORE] Bootstrap — the single re-prefixing point for the whole theme line.
 *
 * This is the ONE place a theme's identity lives. Change the COLOPHON_SLUG
 * constant (and the function/constant/class prefixes the CLI derives from it)
 * and the entire theme re-prefixes, because every other file derives its
 * asset handles, hooks, and i18n keys from these constants. With Colophon,
 * the `colophon` CLI rewrites the slug, prefixes, and version here from the
 * theme's colophon.json on every sync. The constants are the source of truth
 * at runtime; the CLI just keeps them honest.
 *
 * This used to be a PHP namespace instead of a `colophon_`-style function
 * prefix — one line change re-pointed every hook, since callbacks registered
 * via __NAMESPACE__. WordPress.org's Theme Review Team rejected that on
 * ticket #280625 (Masthead, closed not-approved): a namespace is accepted
 * only at the CLASS level, because a WordPress site loads a large number of
 * vendor functions into the global scope, so a bare `function setup()` inside
 * a namespace still reads as unprefixed. Every function, constant, and class
 * in the global scope now carries the theme's own prefix directly — three
 * substitution rules instead of one line, but still one place to re-prefix.
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

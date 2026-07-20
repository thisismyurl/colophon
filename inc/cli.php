<?php
/**
 * [CORE] WP-CLI commands — operational handles for the theme.
 *
 * Loaded only in WP-CLI context (functions.php guards the require_once on
 * `defined( 'WP_CLI' ) && WP_CLI`), so there is zero front-end or admin overhead
 * from this file. The whole file is also self-guarded as a belt-and-braces measure
 * against a future loader change that drops the guard.
 *
 * Registers:
 *   wp colophon version  — theme name and version, read from COLOPHON_SLUG + COLOPHON_VERSION.
 *   wp colophon info     — name, version, active template, .pot presence.
 *   wp colophon flush    — wp_cache_flush() + WP Engine EverCache purge if present.
 *
 * @package colophon
 */

defined( 'ABSPATH' ) || exit;

if ( ! ( defined( 'WP_CLI' ) && \WP_CLI ) ) {
	return;
}

/**
 * Colophon: theme operations from the command line.
 */
class Colophon_CLI_Command {

	/**
	 * Output the theme name and version.
	 *
	 * ## EXAMPLES
	 *
	 *     wp colophon version
	 *
	 * @when after_wp_load
	 */
	public function version(): void {
		$theme = wp_get_theme();
		\WP_CLI::log( sprintf( '%s %s', (string) $theme->get( 'Name' ), COLOPHON_VERSION ) );
	}

	/**
	 * Output theme name, version, active template, and translation status.
	 *
	 * ## EXAMPLES
	 *
	 *     wp colophon info
	 *
	 * @when after_wp_load
	 */
	public function info(): void {
		$theme         = wp_get_theme();
		$template      = (string) get_template();
		$languages_dir = COLOPHON_DIR . '/languages';
		$pot_path      = $languages_dir . '/' . COLOPHON_SLUG . '.pot';
		$has_pot       = is_dir( $languages_dir ) && file_exists( $pot_path );

		\WP_CLI::log( 'Name:            ' . (string) $theme->get( 'Name' ) );
		\WP_CLI::log( 'Slug:            ' . COLOPHON_SLUG );
		\WP_CLI::log( 'Version:         ' . COLOPHON_VERSION );
		\WP_CLI::log( 'Active template: ' . $template );
		\WP_CLI::log( 'languages/.pot:  ' . ( $has_pot ? 'present' : 'missing — run: wp i18n make-pot . languages/' . COLOPHON_SLUG . '.pot' ) );
	}

	/**
	 * Flush the object cache and trigger EverCache purge on WP Engine.
	 *
	 * Calls wp_cache_flush() in every environment. When the WP Engine platform
	 * mu-plugin is loaded (detected via the wpe_cdn_add_tags() function), the
	 * EverCache full-purge surface is invoked through whichever helper the host
	 * exposes. Safe to run on any host — falls back to object cache only.
	 *
	 * ## EXAMPLES
	 *
	 *     wp colophon flush
	 *
	 * @when after_wp_load
	 */
	public function flush(): void {
		wp_cache_flush();
		\WP_CLI::log( 'Object cache flushed.' );

		if ( ! function_exists( 'wpe_cdn_add_tags' ) ) {
			\WP_CLI::success( 'Done. WP Engine platform not detected — object cache only.' );
			return;
		}

		// WP Engine exposes a small surface for cache purging from code. The
		// helper names vary by platform release; call only those that exist so
		// this stays portable across WPE plugin versions.
		if ( class_exists( '\WpeCommon' ) ) {
			if ( method_exists( '\WpeCommon', 'purge_memcached' ) ) {
				\WpeCommon::purge_memcached();
			}
			if ( method_exists( '\WpeCommon', 'clear_maxcdn_cache' ) ) {
				\WpeCommon::clear_maxcdn_cache();
			}
			if ( method_exists( '\WpeCommon', 'purge_varnish_cache' ) ) {
				\WpeCommon::purge_varnish_cache();
			}
		}

		\WP_CLI::success( 'Done. WP Engine EverCache surfaces purged.' );
	}
}

\WP_CLI::add_command( 'colophon', 'Colophon_CLI_Command' );

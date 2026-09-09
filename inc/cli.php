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
	 * Flush the object cache.
	 *
	 * A theme in the WordPress.org directory has no business knowing about a
	 * specific host's cache-purging API — that coupling belongs to a host's
	 * own plugin or mu-plugin, not here. This stays host-agnostic on purpose.
	 *
	 * ## EXAMPLES
	 *
	 *     wp colophon flush
	 *
	 * @when after_wp_load
	 */
	public function flush(): void {
		wp_cache_flush();
		\WP_CLI::success( 'Object cache flushed.' );
	}
}

\WP_CLI::add_command( 'colophon', 'Colophon_CLI_Command' );

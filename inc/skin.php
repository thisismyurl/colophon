<?php
/**
 * [SKIN] The skin layer — the one PHP file `colophon sync` never overwrites.
 *
 * Colophon's PHP-side personality: a minimal skin that ships the theme working
 * out of the box. Derived themes (Kern, Masthead, Parcel, Wake) replace this
 * file with their own — adding image crops, font preloads, block styles, and
 * onboarding copy that match their specific design.
 *
 * For Colophon itself, the skin is intentionally minimal: one generic image
 * size, no bundled font preload (system fonts load instantly without one), and
 * a single pattern category so the Patterns panel has a home.
 *
 * To build your own theme on Colophon:
 *   1. Add your font files to assets/fonts/ and register them in theme.json.
 *   2. Add a preload filter here for the LCP-critical font.
 *   3. Register your block styles here.
 *   4. Override the get_started_content filter with your onboarding copy.
 *   5. Everything else (a11y, WooCommerce guard, bindings, admin) is CORE — leave it.
 *
 * Pillar 9 (Archaeological Records): [SKIN] tag marks what belongs to Colophon.
 *
 * @package colophon
 */

namespace Colophon;

defined( 'ABSPATH' ) || exit;

/**
 * Register Colophon's image crop sizes.
 *
 * One generic hero crop at 16:9, sufficient for a starter. Derived themes
 * add their own sizes here without editing any CORE file.
 */
function skin_image_sizes(): void {
	add_image_size( 'colophon-hero', 1440, 810, true ); // 16:9 page-hero crop.
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\skin_image_sizes' );

/**
 * Register Colophon's block styles.
 *
 * A minimal set that gives editors something to work with in the Styles panel
 * without locking in any personality. Derived themes extend this list.
 */
function skin_block_styles(): void {

	// Paragraph as an eyebrow label — small, tracked, muted. Useful above headings.
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'colophon-eyebrow',
			'label' => __( 'Eyebrow label', 'colophon' ),
		)
	);

	// Group as a full-bleed band — background colour fills the viewport width.
	register_block_style(
		'core/group',
		array(
			'name'  => 'colophon-band',
			'label' => __( 'Full-bleed band', 'colophon' ),
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\\skin_block_styles' );

/**
 * Register the Colophon pattern category.
 *
 * Derived themes register their own category (e.g., 'kern') and may remove
 * this one. The Patterns panel needs at least one category to show a group.
 */
function skin_pattern_categories(): void {
	register_block_pattern_category(
		'colophon',
		array( 'label' => __( 'Colophon', 'colophon' ) )
	);
}
add_action( 'init', __NAMESPACE__ . '\\skin_pattern_categories' );

/**
 * Override the Get-started page content with Colophon-specific copy.
 *
 * Colophon's onboarding speaks to both end users and developers, since the
 * theme is explicitly designed to be extended. The CORE default covers end
 * users; this filter adds the developer context that makes Colophon distinct.
 */
add_filter(
	'colophon/get_started_content', // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
	static function ( array $content ): array {
		$content['lead'] = __( 'Colophon is a minimal, accessible WordPress theme that works on its own — and also serves as the foundation for a collection of niche editorial themes. Here is how to make it yours.', 'colophon' );

		return $content;
	}
);

<?php
/**
 * [SKIN] The skin layer — the one PHP file the `colophon` CLI never overwrites.
 *
 * Everything theme-specific that needs PHP lives here: which image crops to
 * register, which font to preload for the largest paint, the block styles and
 * pattern categories that make up this theme's editor vocabulary, and any
 * Get-started copy you want to override. The core inc/ files stay portable
 * because none of this leaks into them — that's the whole point of the split.
 *
 * When the CLI generates a theme, it copies this file and rewrites the
 * `Colophon`/`colophon`/`cl-` tokens to the new theme's, then leaves it alone
 * forever after. Edit it freely.
 *
 * @package colophon
 */

namespace Colophon;

defined( 'ABSPATH' ) || exit;

/**
 * Register this theme's image crop sizes.
 *
 * Hooked on after_setup_theme (not the core setup() function) so a re-skin
 * changes crops here without touching inc/setup.php.
 */
function skin_image_sizes(): void {
	add_image_size( 'cl-wide', 1600, 900, true ); // 16:9 wide/hero crop.
	add_image_size( 'cl-card', 720, 480, true );  // 3:2 card crop.
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\skin_image_sizes' );

/**
 * Register this theme's block styles (the is-style-{name} options in the editor).
 *
 * Colophon's defaults are deliberately few — a generic card group and an
 * eyebrow paragraph. A real theme adds the styles its patterns lean on. The CSS
 * for each lives in assets/css/skin.css @layer components.
 */
function skin_block_styles(): void {
	register_block_style(
		'core/group',
		array(
			'name'  => 'cl-card',
			'label' => __( 'Card', 'colophon' ),
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'cl-eyebrow',
			'label' => __( 'Eyebrow', 'colophon' ),
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\\skin_block_styles' );

/**
 * Register this theme's pattern categories.
 *
 * Prefixed with SLUG so a theme installed beside its siblings never collides.
 * Pattern files in /patterns/*.php declare which category they slot into.
 */
function skin_pattern_categories(): void {
	register_block_pattern_category(
		SLUG . '-sections',
		array(
			'label'       => __( 'Colophon: Sections', 'colophon' ),
			'description' => __( 'Section patterns for building pages.', 'colophon' ),
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\\skin_pattern_categories' );

/*
 * To preload this theme's largest-paint font, uncomment and point at the WOFF2:
 *
 * add_filter( 'colophon/preload_fonts', static function ( array $fonts ): array {
 *     $fonts[] = 'assets/fonts/your-family/your-family-variable.woff2';
 *     return $fonts;
 * } );
 *
 * Colophon's default skin uses system fonts, so there's nothing to preload.
 */

<?php
/**
 * Title: Pull Quote
 * Slug: colophon/pull-quote
 * Categories: colophon
 * Viewport Width: 1280
 * Inserter: true
 * Description: Centered typographic pull quote in large serif italic with an accent rule and a sans caps attribution.
 *
 * @package colophon
 */
?>
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|5","right":"var:preset|spacing|5"}},"color":{"background":"var:preset|color|base-ground"}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<section class="wp-block-group has-base-ground-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5)">

	<!-- wp:separator {"backgroundColor":"base-accent","className":"is-style-wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|7"}}}} -->
	<hr class="wp-block-separator has-text-color has-base-accent-color has-alpha-channel-opacity has-base-accent-background-color has-background is-style-wide" style="margin-bottom:var(--wp--preset--spacing--7)"/>
	<!-- /wp:separator -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|2xl","fontStyle":"italic","fontWeight":"400","lineHeight":"1.35"},"spacing":{"margin":{"bottom":"var:preset|spacing|5"}},"color":{"text":"var:preset|color|base-black"}},"fontFamily":"serif"} -->
	<p class="has-text-align-center has-base-black-color has-text-color has-serif-font-family" style="margin-bottom:var(--wp--preset--spacing--5);font-size:var(--wp--preset--font-size--2xl);font-style:italic;font-weight:400;line-height:1.35"><?php echo esc_html__( 'Good structure disappears. The reader never notices the scaffolding holding the words in place, only that the words were easy to read.', 'colophon' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|xs","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"},"color":{"text":"var:preset|color|base-mid"}},"fontFamily":"sans"} -->
	<p class="has-text-align-center has-base-mid-color has-text-color has-sans-font-family" style="font-size:var(--wp--preset--font-size--xs);font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Attribution Name, Role', 'colophon' ); ?></p>
	<!-- /wp:paragraph -->

</section>
<!-- /wp:group -->

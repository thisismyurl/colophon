<?php
/**
 * Title: Feature Section
 * Slug: colophon/feature-section
 * Categories: colophon
 * Viewport Width: 1280
 * Inserter: true
 * Description: Two-column feature layout with a large image on the left and a heading, body copy, and link on the right.
 *
 * @package colophon
 */
?>
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|5","right":"var:preset|spacing|5"}},"color":{"background":"var:preset|color|base-paper"}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<section class="wp-block-group has-base-paper-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5)">

	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|7","left":"var:preset|spacing|9"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img alt="" style="aspect-ratio:3/2;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"var:preset|font-size|2xl"},"spacing":{"margin":{"bottom":"var:preset|spacing|5"}}},"fontFamily":"serif"} -->
			<h2 class="wp-block-heading has-serif-font-family" style="margin-bottom:var(--wp--preset--spacing--5);font-size:var(--wp--preset--font-size--2xl)"><?php echo esc_html__( 'A feature worth a closer look', 'colophon' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.7"},"spacing":{"margin":{"bottom":"var:preset|spacing|5"}},"color":{"text":"var:preset|color|base-ink"}}} -->
			<p class="has-base-ink-color has-text-color" style="line-height:1.7"><?php echo esc_html__( 'Two or three sentences of body copy that explain the feature in plain language. Enough to set context and earn the click, without crowding the page.', 'colophon' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm","fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"}},"fontFamily":"sans"} -->
			<p class="has-sans-font-family" style="font-size:var(--wp--preset--font-size--sm);font-weight:600;letter-spacing:0.04em;text-transform:uppercase"><a href="#"><?php echo esc_html__( 'Learn more', 'colophon' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->

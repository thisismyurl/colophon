<?php
/**
 * Title: Content Grid
 * Slug: colophon/content-grid
 * Categories: colophon
 * Viewport Width: 1280
 * Inserter: true
 * Description: Three-column grid of cards, each with a 4:3 image placeholder, heading, short paragraph, and a read-more link.
 *
 * @package colophon
 */
?>
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|5","right":"var:preset|spacing|5"}},"color":{"background":"var:preset|color|base-ground"}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<section class="wp-block-group has-base-ground-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5)">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|8","left":"var:preset|spacing|6"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","className":"is-resized"} -->
			<figure class="wp-block-image size-large is-resized"><img alt="" style="aspect-ratio:4/3;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|3"}}},"fontFamily":"serif"} -->
			<h3 class="wp-block-heading has-serif-font-family" style="margin-top:var(--wp--preset--spacing--5);margin-bottom:var(--wp--preset--spacing--3)"><?php echo esc_html__( 'First column heading', 'colophon' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm"},"spacing":{"margin":{"bottom":"var:preset|spacing|4"}},"color":{"text":"var:preset|color|base-mid"}}} -->
			<p class="has-base-mid-color has-text-color" style="font-size:var(--wp--preset--font-size--sm)"><?php echo esc_html__( 'A short summary of the topic, written to give the reader a clear sense of what waits behind the link.', 'colophon' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|xs","fontStyle":"normal","fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"}},"fontFamily":"sans"} -->
			<p class="has-sans-font-family" style="font-size:var(--wp--preset--font-size--xs);font-style:normal;font-weight:600;letter-spacing:0.04em;text-transform:uppercase"><a href="#"><?php echo esc_html__( 'Read more', 'colophon' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","className":"is-resized"} -->
			<figure class="wp-block-image size-large is-resized"><img alt="" style="aspect-ratio:4/3;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|3"}}},"fontFamily":"serif"} -->
			<h3 class="wp-block-heading has-serif-font-family" style="margin-top:var(--wp--preset--spacing--5);margin-bottom:var(--wp--preset--spacing--3)"><?php echo esc_html__( 'Second column heading', 'colophon' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm"},"spacing":{"margin":{"bottom":"var:preset|spacing|4"}},"color":{"text":"var:preset|color|base-mid"}}} -->
			<p class="has-base-mid-color has-text-color" style="font-size:var(--wp--preset--font-size--sm)"><?php echo esc_html__( 'A short summary of the topic, written to give the reader a clear sense of what waits behind the link.', 'colophon' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|xs","fontStyle":"normal","fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"}},"fontFamily":"sans"} -->
			<p class="has-sans-font-family" style="font-size:var(--wp--preset--font-size--xs);font-style:normal;font-weight:600;letter-spacing:0.04em;text-transform:uppercase"><a href="#"><?php echo esc_html__( 'Read more', 'colophon' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","className":"is-resized"} -->
			<figure class="wp-block-image size-large is-resized"><img alt="" style="aspect-ratio:4/3;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|3"}}},"fontFamily":"serif"} -->
			<h3 class="wp-block-heading has-serif-font-family" style="margin-top:var(--wp--preset--spacing--5);margin-bottom:var(--wp--preset--spacing--3)"><?php echo esc_html__( 'Third column heading', 'colophon' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm"},"spacing":{"margin":{"bottom":"var:preset|spacing|4"}},"color":{"text":"var:preset|color|base-mid"}}} -->
			<p class="has-base-mid-color has-text-color" style="font-size:var(--wp--preset--font-size--sm)"><?php echo esc_html__( 'A short summary of the topic, written to give the reader a clear sense of what waits behind the link.', 'colophon' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|xs","fontStyle":"normal","fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"}},"fontFamily":"sans"} -->
			<p class="has-sans-font-family" style="font-size:var(--wp--preset--font-size--xs);font-style:normal;font-weight:600;letter-spacing:0.04em;text-transform:uppercase"><a href="#"><?php echo esc_html__( 'Read more', 'colophon' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->

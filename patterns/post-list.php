<?php
/**
 * Title: Post List
 * Slug: colophon/post-list
 * Categories: colophon
 * Viewport Width: 1280
 * Inserter: true
 * Description: Clean editorial list of four posts, each with a date, serif title, and excerpt, divided by hairline rules.
 *
 * @package colophon
 */
?>
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|5","right":"var:preset|spacing|5"}},"color":{"background":"var:preset|color|base-paper"}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group has-base-paper-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5)">

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|3"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|xs","letterSpacing":"0.04em","textTransform":"uppercase"},"color":{"text":"var:preset|color|base-mid"}},"fontFamily":"sans"} -->
		<p class="has-base-mid-color has-text-color has-sans-font-family" style="font-size:var(--wp--preset--font-size--xs);letter-spacing:0.04em;text-transform:uppercase"><?php echo esc_html__( 'January 12, 2026', 'colophon' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"var:preset|font-size|lg"}},"fontFamily":"serif"} -->
		<h2 class="wp-block-heading has-serif-font-family" style="font-size:var(--wp--preset--font-size--lg)"><a href="#"><?php echo esc_html__( 'The first article title goes here', 'colophon' ); ?></a></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm","lineHeight":"1.6"},"color":{"text":"var:preset|color|base-mid"}}} -->
		<p class="has-base-mid-color has-text-color" style="font-size:var(--wp--preset--font-size--sm);line-height:1.6"><?php echo esc_html__( 'A short excerpt that gives the reader a sense of the piece before they commit to the full read.', 'colophon' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"backgroundColor":"base-rule","style":{"spacing":{"margin":{"top":"var:preset|spacing|6","bottom":"var:preset|spacing|6"}}}} -->
	<hr class="wp-block-separator has-base-rule-background-color has-background" style="margin-top:var(--wp--preset--spacing--6);margin-bottom:var(--wp--preset--spacing--6)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|3"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|xs","letterSpacing":"0.04em","textTransform":"uppercase"},"color":{"text":"var:preset|color|base-mid"}},"fontFamily":"sans"} -->
		<p class="has-base-mid-color has-text-color has-sans-font-family" style="font-size:var(--wp--preset--font-size--xs);letter-spacing:0.04em;text-transform:uppercase"><?php echo esc_html__( 'January 8, 2026', 'colophon' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"var:preset|font-size|lg"}},"fontFamily":"serif"} -->
		<h2 class="wp-block-heading has-serif-font-family" style="font-size:var(--wp--preset--font-size--lg)"><a href="#"><?php echo esc_html__( 'The second article title goes here', 'colophon' ); ?></a></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm","lineHeight":"1.6"},"color":{"text":"var:preset|color|base-mid"}}} -->
		<p class="has-base-mid-color has-text-color" style="font-size:var(--wp--preset--font-size--sm);line-height:1.6"><?php echo esc_html__( 'A short excerpt that gives the reader a sense of the piece before they commit to the full read.', 'colophon' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"backgroundColor":"base-rule","style":{"spacing":{"margin":{"top":"var:preset|spacing|6","bottom":"var:preset|spacing|6"}}}} -->
	<hr class="wp-block-separator has-base-rule-background-color has-background" style="margin-top:var(--wp--preset--spacing--6);margin-bottom:var(--wp--preset--spacing--6)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|3"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|xs","letterSpacing":"0.04em","textTransform":"uppercase"},"color":{"text":"var:preset|color|base-mid"}},"fontFamily":"sans"} -->
		<p class="has-base-mid-color has-text-color has-sans-font-family" style="font-size:var(--wp--preset--font-size--xs);letter-spacing:0.04em;text-transform:uppercase"><?php echo esc_html__( 'January 3, 2026', 'colophon' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"var:preset|font-size|lg"}},"fontFamily":"serif"} -->
		<h2 class="wp-block-heading has-serif-font-family" style="font-size:var(--wp--preset--font-size--lg)"><a href="#"><?php echo esc_html__( 'The third article title goes here', 'colophon' ); ?></a></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm","lineHeight":"1.6"},"color":{"text":"var:preset|color|base-mid"}}} -->
		<p class="has-base-mid-color has-text-color" style="font-size:var(--wp--preset--font-size--sm);line-height:1.6"><?php echo esc_html__( 'A short excerpt that gives the reader a sense of the piece before they commit to the full read.', 'colophon' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"backgroundColor":"base-rule","style":{"spacing":{"margin":{"top":"var:preset|spacing|6","bottom":"var:preset|spacing|6"}}}} -->
	<hr class="wp-block-separator has-base-rule-background-color has-background" style="margin-top:var(--wp--preset--spacing--6);margin-bottom:var(--wp--preset--spacing--6)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|3"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|xs","letterSpacing":"0.04em","textTransform":"uppercase"},"color":{"text":"var:preset|color|base-mid"}},"fontFamily":"sans"} -->
		<p class="has-base-mid-color has-text-color has-sans-font-family" style="font-size:var(--wp--preset--font-size--xs);letter-spacing:0.04em;text-transform:uppercase"><?php echo esc_html__( 'December 28, 2025', 'colophon' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"var:preset|font-size|lg"}},"fontFamily":"serif"} -->
		<h2 class="wp-block-heading has-serif-font-family" style="font-size:var(--wp--preset--font-size--lg)"><a href="#"><?php echo esc_html__( 'The fourth article title goes here', 'colophon' ); ?></a></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm","lineHeight":"1.6"},"color":{"text":"var:preset|color|base-mid"}}} -->
		<p class="has-base-mid-color has-text-color" style="font-size:var(--wp--preset--font-size--sm);line-height:1.6"><?php echo esc_html__( 'A short excerpt that gives the reader a sense of the piece before they commit to the full read.', 'colophon' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->

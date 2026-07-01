<?php
/**
 * Title: Site Footer
 * Slug: colophon/site-footer
 * Categories: colophon
 * Viewport Width: 1280
 * Inserter: true
 * Description: Three-column footer with site name and tagline, navigation links, and contact details, closed by a copyright bar.
 *
 * @package colophon
 */
?>
<!-- wp:group {"tagName":"footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|8","left":"var:preset|spacing|5","right":"var:preset|spacing|5"}},"color":{"background":"var:preset|color|base-black","text":"var:preset|color|base-paper"}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<footer class="wp-block-group has-base-paper-color has-base-black-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5)">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|7","left":"var:preset|spacing|8"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"var:preset|font-size|lg","fontWeight":"400"},"spacing":{"margin":{"bottom":"var:preset|spacing|3"}}},"fontFamily":"serif"} -->
			<h2 class="wp-block-heading has-serif-font-family" style="margin-bottom:var(--wp--preset--spacing--3);font-size:var(--wp--preset--font-size--lg);font-weight:400"><?php echo esc_html__( 'Site Name', 'colophon' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm","lineHeight":"1.6"},"color":{"text":"var:preset|color|base-rule"}}} -->
			<p class="has-base-rule-color has-text-color" style="font-size:var(--wp--preset--font-size--sm);line-height:1.6"><?php echo esc_html__( 'A short tagline that says what this site is about in a single, plain sentence.', 'colophon' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|xs","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"var:preset|spacing|4"}},"color":{"text":"var:preset|color|base-mid"}},"fontFamily":"sans"} -->
			<h3 class="wp-block-heading has-base-mid-color has-text-color has-sans-font-family" style="margin-bottom:var(--wp--preset--spacing--4);font-size:var(--wp--preset--font-size--xs);font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Explore', 'colophon' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:list {"style":{"typography":{"fontSize":"var:preset|font-size|sm","lineHeight":"2"}},"fontFamily":"sans"} -->
			<ul class="wp-block-list has-sans-font-family" style="font-size:var(--wp--preset--font-size--sm);line-height:2"><!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Home', 'colophon' ); ?></a></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Articles', 'colophon' ); ?></a></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'About', 'colophon' ); ?></a></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><a href="#"><?php echo esc_html__( 'Archive', 'colophon' ); ?></a></li>
			<!-- /wp:list-item --></ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|xs","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"var:preset|spacing|4"}},"color":{"text":"var:preset|color|base-mid"}},"fontFamily":"sans"} -->
			<h3 class="wp-block-heading has-base-mid-color has-text-color has-sans-font-family" style="margin-bottom:var(--wp--preset--spacing--4);font-size:var(--wp--preset--font-size--xs);font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Contact', 'colophon' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm","lineHeight":"1.8"},"color":{"text":"var:preset|color|base-rule"}}} -->
			<p class="has-base-rule-color has-text-color" style="font-size:var(--wp--preset--font-size--sm);line-height:1.8">hello@example.com<br><?php echo esc_html__( '123 Example Street', 'colophon' ); ?><br><?php echo esc_html__( 'City, Region', 'colophon' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"backgroundColor":"base-ink","style":{"spacing":{"margin":{"top":"var:preset|spacing|7","bottom":"var:preset|spacing|6"}}}} -->
	<hr class="wp-block-separator has-base-ink-background-color has-background" style="margin-top:var(--wp--preset--spacing--7);margin-bottom:var(--wp--preset--spacing--6)"/>
	<!-- /wp:separator -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|xs"},"color":{"text":"var:preset|color|base-mid"}},"fontFamily":"sans"} -->
	<p class="has-base-mid-color has-text-color has-sans-font-family" style="font-size:var(--wp--preset--font-size--xs)"><?php echo esc_html__( '© 2026 Site Name. All rights reserved.', 'colophon' ); ?></p>
	<!-- /wp:paragraph -->

</footer>
<!-- /wp:group -->

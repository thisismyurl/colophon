<?php
/**
 * Title: Subscribe CTA
 * Slug: colophon/subscribe-cta
 * Categories: colophon
 * Viewport Width: 1280
 * Inserter: true
 * Description: Centered call-to-action with a serif heading, short pitch paragraph, and a subscribe button on a tinted background.
 *
 * @package colophon
 */
?>
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|5","right":"var:preset|spacing|5"}},"color":{"background":"var:preset|color|base-accent-tint"}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<section class="wp-block-group has-base-accent-tint-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5)">

	<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"var:preset|font-size|2xl"},"spacing":{"margin":{"bottom":"var:preset|spacing|4"}}},"fontFamily":"serif"} -->
	<h2 class="wp-block-heading has-text-align-center has-serif-font-family" style="margin-bottom:var(--wp--preset--spacing--4);font-size:var(--wp--preset--font-size--2xl)">Subscribe to the newsletter</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|base","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"var:preset|spacing|7"}},"color":{"text":"var:preset|color|base-ink"}}} -->
	<p class="has-text-align-center has-base-ink-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--7);font-size:var(--wp--preset--font-size--base);line-height:1.6">A short, well-written note in your inbox now and then. No noise, no spam, and an easy unsubscribe whenever you like.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"base-accent","textColor":"base-paper","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|4","bottom":"var:preset|spacing|4","left":"var:preset|spacing|7","right":"var:preset|spacing|7"}},"typography":{"fontSize":"var:preset|font-size|sm"}},"fontFamily":"sans"} -->
		<div class="wp-block-button has-custom-font-size has-sans-font-family" style="font-size:var(--wp--preset--font-size--sm)"><a class="wp-block-button__link has-base-paper-color has-base-accent-background-color has-text-color has-background wp-element-button" style="border-radius:0px;padding-top:var(--wp--preset--spacing--4);padding-right:var(--wp--preset--spacing--7);padding-bottom:var(--wp--preset--spacing--4);padding-left:var(--wp--preset--spacing--7)">Subscribe</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</section>
<!-- /wp:group -->

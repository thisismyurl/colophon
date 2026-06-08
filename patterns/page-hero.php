<?php
/**
 * Title: Page Hero
 * Slug: colophon/page-hero
 * Categories: colophon
 * Viewport Width: 1280
 * Inserter: true
 * Description: Full-width typographic hero with a large serif headline, a sans descriptor, and two call-to-action buttons.
 *
 * @package colophon
 */
?>
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|12","bottom":"var:preset|spacing|12","left":"var:preset|spacing|5","right":"var:preset|spacing|5"}},"color":{"background":"var:preset|color|base-paper"}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<section class="wp-block-group has-base-paper-background-color has-background" style="padding-top:var(--wp--preset--spacing--12);padding-bottom:var(--wp--preset--spacing--12);padding-left:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5)">

	<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"var:preset|font-size|display","lineHeight":"1.05","letterSpacing":"-0.02em"},"spacing":{"margin":{"bottom":"var:preset|spacing|6"}}},"fontFamily":"serif"} -->
	<h1 class="wp-block-heading has-serif-font-family" style="margin-bottom:var(--wp--preset--spacing--6);font-size:var(--wp--preset--font-size--display);line-height:1.05;letter-spacing:-0.02em">A clean foundation for editorial work</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|lg","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"var:preset|spacing|8"}},"color":{"text":"var:preset|color|base-mid"}},"fontFamily":"sans"} -->
	<p class="has-base-mid-color has-text-color has-sans-font-family" style="margin-bottom:var(--wp--preset--spacing--8);font-size:var(--wp--preset--font-size--lg);line-height:1.5">A minimal, accessible starter theme built for typography, structure, and the words that matter most.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|4"}}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"base-accent","textColor":"base-paper","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|4","bottom":"var:preset|spacing|4","left":"var:preset|spacing|6","right":"var:preset|spacing|6"}},"typography":{"fontSize":"var:preset|font-size|sm"}},"fontFamily":"sans"} -->
		<div class="wp-block-button has-custom-font-size has-sans-font-family" style="font-size:var(--wp--preset--font-size--sm)"><a class="wp-block-button__link has-base-paper-color has-base-accent-background-color has-text-color has-background wp-element-button" style="border-radius:0px;padding-top:var(--wp--preset--spacing--4);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--4);padding-left:var(--wp--preset--spacing--6)">Get started</a></div>
		<!-- /wp:button -->

		<!-- wp:button {"textColor":"base-ink","className":"is-style-outline","style":{"border":{"radius":"0px","color":"var:preset|color|base-rule","width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|4","bottom":"var:preset|spacing|4","left":"var:preset|spacing|6","right":"var:preset|spacing|6"}},"typography":{"fontSize":"var:preset|font-size|sm"}},"fontFamily":"sans"} -->
		<div class="wp-block-button is-style-outline has-custom-font-size has-sans-font-family" style="font-size:var(--wp--preset--font-size--sm)"><a class="wp-block-button__link has-base-ink-color has-text-color wp-element-button" style="border-color:var(--wp--preset--color--base-rule);border-width:1px;border-radius:0px;padding-top:var(--wp--preset--spacing--4);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--4);padding-left:var(--wp--preset--spacing--6)">Read the docs</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</section>
<!-- /wp:group -->

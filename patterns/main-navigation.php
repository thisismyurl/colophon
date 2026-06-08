<?php
/**
 * Title: Main Navigation
 * Slug: colophon/main-navigation
 * Categories: colophon
 * Viewport Width: 1280
 * Inserter: true
 * Description: Horizontal navigation bar with a site-title wordmark on the left and navigation links on the right, under a hairline rule.
 *
 * @package colophon
 */
?>
<!-- wp:group {"tagName":"nav","style":{"spacing":{"padding":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|5","left":"var:preset|spacing|5","right":"var:preset|spacing|5"}},"color":{"background":"var:preset|color|base-paper"},"border":{"bottom":{"color":"var:preset|color|base-rule","width":"1px"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<nav class="wp-block-group has-base-paper-background-color has-background" style="border-bottom-color:var(--wp--preset--color--base-rule);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5)">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group">

		<!-- wp:site-title {"level":0,"isLink":true,"style":{"typography":{"fontSize":"var:preset|font-size|lg","fontWeight":"400"}},"fontFamily":"serif"} /-->

		<!-- wp:navigation {"layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|6"},"typography":{"fontSize":"var:preset|font-size|sm"}},"fontFamily":"sans"} /-->

	</div>
	<!-- /wp:group -->

</nav>
<!-- /wp:group -->

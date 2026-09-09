<?php
/**
 * Title: Home link (hidden)
 * Slug: colophon/hidden-home-link
 * Categories: colophon
 * Inserter: false
 * Description: Not for the pattern picker — a translation-string carrier only.
 *
 * templates/404.html uses this instead of core/home-link — that block's
 * block.json restricts its parent to core/navigation, so it can't legally sit
 * in a paragraph on its own, and its render callback returns an li, which is
 * invalid inside a p. A plain link does the same job without either problem,
 * and still stays translatable.
 *
 * @package colophon
 */
?>
<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|sm"},"color":{"text":"var:preset|color|base-mid"}}} -->
<p class="has-base-mid-color has-text-color" style="font-size:var(--wp--preset--font-size--sm)"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'colophon' ); ?></a></p>
<!-- /wp:paragraph -->

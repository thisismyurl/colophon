<?php
/**
 * Title: 404 message (hidden)
 * Slug: colophon/hidden-404-message
 * Categories: colophon
 * Inserter: false
 * Description: Not for the pattern picker — a translation-string carrier only.
 *
 * templates/404.html references this purely so the message is extracted by
 * wp i18n make-pot — block template HTML files aren't scanned for
 * translatable strings, but pattern PHP files are.
 *
 * @package colophon
 */
?>
<!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|base-mid"}}} -->
<p class="has-base-mid-color has-text-color"><?php echo esc_html__( "This page doesn't exist. Try searching, or return to the front page.", 'colophon' ); ?></p>
<!-- /wp:paragraph -->

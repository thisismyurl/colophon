<?php
/**
 * Title: No archive posts (hidden)
 * Slug: colophon/hidden-no-archive-posts
 * Categories: colophon
 * Inserter: false
 * Description: Not for the pattern picker — a translation-string carrier only.
 *
 * templates/archive.html's query-no-results references this purely so the
 * message is extracted by wp i18n make-pot — block template HTML files
 * aren't scanned for translatable strings, but pattern PHP files are.
 *
 * @package colophon
 */
?>
<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}},"color":{"text":"var:preset|color|base-mid"}}} -->
<p class="has-base-mid-color has-text-color" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)"><?php echo esc_html__( 'No posts found in this archive.', 'colophon' ); ?></p>
<!-- /wp:paragraph -->

<?php
/**
 * Title: No search results (hidden)
 * Slug: colophon/hidden-no-search-results
 * Categories: colophon
 * Inserter: false
 * Description: Not for the pattern picker — a translation-string carrier only.
 *
 * templates/search.html's query-no-results references this purely so the
 * message is extracted by wp i18n make-pot — block template HTML files
 * aren't scanned for translatable strings, but pattern PHP files are.
 *
 * @package colophon
 */
?>
<!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|base-mid"}}} -->
<p class="has-base-mid-color has-text-color"><?php echo esc_html__( 'No results found. Try a different search term.', 'colophon' ); ?></p>
<!-- /wp:paragraph -->

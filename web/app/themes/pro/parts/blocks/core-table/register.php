<?php
/**
 * Change core block
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

/**
 * Change core table block
 *
 * @param string $block_content The block content about to be appended.
 * @param array  $block The full block, including name and attributes.
 */
function insert_table_styles( $block_content, $block ) {
	if ( 'core/table' === $block['blockName'] ) {
		$block_content = '<div data-styles-id="core-table"></div>' . $block_content;
	}
	return $block_content;
}
add_filter( 'render_block', 'insert_table_styles', 10, 2 );

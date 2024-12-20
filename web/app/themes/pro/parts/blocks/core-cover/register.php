<?php
/**
 * Change core block
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

/**
 * Change core cover block
 *
 * @param string $block_content The block content about to be appended.
 * @param array  $block The full block, including name and attributes.
 */
function insert_cover_styles( $block_content, $block ) {
	if ( 'core/cover' === $block['blockName'] ) {
		$block_content = '<div data-styles-id="core-cover"></div>' . $block_content;
	}
	return $block_content;
}
add_filter( 'render_block', 'insert_cover_styles', 10, 2 );

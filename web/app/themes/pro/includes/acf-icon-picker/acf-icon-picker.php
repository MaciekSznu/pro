<?php
/**
 * Modify the path to the icons directory
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

/**
 * Modify the path to the icons directory
 */

add_filter( 'acf_icon_path_suffix', 'acf_icon_path_suffix' );

function acf_icon_path_suffix( $path_suffix ) {
	return 'images/svg/';
}

<?php
/**
 * Posts url
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

/**
 * Posts url
 *
 * @param  string $base_url URL.
 * @param  array  $taxonomies Taxonomies.
 */
function posts_url( $base_url = '', $taxonomies = false ) {

	$args = array();

	if ( $taxonomies ) {
		foreach ( $taxonomies as $key => $term ) {
			$args[ $key ] = $term;
		}
	}

	$url = ! empty( $args ) ? add_query_arg( $args, $base_url ) : $base_url;

	return $url;
}

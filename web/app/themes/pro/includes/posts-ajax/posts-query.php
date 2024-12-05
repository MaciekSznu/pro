<?php
/**
 * Posts query function
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

/**
 * Get WP_Query loop
 *
 * @param  string	$p_type      Post type.
 * @param  int    	$page        Current page.
 * @param  int    	$ppp         Post per page.
 * @param  array  	$taxonomies  Taxonomies.
 * @return WP_Query WP_Query loop.
 */
function posts_query( $p_type = 'oferta', $page = 1, $ppp = -1, $taxonomies = array() ) {
	$args = array(
		'post_type'      => $p_type,
		'post_status'    => 'publish',
		'posts_per_page' => $ppp,
		'paged'          => $page,
	);

	if ( ! empty( $taxonomies ) ) {
		foreach ( $taxonomies as $key => $term ) {
			$terms_array         = ! is_array( $term ) ? explode( ', ', $term ) : $term;
			$args['tax_query'][] = array(
				'taxonomy' => $key,
				'terms'    => $terms_array,
				'field'    => 'term_id',
			);
		}
	}

	return new WP_Query( $args );
}

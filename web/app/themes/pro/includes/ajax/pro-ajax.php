<?php
/**
 * Pro filters AJAX functionality.
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

function pro_filters() {
	$string_hash = post_nonce();
	check_ajax_referer( $string_hash, 'security' );

	$page        = isset( $_POST['page'] ) ? sanitize_text_field( wp_unslash( $_POST['page'] ) ) : 1;
	$p_type      = isset( $_POST['postType'] ) ? sanitize_text_field( wp_unslash( $_POST['postType'] ) ) : 'news';
	$ppp         = isset( $_POST['ppp'] ) ? sanitize_text_field( wp_unslash( $_POST['ppp'] ) ) : 8;
	$taxonomies  = isset( $_POST['taxonomies'] ) ? json_decode( stripslashes( sanitize_text_field( wp_unslash( $_POST['taxonomies'] ) ) ) ) : array();
	$base_url    = isset( $_POST['base_url'] ) ? sanitize_text_field( wp_unslash( $_POST['base_url'] ) ) : '';
	$url         = posts_url( $base_url, $taxonomies );
	$query       = posts_query( $p_type, $page, $ppp, $taxonomies );
	$posts       = posts_loop( $query, $p_type, $ppp );

	$response    = array(
		'taxonomies'    => $taxonomies,
		'page'          => $page,
		'ppp'           => $ppp,
		'url'           => $url,
		'p_type'        => $p_type,
		'posts_content' => $posts,
		'max_num_pages' => $query->max_num_pages,
		'found_posts'   => $query->found_posts,
	);

	echo wp_json_encode( $response );

	die();
}

add_action( 'wp_ajax_nopriv_pro_filters', 'pro_filters' );
add_action( 'wp_ajax_pro_filters', 'pro_filters' );

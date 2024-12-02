<?php
/**
 * Register theme post types
 *
 * Post types should always support revisions.
 * Please follow the same format for registering new post types.
 *
 * Reference: https://developer.wordpress.org/reference/functions/register_post_type/
 * Dashicons for menu_icon: https://developer.wordpress.org/resource/dashicons/
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

namespace pro\PostTypes;

/**
 * Get post type labels
 *
 * @param  string $singular  Singular name for the post type.
 * @param  string $plural    Plural name for the post type.
 * @param  string $menu_name Name the post type will appear as in the admin sidebar.
 * @return array             Lables for registering a post type.
 */
// phpcs:ignoreFile
function get_labels( string $singular, string $plural = '', string $menu_name = '' ) : array {
	if ( empty( $plural ) ) {
		$plural = $singular . 's';
	}

	if ( empty( $menu_name ) ) {
		$menu_name = $plural;
	}

	return array(
		'name'                  => _x( $plural, 'Post Type General Name', 'pro' ),
		'singular_name'         => _x( $singular, 'Post Type Singular Name', 'pro' ),
		'menu_name'             => __( $menu_name, 'pro' ),
		'name_admin_bar'        => __( $singular, 'pro' ),
		'archives'              => __( $singular . ' Archives', 'pro' ),
		'attributes'            => __( $singular . ' Attributes', 'pro' ),
		'parent_item_colon'     => __( 'Parent ' . $singular, 'pro' ),
		'all_items'             => __( 'All ' . $plural, 'pro' ),
		'add_new_item'          => __( 'Add New ' . $singular, 'pro' ),
		'add_new'               => __( 'Add New', 'pro' ),
		'new_item'              => __( 'New ' . $singular, 'pro' ),
		'edit_item'             => __( 'Edit ' . $singular, 'pro' ),
		'update_item'           => __( 'Update ' . $singular, 'pro' ),
		'view_item'             => __( 'View ' . $singular, 'pro' ),
		'view_items'            => __( 'View ' . $plural, 'pro' ),
		'search_items'          => __( 'Search ' . $singular, 'pro' ),
		'not_found'             => __( 'Not found', 'pro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pro' ),
		'featured_image'        => __( 'Featured Image', 'pro' ),
		'set_featured_image'    => __( 'Set featured image', 'pro' ),
		'remove_featured_image' => __( 'Remove featured image', 'pro' ),
		'use_featured_image'    => __( 'Use as featured image', 'pro' ),
		'insert_into_item'      => __( 'Insert into ' . strtolower( $singular ), 'pro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this ' . strtolower( $singular ), 'pro' ),
		'items_list'            => __( $plural . ' list', 'pro' ),
		'items_list_navigation' => __( $plural . ' list navigation', 'pro' ),
		'filter_items_list'     => __( 'Filter ' . strtolower( $plural ) . ' list', 'pro' ),
	);
}

/**
 * Register Gallery post type.
 */
// function gallery() {
// 	register_post_type(
// 		'gallery',
// 		array(
// 			'label'       => __( 'Gallery', 'pro' ),
// 			'labels'      => get_labels( 'Gallery', 'Galleries' ),
// 			'supports'    => array( 'title', 'revisions' ),
// 			'taxonomies'  => array(),
// 			'public'      => true,
// 			'menu_icon'   => 'dashicons-format-gallery',
// 			'has_archive' => false,
// 		)
// 	);
// }

// add_action( 'init', 'pro\PostTypes\gallery' );

<?php
/**
 * Register theme taxonomies
 *
 * Please follow the same format for registering new taxonomies.
 *
 * Reference: https://developer.wordpress.org/reference/functions/register_taxonomy/
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

namespace pro\Taxonomies;

/**
 * Get taxonomy labels
 *
 * @param  string $singular  Singular name for the taxonomy.
 * @param  string $plural    Plural name for the taxonomy.
 * @param  string $menu_name Name the taxonomy will appear as in the admin sidebar.
 * @return array             Lables for registering a taxonomy.
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
		'name'                       => _x( $plural, 'Taxonomy General Name', 'pro' ),
		'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'pro' ),
		'menu_name'                  => __( $menu_name, 'pro' ),
		'all_items'                  => __( 'All ' . $plural, 'pro' ),
		'parent_item'                => __( 'Parent ' . $singular, 'pro' ),
		'parent_item_colon'          => __( 'Parent ' . $singular . ':', 'pro' ),
		'new_item_name'              => __( 'New ' . $singular . ' Name', 'pro' ),
		'add_new_item'               => __( 'Add New ' . $singular, 'pro' ),
		'edit_item'                  => __( 'Edit ' . $singular, 'pro' ),
		'update_item'                => __( 'Update ' . $singular, 'pro' ),
		'view_item'                  => __( 'View ' . $singular, 'pro' ),
		'separate_items_with_commas' => __( 'Separate ' . strtolower( $plural ) . ' with commas', 'pro' ),
		'add_or_remove_items'        => __( 'Add or remove ' . strtolower( $plural ), 'pro' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pro' ),
		'popular_items'              => __( 'Popular ' . $plural, 'pro' ),
		'search_items'               => __( 'Search ' . $plural, 'pro' ),
		'not_found'                  => __( 'Not Found', 'pro' ),
		'no_terms'                   => __( 'No ' . strtolower( $plural ), 'pro' ),
		'items_list'                 => __( $plural . ' list', 'pro' ),
		'items_list_navigation'      => __( $plural . ' list navigation', 'pro' ),
	);
}

/**
 * Type
 */
// function type() {
// 	$args = array(
// 		'labels'            => get_labels( 'Type' ),
// 		'hierarchical'      => false,
// 		'public'            => true,
// 		'show_ui'           => true,
// 		'show_admin_column' => true,
// 	);

// 	register_taxonomy( 'type', array( 'gallery' ), $args );
// }
// add_action( 'init', 'pro\Taxonomies\type' );

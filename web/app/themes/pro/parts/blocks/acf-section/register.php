<?php
/**
 * Register ACF block.
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

/**
 * Register block section.
 */
function init_block_section() {
	if ( ! function_exists( 'acf_register_block_type' ) ) {
		return;
	}

	acf_register_block_type(
		array(
			'name'            => 'section',
			'title'           => __( 'Section', 'pro' ),
			'description'     => __( 'Section', 'pro' ),
			'category'        => 'custom_blocks',
			'icon'            => 'media-code',
			'mode'            => 'preview',
			'keywords'        => array( 'acf', 'section', 'section wrapper' ),
			'align'           => '',
			'supports'        => array(
				'align'  => array( 'wide', 'full' ),
				'jsx'    => true,
				'anchor' => true,
			),
			'render_template' => get_template_directory() . '/parts/blocks/acf-section/index.php',
		)
	);
}

add_action( 'acf/init', 'init_block_section' );

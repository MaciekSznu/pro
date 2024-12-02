<?php
/**
 * Register ACF block.
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

/**
 * Register block gallery slider.
 */
function init_block_gallery_slider() {
	if ( ! function_exists( 'acf_register_block_type' ) ) {
		return;
	}

	acf_register_block_type(
		array(
			'name'            => 'gallery-slider',
			'title'           => __( 'Gallery Slider', 'pro' ),
			'description'     => __( 'Gallery Slider', 'pro' ),
			'category'        => 'custom_blocks',
			'icon'            => 'slides',
			'mode'            => 'edit',
			'keywords'        => array( 'gallery', 'slider', 'images' ),
			'align'           => 'full',
			'supports'        => array(
				'align'  => array( 'full' ),
				'anchor' => true,
			),
			'render_template' => get_template_directory() . '/parts/blocks/acf-gallery-slider/index.php',
			'enqueue_assets'  => function () {
				$js_file = '/parts/blocks/acf-gallery-slider/index.min.js';

				wp_enqueue_script(
					'pro/acf-gallery-slider',
					get_template_directory_uri() . $js_file . '#asyncload',
					array( 'slick_script' ),
					filemtime( get_relative_path( $js_file ) ),
					true
				);
			},
		)
	);
}

add_action( 'acf/init', 'init_block_gallery_slider' );

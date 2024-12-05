<?php
/**
 * The event archive filters template file.
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

$get_taxonomies      = ! empty( $get_taxonomies ) ? $get_taxonomies : false;
// $sub_cat_object      = ! empty( $sub_cat_object ) ? $sub_cat_object : false;
// $sub_cat_object_type = ! empty( $sub_cat_object ) ? $sub_cat_object->taxonomy : false;

?>
<div class="archive-filters-wrapper">
	<div class="archive-filters-wrapper__filters">
		<?php
			get_theme_part(
				'archive/components/filter',
				array(
					'taxonomy_name'  => 'typ',
					'get_taxonomies' => $get_taxonomies,
					// 'sub_cat_object' => 'typ' === $sub_cat_object_type ? $sub_cat_object : false,
				)
			);
			get_theme_part(
				'archive/components/filter',
				array(
					'taxonomy_name'  => 'miejsce',
					'get_taxonomies' => $get_taxonomies,
					// 'sub_cat_object' => 'miejsce' === $sub_cat_object_type ? $sub_cat_object : false,
				)
			);
			get_theme_part(
				'archive/components/filter',
				array(
					'taxonomy_name'  => 'odbiorca',
					'get_taxonomies' => $get_taxonomies,
					// 'sub_cat_object' => 'kolekcja' === $sub_cat_object_type ? $sub_cat_object : false,
				)
			);
		?>
	</div>
	<?php
		get_theme_part(
			'archive/components/search-button'
		);
	?>
</div>


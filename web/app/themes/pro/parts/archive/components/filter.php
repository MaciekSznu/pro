<?php
/**
 * The archive filter template file.
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

$taxonomy_name         = ! empty( $taxonomy_name ) ? $taxonomy_name : false;
$get_taxonomies        = ! empty( $get_taxonomies ) ? $get_taxonomies : false;

// $sub_cat_object        	= ! empty( get_queried_object(  ) ) ? get_queried_object(  ) : false;
// $sub_cat_object        = ! empty( $sub_cat_object ) ? $sub_cat_object : false;
// $sub_cat_term_id      	= ! empty( $sub_cat_object->term_id ) ? $sub_cat_object->term_id : false;

if ( ! empty( $taxonomy_name ) ) :
	?>
	<div class="archive-filter">
		<div class="archive-filter__filter-item" data-term="<?php echo esc_attr( $sub_cat_term_id ); ?>" data-tax="<?php echo esc_attr( $taxonomy_name ); ?>" data-slug="">	
			<?php
			$parent_terms = get_terms(
				array(
					'taxonomy'   => $taxonomy_name,
					'hide_empty' => false,
					'parent'     => 0,
				)
			);
			foreach ( $parent_terms as $item ) :
				$class = '';
				// phpcs:disable
				if ( isset( $get_taxonomies[ $taxonomy_name ] ) && intval($get_taxonomies[ $taxonomy_name ]) === $item->term_id ) {
					$class = ' archive-filter__filter-option--active';
				}
				// phpcs:enable
					$terms = get_terms(
						$taxonomy_name,
						array(
							'parent'     => $item->term_id,
							'orderby'    => 'slug',
							'hide_empty' => false,
						)
					);
				?>
					<button
						type="button"
						class="archive-filter__filter-option<?php echo esc_attr( $class ); ?>"
						data-term="<?php echo esc_attr( $item->term_id ); ?>"
						data-tax="<?php echo esc_attr( $taxonomy_name ); ?>"
						data-slug="<?php echo esc_attr( $item->slug ); ?>"
						<?php
						if ( isset( $sub_cat_term_id ) && $item->term_id === $sub_cat_term_id ) {
							echo 'selected';
						}
						?>
						>
						<?php echo esc_html( $item->name ); ?>
					</button>
				<?php
			endforeach;
			?>
		</div>
	</div>
	<?php
endif;

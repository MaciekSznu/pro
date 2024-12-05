<?php
/**
 * Block with hero filters
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

// $elements_per_page 	= get_field( 'o_f_number', 'options' );
// $hf_kolekcja 		= get_field( 'hf_kolekcja' );
// $hf_element_stroju 	= get_field( 'hf_element_stroju' );

$block_title = __( 'Oferta', 'pro' );

// $sub_cat_object = isset( $hf_kolekcja ) ? $hf_kolekcja : $hf_element_stroju;

// zmienić ppp na 16
$ppp            =  4;
$p_type         = 'oferta';
$get_taxonomies = array();
$url            = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parse_url      = parse_url( $url );

// if ( isset( $sub_cat_object ) && ! empty( $sub_cat_object ) ) {
// 	$get_taxonomies[ $sub_cat_object->taxonomy ][] = $sub_cat_object->term_id;
// }

if ( isset( $parse_url['query'] ) ) {
	parse_str( $parse_url['query'], $results );
	foreach ( $results as $key => $item ) {
		$get_taxonomies[ $key ] = $item;
	}
}

$query = posts_query( $p_type, 1, $ppp, $get_taxonomies );

load_script( 'filters', 'pro/filters' );

?>
	<section class="offer-filters">
		<?php load_styles( __DIR__, 'filters' ); ?>
		<div class="offer-filters__hero">
			<div class="offer-filters__filters">
				<div class="container">
					<div class="offer-filters__filters-wrapper">
						<h1 class="offer-filters__filters-heading"><?php echo esc_html( $block_title ); ?></h1>
						<?php
						if ( 'oferta' === $p_type ) {
							get_theme_part(
								'archive/oferta/parts/filters',
								array(
									// 'sub_cat_object' => $sub_cat_object,
									'p_type'         => $p_type,
									'found_posts'	 => $query->found_posts,
								)
							);
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div 
				class="archive-grid"
				data-ppp="<?php echo $ppp; ?>"
				data-post-type="<?php echo esc_attr( $p_type ); ?>"
				data-url="<?php echo esc_attr( strtok($_SERVER["REQUEST_URI"], '?') ); ?>"
				>
				<div class="archive-results archive-results--<?php echo esc_attr( $p_type ); ?>" id="postcards">
					<?php echo ( posts_loop( $query, $p_type, $ppp ) ); ?>
				</div>
				<div class="archive-button-wrapper" data-max="<?php echo esc_attr( $query->max_num_pages ); ?>">
					<button
						type="button"
						class="c-btn c-btn--primary c-btn--icon load-more-button"
						data-post-type="<?php echo esc_attr( $p_type ); ?>"
						data-current="<?php echo esc_attr( $query->query['paged'] ); ?>"
						data-max="<?php echo esc_attr( $query->max_num_pages ); ?>"
					>
						<span><?php echo esc_html_e( 'Zobacz więcej', 'pro' ); ?></span>
						<?php get_theme_part( 'components/hand/index' ); ?>
					</button>
				</div>
			</div>
		</div>
	</section>


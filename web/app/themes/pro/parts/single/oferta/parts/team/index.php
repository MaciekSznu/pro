<?php
/**
 * The single oferta partial - team.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$so_team_title 	= ! empty( get_field( 'so_team_title' ) ) ? get_field( 'so_team_title' ) : __( 'Zespół', 'pro' );
$so_team 		= get_field( 'so_team' );
$so_slider 		= get_field( 'so_slider' );

if ( ! empty( $so_slider ) ) {
	load_script( 'oferta/parts/team', 'single-offer-slider', array('slick_script'), 'parts/single' );
}
?>
<section class="single-offer-team">
	<?php
		if ( ! empty( $so_slider ) ) {
			load_styles_components( 'sliders' );
			load_styles_third( 'slick' );
		}
	?>
	<div class="container">
		<div class="single-offer-team__top">
			<h2  class="single-offer-team__title"><?php echo esc_html( $so_team_title ); ?></h2>
			<div class="single-offer-team__data">
				<?php if ( ! empty( $so_team ) )
					{
						foreach( $so_team as $item ) {
							if ( ! empty( $item['title'] && ! empty( $item['description'] ) ) ) :
								?>
									<div class="single-offer-team__data-item">
										<p class="single-offer-team__data-item-title black"><?php echo esc_html( $item['title'] ); ?></p>
										<p class="single-offer-team__data-item-description"><?php echo wp_kses_post( $item['description'] ); ?></p>
									</div>
								<?php
							endif;
						}
					}
				?>
			</div>
		</div>
	</div>
	<?php if ( ! empty( $so_slider ) ) : ?>
	<div class="single-offer-team__slider-element">
		<div class="single-offer-team__slider-wrapper">
			<div class="single-offer-team__slider-counter">
				<span class="current-slide">1</span>
				<span>/</span>
				<span class="total-slides"></span>
			</div>
			<div class="single-offer-team__slider-arrows">
				<button type="button" class="slick-prev slider-button slider-button--prev">
					<span>
						<svg width="92" height="12" viewBox="0 0 92 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6.54834 0.54834L1.15076 6L6.54834 11.4517M1 6H91.5" stroke="black"/>
						</svg>
					</span>
				</button>
				<button type="button" class="slick-next slider-button slider-button--next">
					<span>
						<svg width="92" height="12" viewBox="0 0 92 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M84.9517 0.54834L90.3492 6L84.9517 11.4517M90.5 6H0" stroke="black"/>
						</svg>
					</span>
				</button>
			</div>
			<div class="single-offer-team__slider">
				<?php
				foreach ( $so_slider as $slide ) :
					$slide_img = wp_get_attachment_image( get_post_thumbnail_id( $slide ), 'slider-image' );
					$slide_title = get_the_title( $slide );
					$slide_functions = get_field( 'sp_functions', $slide );
					// dodać link do single 
					if ( ! empty( $slide_img ) ) :
						?>
						<div class="single-offer-team__slide">
							<figure class="single-offer-team__slide-image">
								<?php echo wp_kses_post( $slide_img ); ?>
							</figure>
							<p class="single-offer-team__slide-title"><?php echo esc_html( $slide_title ); ?></p>
							<p class="single-offer-team__slide-functions"><?php echo esc_html( $slide_functions ); ?></p>
						</div>
						<?php
					endif;
				endforeach;
				?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</section>
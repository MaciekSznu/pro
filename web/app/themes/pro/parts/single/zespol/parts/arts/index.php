<?php
/**
 * The single zespol partial - arts.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$sp_cooperator_title 	= ! empty( get_field( 'sp_cooperator_title' ) ) ? get_field( 'sp_cooperator_title' ) : __( 'Współtwórca', 'pro' );
$sp_cooperator_items 	= get_field( 'sp_cooperator_items' );
$sp_related 			= get_field( 'sp_related' );

if ( ! empty( $sp_related ) ) {
	load_script( 'zespol/parts/arts', 'single-arts-slider', array('slick_script'), 'parts/single' );
}
?>
<section class="single-team-arts">
	<?php
		if ( ! empty( $sp_related ) ) {
			load_styles_components( 'sliders' );
			load_styles_third( 'slick' );
		}
	?>
	<div class="container">
		<div class="single-team-arts__top">
			<h2  class="single-team-arts__title"><?php echo esc_html( $sp_cooperator_title ); ?></h2>
			<?php if ( ! empty( $sp_cooperator_items ) ) : ?>
			<p class="single-team-arts__data">
				<?php echo wp_kses_post( $sp_cooperator_items ); ?>
			</p>
			<?php endif; ?>
		</div>
	</div>
	<?php if ( ! empty( $sp_related ) ) : ?>
	<div class="single-team-arts__slider-element">
		<div class="single-team-arts__slider-wrapper">
			<div class="single-team-arts__slider-counter">
				<span class="current-slide">1</span>
				<span>/</span>
				<span class="total-slides"></span>
			</div>
			<div class="single-team-arts__slider-arrows">
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
			<div class="single-team-arts__slider">
				<?php
				foreach ( $sp_related as $slide ) :
					$slide_img 		= wp_get_attachment_image( get_post_thumbnail_id( $slide ), 'slider-image' );
					$slide_title 	= get_the_title( $slide );
					$slide_type 	= get_the_terms( $slide, 'typ' );
					if ( ! empty( $slide_img ) ) :
						?>
						<div class="single-team-arts__slide">
							<a href="<?php echo esc_url( get_permalink( $slide ) ); ?>" class="single-team-arts__slide-img-link">
								<figure class="single-team-arts__slide-image">
									<?php echo wp_kses_post( $slide_img ); ?>
								</figure>
							</a>
							<p class="single-team-arts__slide-type"><?php echo esc_html( $slide_type[0]->name ); ?></p>
							<a href="<?php echo esc_url( get_permalink( $slide ) ); ?>" class="single-team-arts__slide-link">
								<p class="single-team-arts__slide-title"><?php echo esc_html( $slide_title ); ?></p>
							</a>
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
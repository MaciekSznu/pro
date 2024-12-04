<?php
/**
 * The default content partial - slider.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$slider = $slider ?? null;

if ( ! empty( $slider ) ) :
	load_script( 'default-content/parts/slider', 'default-content-slider', array('slick_script') );
	?>
	<div class="default-content__slider-element">
		<?php load_styles_components( 'sliders' ); ?>
		<?php load_styles_third( 'slick' ); ?>
		<div class="default-content__slider-wrapper">
			<div class="default-content__slider-counter">
				<span class="current-slide">1</span>
				<span>/</span>
				<span class="total-slides"></span>
			</div>
			<div class="default-content__slider-arrows">
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
			<div class="default-content__slider">
				<?php
				foreach ( $slider as $slide ) :
					$slide_img = wp_get_attachment_image( $slide, 'slider-image' );
					if ( ! empty( $slide_img ) ) :
						?>
						<div class="default-content__slide">
							<figure class="default-content__slide-image">
								<?php echo wp_kses_post( $slide_img ); ?>
							</figure>
						</div>
						<?php
					endif;
				endforeach;
				?>
			</div>
		</div>
	</div>
	<?php
endif;
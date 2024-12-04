<?php
/**
 * The single oferta partial - top.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$so_subtitle 			= get_field( 'so_subtitle' );
$so_short_description 	= get_field( 'so_short_description' );
$so_parameters 			= get_field( 'so_parameters' );

$item_id 		= get_the_ID();
$item_place 	= get_the_terms( $item_id, 'miejsce' ); 
$item_audience 	= get_the_terms( $item_id, 'odbiorca' ); 
$item_type 		= get_the_terms( $item_id, 'typ' );

?>
<section class="single-offer-top">
	<div class="container">
		<?php if ( ! empty( $so_subtitle ) ) : ?>
			<h3 class="single-offer-top__intro"><?php echo esc_html( $so_subtitle ); ?></h3>
		<?php endif; ?>
		<div class="single-offer-top__data-wrapper">
			<div class="single-offer-top__data">
				<?php if ( ! empty( $item_type ) || ! empty( $item_place ) || ! empty( $item_audience ) ) : ?>
					<div class="single-offer-top__data-col">
						<?php if ( ! empty( $item_type ) ) : ?>
							<div class="single-offer-top__data-item">
								<p class="single-offer-top__data-item-title black"><?php echo esc_html_e( 'Co', 'pro' ); ?></p>
								<p class="single-offer-top__data-item-value"><?php echo esc_html( $item_type[0]->name ); ?></p>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $item_place ) ) : ?>
							<div class="single-offer-top__data-item">
								<p class="single-offer-top__data-item-title black"><?php echo esc_html_e( 'Gdzie', 'pro' ); ?></p>
								<p class="single-offer-top__data-item-value"><?php echo esc_html( $item_place[0]->name ); ?></p>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $item_audience ) ) : ?>
							<div class="single-offer-top__data-item">
								<p class="single-offer-top__data-item-title black"><?php echo esc_html_e( 'Dla kogo', 'pro' ); ?></p>
								<p class="single-offer-top__data-item-value"><?php echo esc_html( $item_audience[0]->name ); ?></p>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $so_parameters ) ) : ?>
					<div class="single-offer-top__data-col">
						<?php
							foreach( $so_parameters as $item ) {
								if ( ! empty( $item['title'] && ! empty( $item['value'] ) ) ) :
									?>
										<div class="single-offer-top__data-item">
											<p class="single-offer-top__data-item-title black"><?php echo esc_html( $item['title'] ); ?></p>
											<p class="single-offer-top__data-item-value"><?php echo esc_html( $item['value'] ); ?></p>
										</div>
									<?php
								endif;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
			<div class="single-offer-top__description">
				<p><?php echo esc_html( $so_short_description ); ?></p>
			</div>
		</div>
		<div class="single-offer-top__buttons">
			<div class="single-offer-top__button">
				<?php 
					get_theme_part( 
						'components/button/index',
						array(
							'button' => array(
								'title' => __( 'Zarezerwuj spektakl', 'pro' ),
								'url' 	=> '#kontakt',
							)
						) 
					);
				?>
			</div>
			<div class="single-offer-top__button">
				<?php 
					get_theme_part( 
						'components/button/index',
						array(
							'button' => array(
								'title' 		=> __( 'Nagranie całości i materiały do pobrania', 'pro' ),
								'url' 			=> '#download',
							),
							'button_class' 	=> 'c-btn c-btn--secondary',
						) 
					);
				?>
			</div>
		</div>
	</div>
</section>

<?php
/**
 * The offer card partial.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$card = $card ?? null;

if ( ! empty( $card ) ) {
	$card_img 	= wp_get_attachment_image( get_post_thumbnail_id( $card ), 'slider-image' );
	$card_title = get_the_title( $card );
	$card_type 	= get_the_terms( $card, 'typ' );
	if ( ! empty( $card_title ) && ! empty( $card_img ) && ! empty( $card_type ) ) :
		?>
			<div class="single-offer-card">
				<a href="<?php echo esc_url( get_permalink( $card ) ); ?>" class="single-offer-card__img-link">
					<figure class="single-offer-card__image">
						<?php echo wp_kses_post( $card_img ); ?>
					</figure>
				</a>
				<p class="single-offer-card__type"><?php echo esc_html( $card_type[0]->name ); ?></p>
				<a href="<?php echo esc_url( get_permalink( $card ) ); ?>" class="single-offer-card__link">
					<p class="single-offer-card__title"><?php echo esc_html( $card_title ); ?></p>
				</a>
			</div>
		<?php 
	endif;
}

<?php
/**
 * The footer component.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$of_reservation_title 	= ! empty( get_field ( 'of_reservation_title', 'option' ) ) ? get_field ( 'of_reservation_title', 'option') : __( 'Rezerwacje', 'pro' );
$of_reservation_email 	= get_field ( 'of_reservation_email', 'option' );
$of_reservation_phones 	= get_field ( 'of_reservation_phones', 'option' );
$of_form_title 			= ! empty( get_field ( 'of_form_title', 'option' ) ) ? get_field ( 'of_form_title', 'option') : '';
$of_form_shortcode 		= get_field ( 'of_form_shortcode', 'option' );

$of_logo 			= get_field ( 'of_logo', 'option' );
$of_address 		= get_field ( 'of_address', 'option' );
$of_social_media 	= get_field ( 'of_social_media', 'option' );

$of_links = get_field ( 'of_links', 'option' );

?>
<footer class="main-footer" role="contentinfo">
	<?php load_styles( __DIR__, 'footer' ); ?>
	<div class="main-footer__top">
		<div class="container">
			<div class="main-footer__top-wrapper">
				<h1 class="main-footer__title"><?php echo esc_html_e( 'Kontakt', 'pro' ); ?></h1>
				<div class="main-footer__reservations">
					<p class="main-footer__reservations-title lead black"><?php echo esc_html( $of_reservation_title ); ?></p>
					<div class="main-footer__reservations-links">
						<?php if( ! empty( $of_reservation_email ) ) : ?>
							<p class="lead">
								<a href="mailto:<?php echo esc_attr( $of_reservation_email ); ?>" class="main-footer__reservations-link"><?php echo esc_html( $of_reservation_email ); ?></a>
							</p>
						<?php endif; ?>
						<?php if( ! empty( $of_reservation_phones ) ) : ?>
						<div class="main-footer__reservations-phones">
							<?php foreach( $of_reservation_phones as $item ) : ?>
								<p class="main-footer__reservations-phone lead">
									<span><?php echo esc_html( $item['person'] ); ?></span>&nbsp;&nbsp;&nbsp;<a href="tel:<?php echo esc_attr( $item['phone'] ); ?>"><?php echo esc_html( $item['phone'] ); ?></a>
								</p>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<?php if( ! empty( $of_form_shortcode ) ) : ?>
				<div class="main-footer__form-wrapper">
					<p class="main-footer__form-title lead black"><?php echo wp_kses_post( $of_form_title ); ?></p>
					<div class="main-footer__form">
						<?php echo do_shortcode( $of_form_shortcode ); ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="main-footer__mid">
		<div class="container">
			<div class="main-footer__mid-wrapper">
				<?php if ( ! empty( $of_logo ) ) : ?>
				<figure class="main-footer__mid-logo">
					<?php echo f_img( $of_logo, 'footer-logo'); ?>
				</figure>
				<?php endif; ?>
				<div class="main-footer__mid-right">
					<div class="main-footer__mid-contact">
						<?php echo wp_kses_post( $of_address ); ?>
					</div>
					<div class="main-footer__mid-socials">
						<?php foreach( $of_social_media as $item ) : ?>
							<a href="<?php echo esc_url( $item['link']['url'] ); ?>" target="_blank">
								<?php echo f_img( $item['icon'], 'social-icon'); ?>
							</a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main-footer__bottom">
		<div class="container">
			<div class="main-footer__bottom-links">
				<?php foreach( $of_links as $item ) : ?>
					<a href="<?php echo esc_url( $item['link']['url'] ); ?>" target="_blank">
						<?php echo f_img( $item['logo'], 'footer-logo-bottom'); ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</footer>

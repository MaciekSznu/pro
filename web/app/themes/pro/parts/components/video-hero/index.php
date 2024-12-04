<?php
/**
 * The hero component.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */


$hero_custom_title		= get_field( 'hero_title' );
$hero_video_file		= get_field( 'hero_video_file' );
$hero_video_placeholder	= get_field( 'hero_video_placeholder' );

$hero_title = ! empty( $hero_custom_title ) ? $hero_custom_title : get_the_title();

if ( ! empty( $hero_video_file ) && ! empty( $hero_video_placeholder ) ) :
	?>
	<section class="video-hero">
		<?php load_styles( __DIR__, 'video-hero' ); ?>
		<div class="video-hero__video-wrapper">
			<figure class="video-hero__video-placeholder">
				<?php echo wp_get_attachment_image( $hero_video_placeholder, 'hero-placeholder' ); ?>
			</figure>
			<video class="video-hero__video" src="" data-src="<?php echo esc_attr ( $hero_video_file ); ?>" autoplay="true" loop muted></video>
		</div>
		<div class="container">
			<div class="video-hero__content-wrapper">
				<div class="video-hero__title-wrapper">
					<?php if ( is_singular( 'oferta' ) ) : ?>
						<h1 class="video-hero__title video-hero__title"><?php echo esc_html ( $hero_title ); ?></h1>
						<a href="#intro" class="video-hero__button">
					<?php else : ?>
						<h3 class="video-hero__title"><?php echo esc_html ( $hero_title ); ?></h3>
						<a href="#<?php echo esc_html_e( 'oferta', 'pro' ); ?>" class="video-hero__button">
					<?php endif; ?>
							<span>
								<svg width="15" height="34" viewBox="0 0 15 34" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11.93 31.97C11.57 32.78 11.09 33.2 10.37 33.2C9.41003 33.2 8.42003 32.45 8.03003 31.07C8.96003 28.49 9.44003 26.39 9.50003 24.26C8.54003 24.77 7.61003 24.29 7.10003 22.76C6.80003 23.09 6.47003 23.3 6.02003 23.3C5.15003 23.3 4.76003 22.61 4.40003 21.89C4.01003 22.19 3.62003 22.31 3.29003 22.31C1.13003 22.31 0.200029 17.18 0.200029 14.03C0.200029 9.46998 2.18003 7.81998 2.18003 4.33998C2.18003 3.19998 1.97003 1.72998 1.67003 0.169982L10.91 0.169983C10.67 9.19998 14.78 13.58 14.78 19.13C14.78 23.42 13.25 29.12 11.93 31.97ZM9.11003 31.07C9.26003 31.43 9.59003 31.88 10.13 31.88C10.49 31.88 10.7 31.7 10.91 31.25C12.14 28.7 13.61 23 13.61 19.22C13.61 15.74 11.87 12.47 10.73 8.29998C8.18003 7.09998 5.42003 6.94998 3.08003 6.94998C2.57003 9.28998 1.40003 10.58 1.40003 14.18C1.40003 17.06 2.12003 20.84 3.53003 20.84C3.95003 20.84 4.19003 20.45 4.55003 20.15C4.79003 20.93 5.09003 22.1 5.87003 22.1C6.35003 22.1 6.83003 21.68 7.22003 21.17C7.82003 23.03 8.84003 23.42 9.50003 23C9.47003 22.25 9.38003 21.5 9.26003 20.69L10.49 21.2C11 23.78 10.43 27.8 9.11003 31.07ZM3.08003 1.42998C3.23003 2.38998 3.35003 3.40998 3.35003 4.48998C3.35003 4.99998 3.32003 5.44998 3.26003 5.86998C5.54003 5.86998 7.82003 5.92998 10.34 6.64998C10.01 5.05998 9.77003 3.34998 9.77003 1.42998L3.08003 1.42998ZM8.45003 3.79998C8.45003 4.21998 8.12003 4.54998 7.70003 4.54998C7.28003 4.54998 6.95003 4.21998 6.95003 3.79998C6.95003 3.37998 7.28003 3.04998 7.70003 3.04998C8.12003 3.04998 8.45003 3.37998 8.45003 3.79998Z" fill="white"/>
								</svg>
							</span>
						</a>
					</div>
			</div>
		</div>
	</section>
	<?php
endif;

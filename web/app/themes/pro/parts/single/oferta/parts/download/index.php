<?php
/**
 * The single oferta partial - download.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$so_files_title 	= ! empty( get_field( 'so_files_title' ) ) ? get_field( 'so_files_title' ) : __( 'Materiały o spektaklu', 'pro' );
$so_video_url 		= get_field( 'so_video_url' );
$so_download_title 	= ! empty( get_field( 'so_download_title' ) ) ? get_field( 'so_download_title' ) : __( 'Do pobrania', 'pro' );
$so_files 			= get_field( 'so_files' );

?>
<section class="single-offer-download">
	<div class="container">
		<h2 class="single-offer-download__title"><?php echo esc_html( $so_files_title ); ?></h2>
		<div class="single-offer-download__wrapper">
			<?php if ( ! empty( $so_video_url ) ) : ?>
				<div class="single-offer-download__video">
					<iframe width="645" height="430" src="<?php echo esc_attr ( convert_vimeo_url( $so_video_url ) ); ?>" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			<?php endif; ?>
			<?php if( ! empty( $so_files ) ) : ?>
			<div class="single-offer-download__links">
				<p class="single-offer-download__links-title black"><?php echo esc_html( $so_download_title ); ?></p>
				<?php 
					foreach( $so_files as $item ) {
						if ( ! empty( $item['label'] && ! empty( $item['file'] ) ) ) :
							?>
								<div class="single-offer-download__link-wrapper">
									<?php get_theme_part( 'components/hand/index' ); ?>
									<a class="single-offer-download__link" href="<?php echo esc_url( $item['file'] ); ?>" download><?php echo esc_html( $item['label'] ); ?></a>
								</div>
							<?php
						endif;
					}
				?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>

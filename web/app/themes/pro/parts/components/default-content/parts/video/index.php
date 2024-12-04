<?php
/**
 * The default content partial - video.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$video = $video ?? null;

if ( ! empty( $video ) ) :
	load_script( 'default-content/parts/video', 'default-content-video', array() );
	?>
		<div class="container">
			<div class="default-content__video-wrapper">
				<div class="default-content__video-placeholder"></div>
				<video class="default-content__video" src="" data-src="<?php echo esc_attr ( $video ); ?>" muted></video>
				<button class="js-play-video" type="button">
					<span class="play">
						<svg width="60" height="70" viewBox="0 0 60 70" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_115_619)">
								<path d="M60.0002 34.7277L0.272949 69.2113L0.272952 0.244141L60.0002 34.7277Z" fill="white" />
							</g>
							<defs>
								<clipPath id="clip0_115_619">
									<rect width="60" height="69.4545" fill="white" />
								</clipPath>
							</defs>
						</svg>
					</span>
					<span class="pause">
						<svg width="60" height="70" viewBox="0 0 60 70" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect width="22" height="70" fill="white"/>
							<rect x="38" width="22" height="70" fill="white"/>
						</svg>
					</span>
				</button>
			</div>
		</div>
	<?php
endif;
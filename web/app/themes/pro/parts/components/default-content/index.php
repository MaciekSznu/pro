<?php
/**
 * The default content component.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$default_content = get_field( 'content' );

if ( ! empty( $default_content ) ) :
	?>
	<section class="default-content">
		<?php load_styles( __DIR__, 'default-content' ); ?>
		<?php foreach ( $default_content as $item )
			{
				$content_type = $item['content_type'];
				switch ( $content_type ) {
					case 'title':
						get_theme_part( 
							'components/default-content/parts/title/index', 
							array(
								'content_title_type' 	=> $item['content_title_type'],
								'content_title' 		=> $item['content_title'],
							)
						);
						break;
					case 'lead':
						get_theme_part( 
							'components/default-content/parts/lead/index', 
							array(
								'lead' => $item['lead'],
							)
						);
						break;
					case 'text':
						get_theme_part( 
							'components/default-content/parts/text/index', 
							array(
								'text_content' => $item['text_content'],
							)
						);
						break;
					case 'video':
						get_theme_part( 
							'components/default-content/parts/video/index', 
							array(
								'video' => $item['video'],
							)
						);
						break;
					case 'slider':
						get_theme_part( 
							'components/default-content/parts/slider/index', 
							array(
								'slider' => $item['slider'],
							)
						);
						break;
					case 'blockquote':
						get_theme_part( 
							'components/default-content/parts/blockquote/index', 
							array(
								'blockquote' 	=> $item['blockquote'],
								'signature'		=> $item['signature'],
							)
						);
						break;
				}
			}
		?>
	</section>
	<?php
endif;
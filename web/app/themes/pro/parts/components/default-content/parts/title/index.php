<?php
/**
 * The default content partial - title.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$content_title_type = $content_title_type ?? 'h1';
$content_title = $content_title ?? null;

if ( ! empty( $content_title ) ) :
	?>	
		<div class="container">
			<<?php echo $content_title_type; ?> class="default-content__title">
				<?php echo esc_html( $content_title ); ?>
			</<?php echo $content_title_type; ?>>
		</div>
	<?php
endif;
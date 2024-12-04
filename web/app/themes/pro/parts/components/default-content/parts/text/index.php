<?php
/**
 * The default content partial - text.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$text_content = $text_content ?? null;

if ( ! empty( $text_content ) ) :
	?>
		<div class="container">
			<div class="default-content__text-content">
				<?php echo wp_kses_post( $text_content ); ?>
			</div>
		</div>
	<?php
endif;
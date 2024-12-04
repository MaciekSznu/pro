<?php
/**
 * The default content partial - blockquote.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$blockquote = $blockquote ?? null;
$signature = $signature ?? null;

if ( ! empty( $blockquote ) ) :
	?>
		<div class="container">
			<div class="default-content__blockquote">
				<blockquote>
					<p class="lead black"><?php echo wp_kses_post( $blockquote ); ?></p>
				</blockquote>
				<?php if ( ! empty( $signature ) ) : ?>
					<p><?php echo esc_html( $signature ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	<?php
endif;
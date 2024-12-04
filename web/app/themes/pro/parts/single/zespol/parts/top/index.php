<?php
/**
 * The single zespol partial - top.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$sp_intro = get_field( 'sp_intro' );

?>
<section class="single-team-top">
	<div class="container">
		<h1 class="single-team-top__intro"><?php echo esc_html( get_the_title() ); ?></h1>
		<?php if ( ! empty( $sp_intro ) ) : ?>
		<div class="single-team-top__description">
			<p class="lead"><?php echo wp_kses_post( $sp_intro ); ?></p>
		</div>
		<?php endif; ?>
	</div>
</section>

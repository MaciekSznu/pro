<?php
/**
 * The default content partial - lead.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$lead = $lead ?? null;

if ( ! empty( $lead ) ) :
	?>	
		<div class="container">
			<p class="default-content__lead lead">
				<?php echo wp_kses_post( $lead ); ?>
			</p>
		</div>
	<?php
endif;
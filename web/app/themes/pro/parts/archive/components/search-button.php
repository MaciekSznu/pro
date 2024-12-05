<?php
/**
 * The archive search button template file.
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

// $icon_image		= get_field( 'o_button_icon', 'options' );
// $found_posts	= ! empty( $found_posts ) ? $found_posts : '';

?>
<div class="archive-search__button-wrapper">
	<button type="button" value="search" class="c-btn c-btn--primary">
		<span><?php echo esc_html_e( 'Filtruj', 'pro' ); ?></span>
		<?php get_theme_part( 'components/hand/index' ); ?>
	</button>
</div>

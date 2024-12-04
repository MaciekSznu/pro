<?php
/**
 * The button partial.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$button            = $button ?? null;
$button_class      = isset( $button_class ) ? $button_class : 'c-btn c-btn--primary';

if ( ! empty( $button ) ) {
	$button_title  = $button['title'];
	$button_url    = $button['url'];
	$button_target = ! empty( $button['target'] ) ? ' target=_blank rel=noopener' : ' target=_self';
	?>
		<a href="<?php echo esc_url( $button_url ); ?>"<?php echo esc_attr( $button_target ); ?> class="<?php echo esc_attr( $button_class ); ?>">
			<?php if ( ! empty( $button_title ) ) : ?>
				<span><?php echo esc_html( $button_title ); ?></span>
			<?php endif; ?>
			<?php get_theme_part( 'components/hand/index' ); ?>
		</a>
	<?php
}
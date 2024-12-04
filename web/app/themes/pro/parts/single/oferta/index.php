<?php
/**
 * Single oferta
 *
 * @package WordPress
 * @subpackage zoom
 * @since zoom 1.0
 */


?>
<?php get_theme_part( 'components/video-hero/index' ); ?>
<?php get_theme_part( 'single/oferta/parts/top/index' ); ?>
<article class="single-offer-content">
	<?php load_styles( __DIR__, 'single/oferta' ); ?>
	<?php get_theme_part( 'components/default-content/index' ); ?>
</article>
<?php get_theme_part( 'single/oferta/parts/team/index' ); ?>
<?php get_theme_part( 'single/oferta/parts/download/index' ); ?>

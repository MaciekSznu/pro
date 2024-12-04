<?php
/**
 * Single zespol
 *
 * @package WordPress
 * @subpackage zoom
 * @since zoom 1.0
 */


?>
<?php get_theme_part( 'single/zespol/parts/top/index' ); ?>
<article class="single-team-content">
	<?php load_styles( __DIR__, 'single/zespol' ); ?>
	<?php get_theme_part( 'components/default-content/index' ); ?>
</article>
<?php get_theme_part( 'single/zespol/parts/arts/index' ); ?>

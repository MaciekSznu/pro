<?php
/**
 * The static page template.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

get_header();
the_post();
?>
<main id="main-content" class="page-content" role="main">
	<?php load_styles_components( 'page' ); ?>
	<div class="page-entry">
		<?php get_theme_part( 'components/video-hero/index' ); ?>
		<?php get_theme_part( 'components/default-content/index' ); ?>
	</div>
</main>
<?php
get_footer();

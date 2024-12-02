<?php
/**
 * Loop for home page.
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

?>
<section class="posts-content">
	<?php
	while ( have_posts() ) :
		the_post();
		get_theme_part( 'single/post/index' );
	endwhile;
	?>
</section>

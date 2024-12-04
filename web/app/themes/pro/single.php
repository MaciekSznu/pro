<?php
/**
 * The single post page template.
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

get_header();
the_post();
$this_post_type = get_post_type();
?>
	<main id="main-content" class="page-content page-content--single page-content-single--<?php echo esc_attr( $this_post_type ); ?>" role="main">
	<?php
	switch ( $this_post_type ) {
		case 'oferta':
			get_theme_part( 'single/oferta/index' );
			break;
		case 'zespol':
			get_theme_part( 'single/zespol/index' );
			break;
		default:
			get_theme_part( 'single/post/index' );
	}
	?>
	</main>
<?php
get_footer();

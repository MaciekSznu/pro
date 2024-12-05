<?php
/**
 * Posts loop
 *
 * @package    WordPress
 * @subpackage pro
 * @since      pro 1.0
 */

/**
 * Posts loop
 *
 * @param  WP_Query $query  	Wp Query.
 * @param  string   $p_type 	Post type.
 * @param  string   $ppp 		Post per page.
 */
function posts_loop( $query, $p_type, $ppp ) {
	ob_start();
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$p_id = get_the_ID();
			if ( 'oferta' === $p_type ) {
				get_theme_part( 'archive/oferta/parts/offer-card', array( 'card' => $p_id ) );
			}
		}
		wp_reset_postdata();
	} else {
		?>
			<h2 style="margin: 1rem 0;"><?php esc_html_e( 'Nic nie znaleziono', 'pro' ); ?></h2>
		<?php
	}
	return ob_get_clean();
}

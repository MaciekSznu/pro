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
			<span class="icon">
				<svg width="41" height="19" viewBox="0 0 41 19" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M39.3631 4.31871C40.3621 4.76271 40.8801 5.35471 40.8801 6.24271C40.8801 7.42671 39.9551 8.64771 38.2531 9.12871C35.0711 7.98171 32.4811 7.38971 29.8541 7.31571C30.4831 8.49971 29.8911 9.64671 28.0041 10.2757C28.4111 10.6457 28.6701 11.0527 28.6701 11.6077C28.6701 12.6807 27.8191 13.1617 26.9311 13.6057C27.3011 14.0867 27.4491 14.5677 27.4491 14.9747C27.4491 17.6387 21.1221 18.7857 17.2371 18.7857C11.6131 18.7857 9.57807 16.3437 5.28607 16.3437C3.88007 16.3437 2.06707 16.6027 0.143066 16.9727L0.143066 5.57671C11.2801 5.87271 16.6821 0.803711 23.5271 0.803711C28.8181 0.803711 35.8481 2.69071 39.3631 4.31871ZM38.2531 7.79671C38.6971 7.61171 39.2521 7.20471 39.2521 6.53871C39.2521 6.09471 39.0301 5.83571 38.4751 5.57671C35.3301 4.05971 28.3001 2.24671 23.6381 2.24671C19.3461 2.24671 15.3131 4.39271 10.1701 5.79871C8.69007 8.94371 8.50507 12.3477 8.50507 15.2337C11.3911 15.8627 12.9821 17.3057 17.4221 17.3057C20.9741 17.3057 25.6361 16.4177 25.6361 14.6787C25.6361 14.1607 25.1551 13.8647 24.7851 13.4207C25.7471 13.1247 27.1901 12.7547 27.1901 11.7927C27.1901 11.2007 26.6721 10.6087 26.0431 10.1277C28.3371 9.38771 28.8181 8.12971 28.3001 7.31571C27.3751 7.35271 26.4501 7.46371 25.4511 7.61171L26.0801 6.09471C29.2621 5.46571 34.2201 6.16871 38.2531 7.79671ZM1.69707 15.2337C2.88107 15.0487 4.13907 14.9007 5.47107 14.9007C6.10007 14.9007 6.65507 14.9377 7.17307 15.0117C7.17307 12.1997 7.24707 9.38771 8.13507 6.27971C6.17407 6.68671 4.06507 6.98271 1.69707 6.98271L1.69707 15.2337ZM4.62007 8.61071C5.13807 8.61071 5.54507 9.01771 5.54507 9.53571C5.54507 10.0537 5.13807 10.4607 4.62007 10.4607C4.10207 10.4607 3.69507 10.0537 3.69507 9.53571C3.69507 9.01771 4.10207 8.61071 4.62007 8.61071Z"
						fill="#fff" />
				</svg>
			</span>
		</a>
	<?php
}

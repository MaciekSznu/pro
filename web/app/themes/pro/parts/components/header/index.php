<?php
/**
 * The header component.
 *
 * @package WordPress
 * @subpackage pro
 * @since pro 1.0
 */

$logo_text	= ! empty( get_field( 'oh_text_logo', 'option' ) ) ? get_field( 'oh_text_logo', 'option') : __( 'Sztukmistrze PRO', 'pro' );


load_script( 'header', 'pro/header' );
?>
<header class="main-header" role="banner">
	<?php load_styles( __DIR__, 'header' ); ?>
	<div class="container">
		<div class="main-header__wrapper">
			<div class="main-header__logo-wrapper">
				<a href="<?php echo home_url(); ?>" class="main-header__logo-link" title="<?php echo esc_attr( $logo_text ); ?>">
					<span><?php echo esc_html( $logo_text ); ?></span>
				</a>
			</div>
			<nav class="main-nav" role="navigation" aria-label="<?php esc_html_e( 'Menu główne', 'pro' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
					)
				);
				?>
			</nav>
			<button class="main-header__button" type="button" aria-label="<?php echo esc_attr_e( 'Przełącz nawigację', 'pro' ); ?>">
				<span class="main-header__button-icon"></span>
				<span class="main-header__button-icon"></span>
				<span class="main-header__button-icon"></span>
			</button>
		</div>
	</div>
</header>

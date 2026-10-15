<?php
/**
 * Global header.
 *
 * @package activate-hardrock
 */

$logo = has_custom_logo() ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : abh_img( 'logo' );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#0d131b">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>

<div class="topbar">
	<div class="container topbar__inner">
		<div class="topbar__left">
			<span><?php echo abh_icon( 'pin' ); // phpcs:ignore ?><?php echo esc_html( abh_opt( 'address' ) ); ?></span>
			<span class="topbar__hide-md"><?php echo abh_icon( 'snow' ); // phpcs:ignore ?>Fully air conditioned venue</span>
		</div>
		<div class="topbar__right">
			<a href="mailto:<?php echo esc_attr( abh_opt( 'email' ) ); ?>"><?php echo abh_icon( 'mail' ); // phpcs:ignore ?><?php echo esc_html( abh_opt( 'email' ) ); ?></a>
			<?php abh_social_list( 'socials socials--top' ); ?>
		</div>
	</div>
</div>

<header class="site-header" data-header>
	<div class="scroll-progress" aria-hidden="true"><span data-progress></span></div>
	<div class="container site-header__inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> home">
			<img src="<?php echo esc_url( $logo ); ?>" alt="Activate by Hardrock" width="600" height="250">
		</a>

		<nav class="nav" aria-label="Primary">
			<?php abh_primary_menu( 'nav__list' ); ?>
		</nav>

		<div class="header-actions">
			<a class="header-phone" href="<?php echo esc_attr( abh_tel() ); ?>">
				<span class="phone-circle"><?php echo abh_icon( 'phone' ); // phpcs:ignore ?></span>
				<span class="header-phone__text"><small>Call us</small><strong><?php echo esc_html( abh_opt( 'phone' ) ); ?></strong></span>
			</a>
			<a class="btn btn--primary btn--sm header-book" href="<?php echo esc_url( abh_opt( 'booking_url' ) ); ?>" target="_blank" rel="noopener">
				<span>Book Now</span><?php echo abh_icon( 'arrow' ); // phpcs:ignore ?>
			</a>
			<button class="burger" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu" data-menu-toggle>
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>

<div class="mobile-menu" id="mobile-menu" aria-hidden="true" data-mobile-menu>
	<div class="mobile-menu__backdrop" data-menu-close></div>
	<div class="mobile-menu__panel" role="dialog" aria-modal="true" aria-label="Menu">
		<div class="mobile-menu__head">
			<img src="<?php echo esc_url( $logo ); ?>" alt="Activate by Hardrock" width="600" height="250">
			<button class="mobile-menu__close" type="button" aria-label="Close menu" data-menu-close><?php echo abh_icon( 'close' ); // phpcs:ignore ?></button>
		</div>
		<nav class="mobile-nav" aria-label="Mobile">
			<?php abh_primary_menu( 'mobile-nav__list' ); ?>
		</nav>
		<div class="mobile-menu__foot">
			<a class="btn btn--primary btn--block" href="<?php echo esc_url( abh_opt( 'booking_url' ) ); ?>" target="_blank" rel="noopener"><span>Book Tickets</span><?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></a>
			<a class="btn btn--sky btn--block" href="<?php echo esc_attr( abh_tel() ); ?>"><?php echo abh_icon( 'phone' ); // phpcs:ignore ?><span><?php echo esc_html( abh_opt( 'phone' ) ); ?></span></a>
			<?php abh_social_list( 'socials socials--menu' ); ?>
		</div>
	</div>
</div>

<main id="main" class="site-main">

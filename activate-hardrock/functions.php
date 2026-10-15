<?php
/**
 * Activate by Hardrock theme functions.
 *
 * @package activate-hardrock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ABH_VERSION', '1.0.0' );
define( 'ABH_DIR', get_template_directory() );
define( 'ABH_URI', get_template_directory_uri() );

require_once ABH_DIR . '/inc/icons.php';
require_once ABH_DIR . '/inc/helpers.php';
require_once ABH_DIR . '/inc/customizer.php';
require_once ABH_DIR . '/inc/enquiry.php';
require_once ABH_DIR . '/inc/menus.php';

/**
 * Theme setup.
 */
function abh_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 600,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'activate-hardrock' ),
			'footer'  => __( 'Footer Useful Links', 'activate-hardrock' ),
		)
	);

	add_image_size( 'abh-card', 760, 540, true );
}
add_action( 'after_setup_theme', 'abh_setup' );

/**
 * Front end assets.
 */
function abh_assets() {
	wp_enqueue_style(
		'abh-fonts',
		'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'abh-main', ABH_URI . '/assets/css/main.css', array( 'abh-fonts' ), ABH_VERSION );
	wp_enqueue_script( 'abh-main', ABH_URI . '/assets/js/main.js', array(), ABH_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'abh_assets' );

/**
 * Preconnect to Google Fonts and preload hero image for faster LCP.
 */
function abh_resource_hints() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	if ( is_front_page() ) {
		echo '<link rel="preload" as="image" href="' . esc_url( abh_img( 'hero' ) ) . '" fetchpriority="high">' . "\n";
	}
}
add_action( 'wp_head', 'abh_resource_hints', 1 );

/**
 * Body classes.
 */
function abh_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'abh-home';
	}
	return $classes;
}
add_filter( 'body_class', 'abh_body_classes' );

/**
 * LocalBusiness schema for local SEO.
 */
function abh_schema() {
	if ( ! is_front_page() ) {
		return;
	}
	$schema = array(
		'@context'  => 'https://schema.org',
		'@type'     => 'AmusementPark',
		'name'      => 'Activate by Hardrock',
		'url'       => home_url( '/' ),
		'image'     => abh_img( 'hero' ),
		'telephone' => abh_opt( 'phone' ),
		'email'     => abh_opt( 'email' ),
		'address'   => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => '4/444 Warrigal Road',
			'addressLocality' => 'Heatherton',
			'addressRegion'   => 'VIC',
			'postalCode'      => '3202',
			'addressCountry'  => 'AU',
		),
		'geo'       => array(
			'@type'     => 'GeoCoordinates',
			'latitude'  => -37.946,
			'longitude' => 145.079,
		),
		'sameAs'    => array_values( abh_socials() ),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>' . "\n";
}
add_action( 'wp_head', 'abh_schema' );

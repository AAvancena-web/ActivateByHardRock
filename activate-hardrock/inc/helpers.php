<?php
/**
 * Helper functions.
 *
 * @package activate-hardrock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Real Activate by Hardrock imagery, sourced from the existing media library
 * (wp-content/media/...). If a file with the same name is placed in
 * assets/images/ it is served from the theme instead.
 *
 * @param string $key Image key.
 * @return string
 */
function abh_img( $key ) {
	$map = array(
		'hero'          => '2020/06/header-climb.jpg',
		'logo'          => '2020/06/logo.png',
		'logo-footer'   => '2020/06/Clear-logo.png',
		'party'         => '2020/06/new-web-2-1.jpg',
		'caving-duo'    => '2020/06/new-web-4-1.jpg',
		'climb-tower'   => '2020/06/Untitled-7.jpg',
		'drop-slide'    => '2020/06/new-web-6.jpg',
		'leap'          => '2020/06/new-web-5.jpg',
		'leap-2'        => '2020/09/MG_94782.jpg',
		'caving'        => '2020/06/DSC_3746_large_medium_small.jpg',
		'stalactite'    => '2020/06/DSC_3248_stalactite_large_medium.jpg',
		'speedwall'     => '2020/06/speedwall.jpg',
		'coaching'      => '2020/06/triffid.jpg',
		'scouts'        => '2020/06/DSC_3629_large_medium_small.jpg',
		'crag'          => '2020/06/crag.jpg',
		'bigcheese'     => '2020/06/Bigcheese.jpg',
		'dryice'        => '2020/06/dryice.jpg',
		'twister'       => '2020/06/twister.jpg',
		'astroball'     => '2020/06/astroball.jpg',
		'ladder'        => '2020/06/ladder.jpg',
		'excursions'    => '2020/09/School-Image.jpg',
		'adults'        => '2020/09/MG_00772.jpg',
		'multipass'     => '2022/11/multi-pass4-3.jpg',
		'low-sensory'   => '2026/06/v-sml-web.png',
		'holiday'       => '2020/11/thumbnail-2.jpeg',
		'gift-cards'    => '2020/10/gift-cards.png',
		'gift-cards-2'  => '2020/07/gift-cards-4.jpg',
		'group'         => '2020/08/DSCF7176.jpg',
		'party-invites' => '2020/07/party-invites-2.jpg',
	);

	if ( ! isset( $map[ $key ] ) ) {
		return '';
	}

	$file  = $map[ $key ];
	$local = '/assets/images/' . basename( $file );
	if ( file_exists( ABH_DIR . $local ) ) {
		return ABH_URI . $local;
	}

	$base = apply_filters( 'abh_media_base', 'https://www.activatebyhardrock.com.au/media/' );
	return $base . $file;
}

/**
 * Customizer option with defaults.
 *
 * @param string $key Option key.
 * @return string
 */
function abh_opt( $key ) {
	$defaults = abh_defaults();
	$value    = get_theme_mod( 'abh_' . $key, isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
	return '' === $value && isset( $defaults[ $key ] ) ? $defaults[ $key ] : $value;
}

/**
 * Default business details.
 *
 * @return array
 */
function abh_defaults() {
	return array(
		'phone'        => '(03) 9558 1199',
		'email'        => 'info@activatebyhardrock.com.au',
		'address'      => '4/444 Warrigal Road, Heatherton VIC 3202',
		'booking_url'  => 'https://hardrockbook.venuesumo.app/location/activate-by-hardrock',
		'waiver_url'   => 'https://hardrockbook.venuesumo.app/form/?FormID=1&LocationID=1',
		'hours'        => 'Session times vary daily. See our booking page for live availability.',
		'map_query'    => '4/444 Warrigal Road, Heatherton VIC 3202',
		'form_to'      => 'info@activatebyhardrock.com.au',
		'form_shortcode' => '',
		'facebook'     => 'https://www.facebook.com/activatebyhardrock',
		'instagram'    => 'https://www.instagram.com/activatebyhardrock',
		'youtube'      => 'https://www.youtube.com/channel/UC8RTNVJI7AkpF7ahNg4xF1A',
		'twitter'      => 'https://twitter.com/clipnclimbaus',
		'linkedin'     => 'https://www.linkedin.com/company/activatebyhardrock',
	);
}

/**
 * Tel link.
 *
 * @return string
 */
function abh_tel() {
	$digits = preg_replace( '/[^0-9+]/', '', abh_opt( 'phone' ) );
	if ( 0 === strpos( $digits, '0' ) ) {
		$digits = '+61' . substr( $digits, 1 );
	}
	return 'tel:' . $digits;
}

/**
 * Social profile URLs.
 *
 * @return array
 */
function abh_socials() {
	$out = array();
	foreach ( array( 'facebook', 'instagram', 'youtube', 'twitter', 'linkedin' ) as $net ) {
		$url = abh_opt( $net );
		if ( $url ) {
			$out[ $net ] = $url;
		}
	}
	return $out;
}

/**
 * Internal link helper.
 *
 * @param string $path Relative path.
 * @return string
 */
function abh_link( $path ) {
	return home_url( $path );
}

/**
 * Output an eyebrow label.
 *
 * @param string $text Label text.
 * @param string $mod  Modifier class.
 */
function abh_eyebrow( $text, $mod = '' ) {
	printf( '<span class="eyebrow %s"><span class="eyebrow__dot" aria-hidden="true"></span>%s</span>', esc_attr( $mod ), esc_html( $text ) );
}

/**
 * Social icon list.
 *
 * @param string $class Wrapper class.
 */
function abh_social_list( $class = 'socials' ) {
	echo '<ul class="' . esc_attr( $class ) . '">';
	foreach ( abh_socials() as $net => $url ) {
		printf(
			'<li><a href="%1$s" target="_blank" rel="noopener" aria-label="%2$s">%3$s</a></li>',
			esc_url( $url ),
			esc_attr( ucfirst( $net ) ),
			abh_icon( $net ) // phpcs:ignore WordPress.Security.EscapeOutput
		);
	}
	echo '</ul>';
}

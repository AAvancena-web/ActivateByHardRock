<?php
/**
 * Inline SVG icon set (stroke based, 24px grid).
 *
 * @package activate-hardrock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return an inline SVG icon.
 *
 * @param string $name Icon name.
 * @param string $class Extra class.
 * @return string
 */
function abh_icon( $name, $class = '' ) {
	$paths = array(
		'phone'     => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/>',
		'mail'      => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>',
		'pin'       => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>',
		'clock'     => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
		'arrow'     => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'arrow-up-right' => '<path d="M7 17 17 7M8 7h9v9"/>',
		'check'     => '<path d="M20 6 9 17l-5-5"/>',
		'ticket'    => '<path d="M3 9a3 3 0 0 0 0 6v3a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-3a3 3 0 0 1 0-6V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2z"/><path d="M13 4v2M13 11v2M13 18v2"/>',
		'pen'       => '<path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/>',
		'mountain'  => '<path d="m8 3 4 8 5-5 5 15H2z"/>',
		'snow'      => '<path d="M12 2v20M4.93 4.93l14.14 14.14M2 12h20M4.93 19.07 19.07 4.93"/>',
		'cave'      => '<path d="M2 20h20"/><path d="M4 20c0-6 3.5-11 8-11s8 5 8 11"/><path d="M9 20c0-2.5 1.3-5 3-5s3 2.5 3 5"/>',
		'jump'      => '<circle cx="12" cy="4" r="2"/><path d="m6 22 3-7 3 2 3-6M9 10l3-2 4 3"/>',
		'slide'     => '<path d="M4 3v18M4 7c6 0 6 14 16 14"/>',
		'users'     => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
		'cake'      => '<path d="M20 21v-8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8M4 16s.5-1 2-1 2.5 2 4 2 2.5-2 4-2 2.5 2 4 2 2-1 2-1M2 21h20M7 8v3M12 8v3M17 8v3M7 4h.01M12 4h.01M17 4h.01"/>',
		'coffee'    => '<path d="M17 8h1a4 4 0 1 1 0 8h-1M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4z"/><path d="M6 2v2M10 2v2M14 2v2"/>',
		'shield'    => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>',
		'star'      => '<path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z"/>',
		'gift'      => '<path d="M20 12v10H4V12M2 7h20v5H2zM12 22V7M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7zM12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/>',
		'play'      => '<path d="m7 4 13 8-13 8z"/>',
		'plus'      => '<path d="M12 5v14M5 12h14"/>',
		'menu'      => '<path d="M3 6h18M3 12h18M3 18h18"/>',
		'close'     => '<path d="M18 6 6 18M6 6l12 12"/>',
		'chevron'   => '<path d="m6 9 6 6 6-6"/>',
		'calendar'  => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
		'heart'     => '<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1.1L12 21l7.8-7.5 1-1.1a5.5 5.5 0 0 0 0-7.8z"/>',
		'school'    => '<path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
		'compass'   => '<circle cx="12" cy="12" r="10"/><path d="m16.24 7.76-2.12 6.36-6.36 2.12 2.12-6.36z"/>',
	);

	$brand = array(
		'facebook'  => '<path d="M14 8h3V4h-3a4 4 0 0 0-4 4v3H7v4h3v7h4v-7h3l1-4h-4V8.5a.5.5 0 0 1 .5-.5z" fill="currentColor" stroke="none"/>',
		'instagram' => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/>',
		'youtube'   => '<path d="M22.5 6.4a2.8 2.8 0 0 0-2-2C18.8 4 12 4 12 4s-6.8 0-8.5.4a2.8 2.8 0 0 0-2 2A29 29 0 0 0 1 12a29 29 0 0 0 .5 5.6 2.8 2.8 0 0 0 2 2C5.2 20 12 20 12 20s6.8 0 8.5-.4a2.8 2.8 0 0 0 2-2A29 29 0 0 0 23 12a29 29 0 0 0-.5-5.6z"/><path d="m10 15 5-3-5-3z" fill="currentColor"/>',
		'twitter'   => '<path d="M4 4l16 16M20 4 4 20" />',
		'linkedin'  => '<rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/>',
	);

	$inner = isset( $paths[ $name ] ) ? $paths[ $name ] : ( isset( $brand[ $name ] ) ? $brand[ $name ] : '' );
	if ( ! $inner ) {
		return '';
	}

	return sprintf(
		'<svg class="icon icon--%1$s %2$s" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%3$s</svg>',
		esc_attr( $name ),
		esc_attr( $class ),
		$inner
	);
}

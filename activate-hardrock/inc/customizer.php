<?php
/**
 * Customizer: business details, booking links, contact form and social profiles.
 *
 * @package activate-hardrock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register settings.
 *
 * @param WP_Customize_Manager $wp_customize Manager.
 */
function abh_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'abh_business',
		array(
			'title'    => __( 'Activate: Business Details', 'activate-hardrock' ),
			'priority' => 30,
		)
	);

	$fields = array(
		'phone'          => array( 'Phone number', 'text', 'sanitize_text_field' ),
		'email'          => array( 'Email address', 'email', 'sanitize_email' ),
		'address'        => array( 'Address', 'text', 'sanitize_text_field' ),
		'hours'          => array( 'Opening hours note', 'textarea', 'sanitize_textarea_field' ),
		'map_query'      => array( 'Google Map location (address or place name)', 'text', 'sanitize_text_field' ),
		'booking_url'    => array( 'Book Now URL', 'url', 'esc_url_raw' ),
		'waiver_url'     => array( 'Sign a Waiver URL', 'url', 'esc_url_raw' ),
		'form_to'        => array( 'Enquiry form recipient email', 'email', 'sanitize_email' ),
		'form_shortcode' => array( 'Optional form shortcode (replaces the built in form, e.g. Contact Form 7, Gravity Forms)', 'text', 'wp_kses_post' ),
		'facebook'       => array( 'Facebook URL', 'url', 'esc_url_raw' ),
		'instagram'      => array( 'Instagram URL', 'url', 'esc_url_raw' ),
		'youtube'        => array( 'YouTube URL', 'url', 'esc_url_raw' ),
		'twitter'        => array( 'X / Twitter URL', 'url', 'esc_url_raw' ),
		'linkedin'       => array( 'LinkedIn URL', 'url', 'esc_url_raw' ),
	);

	$defaults = abh_defaults();

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			'abh_' . $key,
			array(
				'default'           => isset( $defaults[ $key ] ) ? $defaults[ $key ] : '',
				'sanitize_callback' => $field[2],
			)
		);
		$wp_customize->add_control(
			'abh_' . $key,
			array(
				'label'   => $field[0],
				'section' => 'abh_business',
				'type'    => $field[1],
			)
		);
	}
}
add_action( 'customize_register', 'abh_customize_register' );

<?php
/**
 * Built in enquiry form handler (hero form and contact section form).
 * Uses admin-post.php, a nonce, a honeypot and a time trap. Sends via wp_mail().
 *
 * @package activate-hardrock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enquiry types offered in the forms.
 *
 * @return array
 */
function abh_enquiry_types() {
	return array(
		'general'   => 'General Admission',
		'birthday'  => 'Birthday Party',
		'school'    => 'School Excursion',
		'scouts'    => 'Scout Group',
		'holiday'   => 'School Holiday Program',
		'coaching'  => 'Coaching Program',
		'corporate' => 'Adults / Corporate Group',
		'other'     => 'Something Else',
	);
}

/**
 * Handle submission.
 */
function abh_handle_enquiry() {
	$redirect = isset( $_POST['_abh_return'] ) ? esc_url_raw( wp_unslash( $_POST['_abh_return'] ) ) : home_url( '/' );
	$redirect = wp_validate_redirect( $redirect, home_url( '/' ) );
	$anchor   = isset( $_POST['_abh_anchor'] ) ? sanitize_key( wp_unslash( $_POST['_abh_anchor'] ) ) : 'contact';

	$fail = function ( $code ) use ( $redirect, $anchor ) {
		wp_safe_redirect( add_query_arg( array( 'enquiry' => $code, 'from' => $anchor ), $redirect ) . '#' . $anchor );
		exit;
	};

	if ( ! isset( $_POST['_abh_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_abh_nonce'] ) ), 'abh_enquiry' ) ) {
		$fail( 'error' );
	}

	// Honeypot.
	if ( ! empty( $_POST['abh_website'] ) ) {
		$fail( 'sent' );
	}

	// Time trap: real people take more than 3 seconds.
	$started = isset( $_POST['_abh_ts'] ) ? absint( $_POST['_abh_ts'] ) : 0;
	if ( $started && ( time() - $started ) < 3 ) {
		$fail( 'sent' );
	}

	$name    = isset( $_POST['abh_name'] ) ? sanitize_text_field( wp_unslash( $_POST['abh_name'] ) ) : '';
	$email   = isset( $_POST['abh_email'] ) ? sanitize_email( wp_unslash( $_POST['abh_email'] ) ) : '';
	$phone   = isset( $_POST['abh_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['abh_phone'] ) ) : '';
	$type    = isset( $_POST['abh_type'] ) ? sanitize_key( wp_unslash( $_POST['abh_type'] ) ) : 'general';
	$date    = isset( $_POST['abh_date'] ) ? sanitize_text_field( wp_unslash( $_POST['abh_date'] ) ) : '';
	$guests  = isset( $_POST['abh_guests'] ) ? absint( $_POST['abh_guests'] ) : 0;
	$message = isset( $_POST['abh_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['abh_message'] ) ) : '';
	$source  = isset( $_POST['_abh_anchor'] ) ? sanitize_key( wp_unslash( $_POST['_abh_anchor'] ) ) : '';

	if ( ! $name || ! is_email( $email ) ) {
		$fail( 'invalid' );
	}

	$types      = abh_enquiry_types();
	$type_label = isset( $types[ $type ] ) ? $types[ $type ] : $types['general'];

	$body  = "New website enquiry\n\n";
	$body .= "Name: {$name}\n";
	$body .= "Email: {$email}\n";
	$body .= 'Phone: ' . ( $phone ? $phone : 'Not provided' ) . "\n";
	$body .= "Enquiry: {$type_label}\n";
	if ( $date ) {
		$body .= "Preferred date: {$date}\n";
	}
	if ( $guests ) {
		$body .= "Number of guests: {$guests}\n";
	}
	$body .= "\nMessage:\n" . ( $message ? $message : 'No message' ) . "\n\n";
	$body .= 'Submitted from: ' . $redirect . ' (' . $source . " form)\n";

	$to      = abh_opt( 'form_to' ) ? abh_opt( 'form_to' ) : get_option( 'admin_email' );
	$subject = sprintf( '[Website] %s enquiry from %s', $type_label, $name );
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	$sent = wp_mail( $to, $subject, $body, $headers );

	/**
	 * Fires after an enquiry is processed (hook for CRM integrations).
	 */
	do_action( 'abh_enquiry_submitted', compact( 'name', 'email', 'phone', 'type', 'date', 'guests', 'message', 'source' ), $sent );

	$fail( $sent ? 'sent' : 'error' );
}
add_action( 'admin_post_nopriv_abh_enquiry', 'abh_handle_enquiry' );
add_action( 'admin_post_abh_enquiry', 'abh_handle_enquiry' );

/**
 * Status notice for a form.
 *
 * @return string
 */
function abh_enquiry_notice() {
	if ( empty( $_GET['enquiry'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
		return '';
	}
	$state    = sanitize_key( wp_unslash( $_GET['enquiry'] ) ); // phpcs:ignore WordPress.Security.NonceVerification
	$messages = array(
		'sent'    => array( 'success', 'Thanks! Your enquiry is on its way. Our team will be in touch shortly.' ),
		'invalid' => array( 'error', 'Please add your name and a valid email address, then try again.' ),
		'error'   => array( 'error', 'Sorry, something went wrong. Please call us on ' . abh_opt( 'phone' ) . '.' ),
	);
	if ( ! isset( $messages[ $state ] ) ) {
		return '';
	}
	return sprintf( '<div class="form-notice form-notice--%1$s" role="status">%2$s</div>', esc_attr( $messages[ $state ][0] ), esc_html( $messages[ $state ][1] ) );
}

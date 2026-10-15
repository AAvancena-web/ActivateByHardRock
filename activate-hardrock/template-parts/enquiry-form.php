<?php
/**
 * Enquiry form. Args: variant (hero|contact), anchor (section id).
 *
 * @package activate-hardrock
 */

$variant = isset( $args['variant'] ) ? $args['variant'] : 'contact';
$anchor  = isset( $args['anchor'] ) ? $args['anchor'] : 'contact';
$uid     = 'f-' . $variant;

$shortcode = abh_opt( 'form_shortcode' );
if ( $shortcode ) {
	echo '<div class="enquiry enquiry--' . esc_attr( $variant ) . ' enquiry--shortcode">' . do_shortcode( $shortcode ) . '</div>';
	return;
}

global $wp;
$return = home_url( isset( $wp->request ) ? $wp->request : '' );
$notice = ( isset( $_GET['from'] ) && sanitize_key( wp_unslash( $_GET['from'] ) ) === $anchor ) ? abh_enquiry_notice() : ''; // phpcs:ignore WordPress.Security.NonceVerification
?>
<form class="enquiry enquiry--<?php echo esc_attr( $variant ); ?>" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate data-enquiry>
	<?php echo $notice; // phpcs:ignore WordPress.Security.EscapeOutput ?>
	<input type="hidden" name="action" value="abh_enquiry">
	<input type="hidden" name="_abh_return" value="<?php echo esc_url( $return ); ?>">
	<input type="hidden" name="_abh_anchor" value="<?php echo esc_attr( $anchor ); ?>">
	<input type="hidden" name="_abh_ts" value="<?php echo esc_attr( time() ); ?>">
	<?php wp_nonce_field( 'abh_enquiry', '_abh_nonce', false ); ?>
	<div class="hp-field" aria-hidden="true">
		<label for="<?php echo esc_attr( $uid ); ?>-web">Website</label>
		<input type="text" id="<?php echo esc_attr( $uid ); ?>-web" name="abh_website" tabindex="-1" autocomplete="off">
	</div>

	<div class="enquiry__grid">
		<div class="field">
			<label for="<?php echo esc_attr( $uid ); ?>-name">Full name <span aria-hidden="true">*</span></label>
			<input type="text" id="<?php echo esc_attr( $uid ); ?>-name" name="abh_name" autocomplete="name" placeholder="Your name" required>
		</div>
		<div class="field">
			<label for="<?php echo esc_attr( $uid ); ?>-phone">Phone</label>
			<input type="tel" id="<?php echo esc_attr( $uid ); ?>-phone" name="abh_phone" autocomplete="tel" placeholder="04xx xxx xxx">
		</div>
		<div class="field field--full">
			<label for="<?php echo esc_attr( $uid ); ?>-email">Email <span aria-hidden="true">*</span></label>
			<input type="email" id="<?php echo esc_attr( $uid ); ?>-email" name="abh_email" autocomplete="email" placeholder="you@email.com" required>
		</div>
		<div class="field <?php echo 'hero' === $variant ? 'field--full' : ''; ?>">
			<label for="<?php echo esc_attr( $uid ); ?>-type">I'm enquiring about</label>
			<div class="select">
				<select id="<?php echo esc_attr( $uid ); ?>-type" name="abh_type">
					<?php foreach ( abh_enquiry_types() as $val => $label ) : ?>
						<option value="<?php echo esc_attr( $val ); ?>"><?php echo esc_html( $label ); ?></option>
					<?php endforeach; ?>
				</select>
				<?php echo abh_icon( 'chevron' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			</div>
		</div>
		<?php if ( 'contact' === $variant ) : ?>
			<div class="field">
				<label for="<?php echo esc_attr( $uid ); ?>-guests">No. of guests</label>
				<input type="number" id="<?php echo esc_attr( $uid ); ?>-guests" name="abh_guests" min="1" max="500" placeholder="e.g. 12">
			</div>
		<?php endif; ?>
		<div class="field field--full">
			<label for="<?php echo esc_attr( $uid ); ?>-date">Preferred date</label>
			<input type="date" id="<?php echo esc_attr( $uid ); ?>-date" name="abh_date">
		</div>
		<div class="field field--full">
			<label for="<?php echo esc_attr( $uid ); ?>-msg">Message</label>
			<textarea id="<?php echo esc_attr( $uid ); ?>-msg" name="abh_message" rows="<?php echo 'hero' === $variant ? 2 : 4; ?>" placeholder="Tell us a little about your visit"></textarea>
		</div>
	</div>

	<button type="submit" class="btn btn--primary btn--block">
		<span><?php echo 'hero' === $variant ? 'Get My Free Quote' : 'Send Enquiry'; ?></span>
		<?php echo abh_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
	</button>
	<p class="enquiry__fineprint"><?php echo abh_icon( 'shield' ); // phpcs:ignore WordPress.Security.EscapeOutput ?> Your details stay private. Our friendly team will be in touch soon.</p>
</form>

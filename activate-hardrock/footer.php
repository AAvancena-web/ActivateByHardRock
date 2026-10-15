<?php
/**
 * Global footer. Includes the contact section (info, map, form) directly above it.
 * Disable the contact section on any page with:
 * add_filter( 'abh_show_contact_section', '__return_false' );
 *
 * @package activate-hardrock
 */

$show_contact = apply_filters( 'abh_show_contact_section', ! is_page( array( 'contact-us', 'contact' ) ) );
if ( $show_contact ) {
	get_template_part( 'template-parts/contact-section' );
}
?>
</main>

<footer class="site-footer">
	<div class="container footer-main">
		<div class="footer-brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-brand__logo">
				<img src="<?php echo esc_url( abh_img( 'logo' ) ); ?>" alt="Activate by Hardrock" width="600" height="250" loading="lazy">
			</a>
			<p>Melbourne's favourite indoor activity spot. Clip 'n Climb, artificial caving, Leap of Faith and the Vertical Drop Slide, all under one air conditioned roof in Heatherton.</p>
			<?php abh_social_list( 'socials socials--footer' ); ?>
		</div>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<div class="footer-col">
				<h3>Useful Links</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'footer-links', 'depth' => 1 ) ); ?>
			</div>
		<?php else : ?>
			<?php foreach ( abh_footer_columns() as $heading => $links ) : ?>
				<div class="footer-col">
					<h3><?php echo esc_html( $heading ); ?></h3>
					<ul class="footer-links">
						<?php foreach ( $links as $label => $url ) : ?>
							<li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>

		<div class="footer-col footer-col--contact">
			<h3>Contact</h3>
			<ul class="footer-contact">
				<li><?php echo abh_icon( 'phone' ); // phpcs:ignore ?><a href="<?php echo esc_attr( abh_tel() ); ?>"><?php echo esc_html( abh_opt( 'phone' ) ); ?></a></li>
				<li><?php echo abh_icon( 'mail' ); // phpcs:ignore ?><a href="mailto:<?php echo esc_attr( abh_opt( 'email' ) ); ?>"><?php echo esc_html( abh_opt( 'email' ) ); ?></a></li>
				<li><?php echo abh_icon( 'pin' ); // phpcs:ignore ?><span><?php echo esc_html( abh_opt( 'address' ) ); ?></span></li>
			</ul>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container footer-bottom__inner">
			<p>Activate by Hardrock Pty Ltd &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>. All rights reserved.</p>
			<ul>
				<li><a href="<?php echo esc_url( abh_link( '/safety/' ) ); ?>">Safety Rules</a></li>
				<li><a href="<?php echo esc_url( abh_link( '/privacy/' ) ); ?>">Privacy Policy</a></li>
				<li><a href="<?php echo esc_url( abh_link( '/terms/' ) ); ?>">Terms &amp; Conditions</a></li>
			</ul>
		</div>
	</div>
</footer>

<a class="float-call" href="<?php echo esc_attr( abh_tel() ); ?>" aria-label="Call Activate by Hardrock now">
	<span class="float-call__icon"><?php echo abh_icon( 'phone' ); // phpcs:ignore ?></span>
	<span>Call Now</span>
</a>

<button class="to-top" type="button" aria-label="Back to top" data-to-top><?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></button>

<?php wp_footer(); ?>
</body>
</html>

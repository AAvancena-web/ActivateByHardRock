<?php
/**
 * Global contact section shown just above the footer:
 * contact details, Google Map and enquiry form.
 *
 * @package activate-hardrock
 */

$map_src = 'https://www.google.com/maps?q=' . rawurlencode( 'Activate by Hardrock, ' . abh_opt( 'map_query' ) ) . '&output=embed&z=15';
$dir_url = 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode( 'Activate by Hardrock, ' . abh_opt( 'map_query' ) );
?>
<section class="contact section" id="contact" aria-labelledby="contact-title">
	<div class="contact__bg" aria-hidden="true"></div>
	<div class="container">
		<div class="section-head section-head--split reveal">
			<div>
				<?php abh_eyebrow( 'Visit or Get in Touch' ); ?>
				<h2 id="contact-title" class="h2">Let's plan your next <em>adventure</em></h2>
			</div>
			<p class="lead">Questions about parties, school groups or session times? Send us a message or give the team a call. You'll find us just off Warrigal Road in Heatherton.</p>
		</div>

		<div class="contact__grid">
			<div class="contact__info reveal" data-delay="1">
				<ul class="info-list">
					<li>
						<span class="info-list__icon"><?php echo abh_icon( 'phone' ); // phpcs:ignore ?></span>
						<div><small>Call us</small><a href="<?php echo esc_attr( abh_tel() ); ?>"><?php echo esc_html( abh_opt( 'phone' ) ); ?></a></div>
					</li>
					<li>
						<span class="info-list__icon"><?php echo abh_icon( 'mail' ); // phpcs:ignore ?></span>
						<div><small>Email us</small><a href="mailto:<?php echo esc_attr( abh_opt( 'email' ) ); ?>"><?php echo str_replace( '@', '@<wbr>', esc_html( abh_opt( 'email' ) ) ); // phpcs:ignore ?></a></div>
					</li>
					<li>
						<span class="info-list__icon"><?php echo abh_icon( 'pin' ); // phpcs:ignore ?></span>
						<div><small>Find us</small><a href="<?php echo esc_url( $dir_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( abh_opt( 'address' ) ); ?></a></div>
					</li>
					<li>
						<span class="info-list__icon"><?php echo abh_icon( 'clock' ); // phpcs:ignore ?></span>
						<div><small>Opening hours</small><span><?php echo esc_html( abh_opt( 'hours' ) ); ?></span></div>
					</li>
				</ul>

				<div class="map">
					<iframe title="Map showing Activate by Hardrock in Heatherton" src="<?php echo esc_url( $map_src ); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
					<a class="btn btn--dark btn--sm map__btn" href="<?php echo esc_url( $dir_url ); ?>" target="_blank" rel="noopener"><?php echo abh_icon( 'compass' ); // phpcs:ignore ?><span>Get Directions</span></a>
				</div>
			</div>

			<div class="contact__form card-glass reveal" data-delay="2">
				<div class="contact__form-head">
					<h3 class="h3">Send us an enquiry</h3>
					<p>Fill in the form and we'll come back to you with availability and pricing.</p>
				</div>
				<?php get_template_part( 'template-parts/enquiry-form', null, array( 'variant' => 'contact', 'anchor' => 'contact' ) ); ?>
			</div>
		</div>
	</div>
</section>

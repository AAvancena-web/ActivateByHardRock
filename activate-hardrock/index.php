<?php
/**
 * Fallback template (blog index, archives, search).
 *
 * @package activate-hardrock
 */

get_header();
?>
<section class="page-hero">
	<div class="container">
		<?php abh_eyebrow( 'News & Updates', 'eyebrow--light' ); ?>
		<h1 class="h2"><?php echo is_archive() ? wp_kses_post( get_the_archive_title() ) : esc_html__( 'Latest News', 'activate-hardrock' ); ?></h1>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="news-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<a class="news-card" href="<?php the_permalink(); ?>">
						<span class="news-card__media">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'abh-card', array( 'alt' => '' ) );
							} else {
								echo '<img src="' . esc_url( abh_img( 'group' ) ) . '" alt="" loading="lazy">';
							}
							?>
						</span>
						<span class="news-card__body">
							<span class="news-card__date"><?php echo esc_html( get_the_date() ); ?></span>
							<span class="news-card__title"><?php the_title(); ?></span>
							<span class="news-card__text"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></span>
							<span class="news-card__more">Read article <?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></span>
						</span>
					</a>
				<?php endwhile; ?>
			</div>
			<div class="btn-row btn-row--center"><?php the_posts_pagination(); ?></div>
		<?php else : ?>
			<p class="lead">Nothing here yet.</p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();

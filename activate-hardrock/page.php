<?php
/**
 * Default page and single post template. Uses the global header and footer.
 *
 * @package activate-hardrock
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="page-hero">
		<div class="container">
			<?php abh_eyebrow( is_singular( 'post' ) ? get_the_date() : 'Activate by Hardrock', 'eyebrow--light' ); ?>
			<h1 class="h2"><?php the_title(); ?></h1>
		</div>
	</section>
	<article <?php post_class( 'entry' ); ?>>
		<div class="container">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</article>
	<?php
endwhile;

get_footer();

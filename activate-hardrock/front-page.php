<?php
/**
 * Homepage template.
 *
 * @package activate-hardrock
 */

get_header();

$book = abh_opt( 'booking_url' );
?>

<!-- ============ HERO ============ -->
<section class="hero" id="top" aria-labelledby="hero-title">
	<div class="hero__media" aria-hidden="true">
		<img src="<?php echo esc_url( abh_img( 'hero' ) ); ?>" alt="" width="1266" height="845" fetchpriority="high" data-parallax="0.15">
	</div>
	<div class="hero__glow" aria-hidden="true"></div>
	<div class="container hero__inner">
		<div class="hero__content">
			<?php abh_eyebrow( "Heatherton, Melbourne", 'eyebrow--light' ); ?>
			<h1 id="hero-title" class="hero__title">Melbourne's favourite <span class="text-gradient">indoor climbing</span> adventure</h1>
			<p class="hero__text">Conquer 30+ colourful Clip 'n Climb challenges, squeeze through our artificial caves, take the Leap of Faith and drop down the Vertical Drop Slide. Air conditioned fun for kids, teens and adults, all year round.</p>
			<div class="hero__ctas">
				<a class="btn btn--primary btn--lg" href="<?php echo esc_url( $book ); ?>" target="_blank" rel="noopener"><?php echo abh_icon( 'ticket' ); // phpcs:ignore ?><span>Book Tickets</span></a>
				<a class="btn btn--light btn--lg" href="<?php echo esc_url( abh_link( '/birthday-parties/' ) ); ?>"><?php echo abh_icon( 'cake' ); // phpcs:ignore ?><span>Plan a Birthday Party</span></a>
			</div>
			<ul class="hero__trust">
				<li><?php echo abh_icon( 'mountain' ); // phpcs:ignore ?><span><strong>30+</strong> climbing challenges</span></li>
				<li><?php echo abh_icon( 'users' ); // phpcs:ignore ?><span><strong>Ages 5+</strong> welcome</span></li>
				<li><?php echo abh_icon( 'coffee' ); // phpcs:ignore ?><span><strong>Cafe</strong> on site</span></li>
			</ul>
		</div>

		<div class="hero__form">
			<div class="form-card" id="enquire">
				<div class="form-card__head">
					<span class="form-card__badge"><?php echo abh_icon( 'calendar' ); // phpcs:ignore ?>Parties, groups &amp; schools</span>
					<h2 class="form-card__title">Plan your visit</h2>
					<p>Tell us what you have in mind and our team will send availability and pricing.</p>
				</div>
				<?php get_template_part( 'template-parts/enquiry-form', null, array( 'variant' => 'hero', 'anchor' => 'enquire' ) ); ?>
			</div>
		</div>
	</div>
</section>

<!-- ============ TICKER ============ -->
<div class="ticker" aria-hidden="true">
	<div class="ticker__track">
		<?php for ( $i = 0; $i < 2; $i++ ) : ?>
			<ul>
				<li>Clip 'n Climb</li><li>Artificial Caving</li><li>Leap of Faith</li><li>Vertical Drop Slide</li><li>Speedwall</li><li>Face to Face</li><li>Astroball</li><li>Birthday Parties</li><li>School Excursions</li><li>Cafe</li>
			</ul>
		<?php endfor; ?>
	</div>
</div>

<!-- ============ INTRO ============ -->
<section class="intro section" aria-labelledby="intro-title">
	<div class="container intro__grid">
		<div class="intro__media reveal">
			<figure class="intro__img intro__img--main">
				<img src="<?php echo esc_url( abh_img( 'climb-tower' ) ); ?>" alt="Climber scaling a colourful Clip 'n Climb wall" width="980" height="650" loading="lazy" data-parallax="0.06">
			</figure>
			<figure class="intro__img intro__img--accent">
				<img src="<?php echo esc_url( abh_img( 'speedwall' ) ); ?>" alt="Two kids racing up the Speedwall" width="425" height="637" loading="lazy">
			</figure>
			<div class="intro__badge">
				<span class="intro__badge-num" data-count="30" data-suffix="+">30+</span>
				<span class="intro__badge-label">Unique<br>challenges</span>
			</div>
		</div>

		<div class="intro__content reveal" data-delay="1">
			<?php abh_eyebrow( 'Get Up and Activate' ); ?>
			<h2 id="intro-title" class="h2">A huge Clip 'n Climb arena built for <em>active fun</em></h2>
			<p class="lead">Activate by Hardrock is Melbourne's favourite indoor activity spot. Our arena features more than 30 climbing challenges at varying levels of difficulty, so first timers and seasoned climbers alike can push their limits.</p>
			<p>Race a friend on the Speedwall, go head to head on Face to Face or tackle the Astroball. Then head underground into our artificial caving system, take the Leap of Faith and finish with the Vertical Drop Slide. Recommended for ages 5 and up.</p>

			<dl class="stats">
				<div class="stat"><dt><span data-count="30" data-suffix="+">30+</span></dt><dd>Climbing challenges</dd></div>
				<div class="stat"><dt><span data-count="5" data-suffix="+">5+</span></dt><dd>Recommended age</dd></div>
				<div class="stat"><dt><span data-count="4">4</span></dt><dd>Signature adventures</dd></div>
			</dl>

			<div class="btn-row">
				<a class="btn btn--primary" href="<?php echo esc_url( $book ); ?>" target="_blank" rel="noopener"><span>Book Your Climb</span><?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></a>
				<a class="btn btn--dark" href="<?php echo esc_url( abh_link( '/clip-n-climb/' ) ); ?>"><span>Explore Clip 'n Climb</span><?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></a>
			</div>
		</div>
	</div>
</section>

<!-- ============ ACTIVITIES ============ -->
<?php
$activities = array(
	array(
		'title' => "Clip 'n Climb",
		'text'  => 'More than 30 vibrant auto belay climbing walls for every age and ability.',
		'img'   => 'climb-tower',
		'url'   => abh_link( '/clip-n-climb/' ),
		'tag'   => 'Most popular',
		'size'  => 'xl',
	),
	array(
		'title' => 'Artificial Caving',
		'text'  => 'Crawl, climb and squeeze through a winding underground cave system.',
		'img'   => 'caving',
		'url'   => abh_link( '/artificial-caving/' ),
		'tag'   => 'Adventure',
		'size'  => 'md',
	),
	array(
		'title' => 'Leap of Faith',
		'text'  => 'Climb the pole, stand tall and jump for the bag. Pure adrenaline.',
		'img'   => 'leap',
		'url'   => abh_link( '/clip-n-climb/' ),
		'tag'   => 'Thrill',
		'size'  => 'sm',
	),
	array(
		'title' => 'Vertical Drop Slide',
		'text'  => 'Let go and feel the drop on our near vertical slide.',
		'img'   => 'drop-slide',
		'url'   => abh_link( '/clip-n-climb/' ),
		'tag'   => 'Thrill',
		'size'  => 'sm',
	),
	array(
		'title' => 'Coaching Programs',
		'text'  => 'After school programs that build strength, skill and confidence.',
		'img'   => 'coaching',
		'url'   => abh_link( '/coaching-programs-for-kids/' ),
		'tag'   => 'Kids',
		'size'  => 'md',
	),
	array(
		'title' => 'School Holiday Programs',
		'text'  => 'Active, supervised drop off days that keep kids moving all holidays.',
		'img'   => 'holiday',
		'url'   => abh_link( '/school-holiday-drop-off-programs/' ),
		'tag'   => 'Holidays',
		'size'  => 'md',
	),
);
?>
<section class="activities section section--dark" id="activities" aria-labelledby="activities-title">
	<div class="container">
		<div class="section-head section-head--center reveal">
			<?php abh_eyebrow( 'Activities', 'eyebrow--light' ); ?>
			<h2 id="activities-title" class="h2">Choose your <em>adventure</em></h2>
			<p class="lead">From your first climb to your fastest Speedwall time, there's something for every adventurer under one roof.</p>
		</div>

		<div class="bento">
			<?php foreach ( $activities as $i => $a ) : ?>
				<a class="svc-card svc-card--<?php echo esc_attr( $a['size'] ); ?> reveal" data-delay="<?php echo esc_attr( $i % 3 ); ?>" href="<?php echo esc_url( $a['url'] ); ?>">
					<img src="<?php echo esc_url( abh_img( $a['img'] ) ); ?>" alt="" loading="lazy">
					<span class="svc-card__tag"><?php echo esc_html( $a['tag'] ); ?></span>
					<span class="svc-card__body">
						<span class="svc-card__title"><?php echo esc_html( $a['title'] ); ?></span>
						<span class="svc-card__text"><?php echo esc_html( $a['text'] ); ?></span>
						<span class="svc-card__more">Learn more <?php echo abh_icon( 'arrow-up-right' ); // phpcs:ignore ?></span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ CHALLENGE STRIP ============ -->
<?php
$challenges = array(
	'speedwall'  => 'Speedwall',
	'astroball'  => 'Astroball',
	'bigcheese'  => 'Big Cheese',
	'dryice'     => 'Dry Ice',
	'twister'    => 'Twister',
	'crag'       => 'Crag',
	'ladder'     => 'Ladder',
	'leap-2'     => 'Leap of Faith',
);
?>
<section class="challenges section" aria-labelledby="challenges-title">
	<div class="container">
		<div class="section-head section-head--center reveal">
			<?php abh_eyebrow( 'Inside the Arena' ); ?>
			<h2 id="challenges-title" class="h2">30+ walls. <em>Zero</em> boring days.</h2>
			<p class="lead">Every wall is a different puzzle. Here are a few of our favourites.</p>
		</div>
		<div class="challenge-grid">
			<?php
			$n = 0;
			foreach ( $challenges as $img => $label ) :
				?>
				<figure class="challenge-card reveal" data-delay="<?php echo esc_attr( $n++ % 4 ); ?>">
					<img src="<?php echo esc_url( abh_img( $img ) ); ?>" alt="<?php echo esc_attr( $label ); ?> climbing challenge" loading="lazy">
					<figcaption><?php echo esc_html( $label ); ?></figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ PARTIES FEATURE ============ -->
<section class="feature section section--sand" id="parties" aria-labelledby="party-title">
	<div class="container feature__grid">
		<div class="feature__content reveal">
			<?php abh_eyebrow( 'Birthday Parties' ); ?>
			<h2 id="party-title" class="h2">The birthday party they'll <em>talk about</em> for years</h2>
			<p class="lead">Skip the stress and let us host. Climbing, caving and celebrating in one easy package, with a private function room for cake and party food.</p>
			<ul class="checklist">
				<li><?php echo abh_icon( 'check' ); // phpcs:ignore ?>Climbing time in the Clip 'n Climb arena</li>
				<li><?php echo abh_icon( 'check' ); // phpcs:ignore ?>Private function rooms for food, cake and presents</li>
				<li><?php echo abh_icon( 'check' ); // phpcs:ignore ?>Party invitations to share with guests</li>
				<li><?php echo abh_icon( 'check' ); // phpcs:ignore ?>On site cafe so parents can relax</li>
			</ul>
			<div class="btn-row">
				<a class="btn btn--primary" href="<?php echo esc_url( abh_link( '/birthday-parties/' ) ); ?>"><span>View Party Packages</span><?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></a>
				<a class="btn btn--dark" href="#enquire" data-scroll><span>Enquire Now</span><?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></a>
			</div>
		</div>
		<div class="feature__media reveal" data-delay="1">
			<figure class="feature__img">
				<img src="<?php echo esc_url( abh_img( 'party' ) ); ?>" alt="Kids celebrating a birthday party at Activate by Hardrock" width="980" height="650" loading="lazy" data-parallax="0.06">
			</figure>
			<figure class="feature__img feature__img--float">
				<img src="<?php echo esc_url( abh_img( 'party-invites' ) ); ?>" alt="Activate birthday party invitations" loading="lazy">
			</figure>
			<div class="feature__chip"><?php echo abh_icon( 'cake' ); // phpcs:ignore ?><span><strong>Party ready</strong>function rooms</span></div>
		</div>
	</div>
</section>

<!-- ============ GROUPS ============ -->
<?php
$groups = array(
	array( 'School Excursions', 'Curriculum friendly active excursions that build teamwork and resilience.', 'excursions', '/school-excursions/', 'school' ),
	array( 'Scout Groups', 'Challenge based sessions perfect for earning badges and building courage.', 'scouts', '/scout-groups/', 'compass' ),
	array( 'Uni Students & Adults', 'Grown ups climb too. Bring your crew for a social session with a difference.', 'adults', '/specials/', 'users' ),
	array( 'Birthday Parties', 'Climbing, caving and a private function room for an unforgettable day.', 'group', '/birthday-parties/', 'cake' ),
);
?>
<section class="groups section" id="groups" aria-labelledby="groups-title">
	<div class="container">
		<div class="section-head section-head--center reveal">
			<?php abh_eyebrow( 'Groups & Functions' ); ?>
			<h2 id="groups-title" class="h2">Bring the whole <em>crew</em></h2>
			<p class="lead">Schools, scouts, sports teams and social groups. We tailor every session to your group's age, size and goals.</p>
		</div>
		<div class="group-grid">
			<?php foreach ( $groups as $i => $g ) : ?>
				<a class="group-card reveal" data-delay="<?php echo esc_attr( $i ); ?>" href="<?php echo esc_url( abh_link( $g[3] ) ); ?>">
					<span class="group-card__media"><img src="<?php echo esc_url( abh_img( $g[2] ) ); ?>" alt="" loading="lazy"></span>
					<span class="group-card__body">
						<span class="group-card__icon"><?php echo abh_icon( $g[4] ); // phpcs:ignore ?></span>
						<span class="group-card__title"><?php echo esc_html( $g[0] ); ?></span>
						<span class="group-card__text"><?php echo esc_html( $g[1] ); ?></span>
						<span class="group-card__more">Learn more <?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="steps section section--dark" aria-labelledby="steps-title">
	<div class="steps__bg" aria-hidden="true"><img src="<?php echo esc_url( abh_img( 'leap-2' ) ); ?>" alt="" loading="lazy" data-parallax="0.1"></div>
	<div class="container">
		<div class="section-head section-head--center reveal">
			<?php abh_eyebrow( 'How It Works', 'eyebrow--light' ); ?>
			<h2 id="steps-title" class="h2">From couch to climbing wall in <em>3 easy steps</em></h2>
		</div>
		<ol class="steps__list">
			<li class="step reveal">
				<span class="step__num">01</span>
				<span class="step__icon"><?php echo abh_icon( 'ticket' ); // phpcs:ignore ?></span>
				<h3>Book online</h3>
				<p>Pick your session time and secure your tickets online in a few clicks.</p>
			</li>
			<li class="step reveal" data-delay="1">
				<span class="step__num">02</span>
				<span class="step__icon"><?php echo abh_icon( 'pen' ); // phpcs:ignore ?></span>
				<h3>Sign your waiver</h3>
				<p>Complete the waiver before you arrive so you're ready to go the moment you walk in.</p>
			</li>
			<li class="step reveal" data-delay="2">
				<span class="step__num">03</span>
				<span class="step__icon"><?php echo abh_icon( 'mountain' ); // phpcs:ignore ?></span>
				<h3>Gear up and climb</h3>
				<p>Our team runs a quick safety briefing, fits your harness and the fun begins.</p>
			</li>
		</ol>
		<div class="btn-row btn-row--center reveal">
			<a class="btn btn--primary btn--lg" href="<?php echo esc_url( $book ); ?>" target="_blank" rel="noopener"><?php echo abh_icon( 'ticket' ); // phpcs:ignore ?><span>Book Tickets</span></a>
			<a class="btn btn--light btn--lg" href="<?php echo esc_url( abh_opt( 'waiver_url' ) ); ?>" target="_blank" rel="noopener"><?php echo abh_icon( 'pen' ); // phpcs:ignore ?><span>Sign a Waiver</span></a>
		</div>
	</div>
</section>

<!-- ============ VIDEO ============ -->
<section class="video section" aria-labelledby="video-title">
	<div class="container video__grid">
		<div class="video__content reveal">
			<?php abh_eyebrow( 'See It in Action' ); ?>
			<h2 id="video-title" class="h2">Feel the energy before you <em>arrive</em></h2>
			<p class="lead">Take a look inside the arena and see why families, schools and groups keep coming back to Activate.</p>
			<a class="btn btn--dark" href="<?php echo esc_url( abh_link( '/gallery/' ) ); ?>"><span>View the Gallery</span><?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></a>
		</div>
		<div class="video__frame reveal" data-delay="1">
			<button class="video__poster" type="button" data-video="https://player.vimeo.com/video/697285507?autoplay=1&title=0&byline=0&portrait=0" aria-label="Play Activate by Hardrock video">
				<img src="<?php echo esc_url( abh_img( 'caving-duo' ) ); ?>" alt="" loading="lazy">
				<span class="video__play"><?php echo abh_icon( 'play' ); // phpcs:ignore ?></span>
			</button>
		</div>
	</div>
</section>

<!-- ============ PASSES ============ -->
<?php
$passes = array(
	array( 'Gift Cards', 'The perfect present for active kids and adventurous adults.', 'gift-cards-2', '/gift-cards/', 'Shop Gift Cards', 'gift' ),
	array( 'Multi-Visit Passes', 'Climb more and save. Bundle your visits with a 5 or 10 visit pass.', 'multipass', '/multi-passes/', 'Shop Passes', 'ticket' ),
	array( 'Low Sensory Sessions', 'A calmer, quieter climbing experience designed for sensory sensitive climbers.', 'low-sensory', '/low-sensory-climbing-sessions/', 'Learn More', 'heart' ),
);
?>
<section class="passes section section--sand" aria-labelledby="passes-title">
	<div class="container">
		<div class="section-head section-head--center reveal">
			<?php abh_eyebrow( 'Passes & Gifts' ); ?>
			<h2 id="passes-title" class="h2">More ways to <em>climb</em></h2>
		</div>
		<div class="pass-grid">
			<?php foreach ( $passes as $i => $p ) : ?>
				<a class="pass-card reveal" data-delay="<?php echo esc_attr( $i ); ?>" href="<?php echo esc_url( abh_link( $p[3] ) ); ?>">
					<span class="pass-card__media"><img src="<?php echo esc_url( abh_img( $p[2] ) ); ?>" alt="" loading="lazy"></span>
					<span class="pass-card__body">
						<span class="pass-card__icon"><?php echo abh_icon( $p[5] ); // phpcs:ignore ?></span>
						<span class="pass-card__title"><?php echo esc_html( $p[0] ); ?></span>
						<span class="pass-card__text"><?php echo esc_html( $p[1] ); ?></span>
						<span class="pass-card__cta"><?php echo esc_html( $p[4] ); ?> <?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ FACILITIES ============ -->
<?php
$facilities = array(
	array( 'snow', 'Air Conditioned Venue', 'Comfortable climbing in every season.' ),
	array( 'mountain', "Clip 'n Climb Arena", '30+ colourful auto belay challenges.' ),
	array( 'cave', 'Artificial Caving System', 'An underground adventure indoors.' ),
	array( 'jump', 'Leap of Faith', 'Climb high and take the jump.' ),
	array( 'slide', 'Vertical Drop Slide', 'A heart racing finish to any visit.' ),
	array( 'cake', 'Function Rooms', 'Private spaces for parties and groups.' ),
	array( 'coffee', 'Cafe', 'Coffee, snacks and a spot to watch.' ),
	array( 'shield', 'Safety First', 'Trained staff and full safety briefings.' ),
);
?>
<section class="facilities section" aria-labelledby="facilities-title">
	<div class="container">
		<div class="section-head section-head--split reveal">
			<div>
				<?php abh_eyebrow( 'Facilities' ); ?>
				<h2 id="facilities-title" class="h2">Everything you need for a <em>great day out</em></h2>
			</div>
			<p class="lead">One venue, all weather, endless fun. Here's what's waiting for you at Activate by Hardrock in Heatherton.</p>
		</div>
		<ul class="facility-grid">
			<?php foreach ( $facilities as $i => $f ) : ?>
				<li class="facility reveal" data-delay="<?php echo esc_attr( $i % 4 ); ?>">
					<span class="facility__icon"><?php echo abh_icon( $f[0] ); // phpcs:ignore ?></span>
					<h3><?php echo esc_html( $f[1] ); ?></h3>
					<p><?php echo esc_html( $f[2] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<!-- ============ FAQ ============ -->
<?php
$faqs = array(
	array( 'What age can climb?', "Clip 'n Climb is recommended for ages 5 and up. Adults are very welcome to climb too, and our team will help every climber find challenges that suit their ability." ),
	array( 'Do I need to book in advance?', 'We recommend booking online to secure your preferred session time, especially on weekends and during school holidays.' ),
	array( 'Do I need to sign a waiver?', 'Yes. Every climber needs a signed waiver. Save time on the day by completing it online before you arrive.' ),
	array( 'What should we wear?', 'Comfortable clothing you can move in and enclosed shoes are best. Our team will fit your harness before you start.' ),
	array( 'Can parents watch?', 'Absolutely. Grab a coffee from the cafe and watch the action from the viewing areas.' ),
	array( 'Do you host groups and schools?', 'Yes. We host birthday parties, school excursions, scout groups and social groups. Send us an enquiry and we will tailor a session for you.' ),
);
?>
<section class="faq section section--sand" aria-labelledby="faq-title">
	<div class="container faq__grid">
		<div class="faq__intro reveal">
			<?php abh_eyebrow( 'FAQs' ); ?>
			<h2 id="faq-title" class="h2">Good to <em>know</em></h2>
			<p class="lead">Quick answers to the questions we hear most. Can't find what you're after? Our team is happy to help.</p>
			<a class="btn btn--dark" href="<?php echo esc_attr( abh_tel() ); ?>"><?php echo abh_icon( 'phone' ); // phpcs:ignore ?><span>Call <?php echo esc_html( abh_opt( 'phone' ) ); ?></span></a>
		</div>
		<div class="accordion reveal" data-delay="1">
			<?php foreach ( $faqs as $i => $q ) : ?>
				<details class="accordion__item" <?php echo 0 === $i ? 'open' : ''; ?>>
					<summary><span><?php echo esc_html( $q[0] ); ?></span><span class="accordion__icon"><?php echo abh_icon( 'plus' ); // phpcs:ignore ?></span></summary>
					<div class="accordion__body"><p><?php echo esc_html( $q[1] ); ?></p></div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ NEWS ============ -->
<?php
$news = new WP_Query(
	array(
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);
if ( $news->have_posts() ) :
	?>
<section class="news section" aria-labelledby="news-title">
	<div class="container">
		<div class="section-head section-head--split reveal">
			<div>
				<?php abh_eyebrow( 'Latest News' ); ?>
				<h2 id="news-title" class="h2">Updates from the <em>arena</em></h2>
			</div>
			<a class="btn btn--dark" href="<?php echo esc_url( abh_link( '/category/news/' ) ); ?>"><span>All News</span><?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></a>
		</div>
		<div class="news-grid">
			<?php
			$n = 0;
			while ( $news->have_posts() ) :
				$news->the_post();
				?>
				<a class="news-card reveal" data-delay="<?php echo esc_attr( $n++ ); ?>" href="<?php the_permalink(); ?>">
					<span class="news-card__media">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'abh-card', array( 'loading' => 'lazy', 'alt' => '' ) );
						} else {
							echo '<img src="' . esc_url( abh_img( 'group' ) ) . '" alt="" loading="lazy">';
						}
						?>
					</span>
					<span class="news-card__body">
						<span class="news-card__date"><?php echo esc_html( get_the_date() ); ?></span>
						<span class="news-card__title"><?php the_title(); ?></span>
						<span class="news-card__text"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></span>
						<span class="news-card__more">Read article <?php echo abh_icon( 'arrow' ); // phpcs:ignore ?></span>
					</span>
				</a>
			<?php endwhile; ?>
		</div>
	</div>
</section>
	<?php
endif;
wp_reset_postdata();
?>

<!-- ============ CTA BAND ============ -->
<section class="cta-band" aria-labelledby="cta-title">
	<div class="container">
		<div class="cta-band__inner reveal">
			<img class="cta-band__img" src="<?php echo esc_url( abh_img( 'stalactite' ) ); ?>" alt="" loading="lazy">
			<div class="cta-band__content">
				<h2 id="cta-title" class="cta-band__title">Ready to get <span>UP</span> and <span>ACTIVATE?</span></h2>
				<p>Lock in your climb time online and skip the wait at the door.</p>
			</div>
			<div class="cta-band__actions">
				<a class="btn btn--primary btn--lg" href="<?php echo esc_url( $book ); ?>" target="_blank" rel="noopener"><?php echo abh_icon( 'ticket' ); // phpcs:ignore ?><span>Book Tickets</span></a>
				<a class="btn btn--light btn--lg" href="<?php echo esc_attr( abh_tel() ); ?>"><?php echo abh_icon( 'phone' ); // phpcs:ignore ?><span>Call <?php echo esc_html( abh_opt( 'phone' ) ); ?></span></a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();

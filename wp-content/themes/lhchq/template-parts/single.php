<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php
	while ( have_posts() ) : the_post();
	$post = get_post();
	$page_title = get_the_title();
	$post_type = get_post_type();
?>

<div class="container-fluid container-lhc lead-container newsletter-container solo">
  <div class="row">
    <div class="col-12">
      <h1 class="sans"><?php echo get_the_title(); ?>.</h1>
    </div>
  </div>
</div>

<div class="container-fluid container-lhc">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7" id="newsletter-text">

			<?php if ($post_type == "j") { ?>
				<h2>About The Job</h2>
			<?php } ?>

			<?php echo get_the_content(); ?>

			<!-- Job Responsibilities -->
			<?php
				$responsibilities = get_field('responsibilities');
				if ($responsibilities) { ?>
					<h2>Responsibilities</h2>
					<div id="job-responsibilities">
						<?php echo $responsibilities; ?>
					</div>

				<?php }
			?>

			<?php if ($post_type == "j") { ?>
				<div class="clear"></div><br/>
				<h2>A few things about how we work at LHC</h2>
				<ul id="how-we-work">
					<li>Work hard, but not dumb.</li>
					<li>We’re a chill group but we’re in a services business and we should treat it as such - that means responsiveness, respect, professionalism, polish, thoughtfulness etc. </li>
					<li>We respect our clients’ essential humanity even when they seem inhuman (and we try to understand their challenges and what they want to accomplish). </li>
					<li>We value your personal life, and we really will try not to bug you with requests on off hours. That means Fridays. </li>
					<li>That said, clients gonna client, so in some cases there will be exceptions. </li>
					<li>We respect each other’s time / no pointless meetings (30 mins max). </li>
					<li>We DO expect responsiveness to questions -- keep Slack on your phone. No one will ask you to do work on the weekend, but we may have questions we need your help answering. </li>
					<li>Ask for forgiveness not permission; trust your instincts. </li>
					<li>No questions are bad questions; very few ideas are bad ideas. </li>
					<li>If you’re swamped and there are too many things for you to do, let us know, don’t suffer stoically, and don’t work hella late because you have too much on your plate. </li>
					<li>This is YOUR company, so speak up. </li>
					<li>We love it if you have outside interests and we support your pursuit of them.</li>
				</ul>
			<?php } ?>

		</div>
		<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
		<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" id="sidebar">

			<?php if ($post_type == "j") { ?>
				<div class="sidebar-section" id="to-apply">
					<h5>To Apply</h5>
					<div>
						To apply for this job, email Sam Slaughter at <a href="mailto:sam@lhchq.com">sam@lhchq.com.</a>
						<div class="clear"></div>
						<a href="mailto:sam@lhchq.com" class="btn">APPLY NOW</a>
						<div class="clear"></div>
					</div>
				</div>

				<div class="sidebar-section" id="about-us">
					<h5>About Us</h5>
					<div>
						LHC is a 4-year-old content agency with around 15 full and part-time employees. We focus primarily on creating digital content for companies of all different sizes, including copy and longform writing, graphic design, video production, and web development.<br/><br/>Our clients are typically marketing departments at B2B brands, ranging from enterprise (Amazon, IBM) to public sector (NY State, the MTA), to small and mid-size startups (Andela, Cloudera, Wix).
					</div>
				</div>

				<div class="sidebar-section" id="about-you">
					<h5>About You</h5>
					<ul>
					<?php while (have_rows('about_you')): the_row();
						$description = get_sub_field('description'); ?>
						<li>&rarr; <?php echo $description; ?></li>
					<?php endwhile; ?>
					</ul>
				</div>

				<div class="sidebar-section" id="benefits">
					<h5>Benefits</h5>
					<ul>
						<li>&rarr; 4-day work week</li>
						<li>&rarr; 401k</li>
						<li>&rarr; Health insurance</li>
						<li>&rarr; Snacks (delivered 2 your home)</li>
						<li>&rarr; Quarterly profit-sharing</li>
						<li>&rarr; Employee-owned company</li>
						<li>&rarr; Dogs &amp; kids encouraged in meetings</li>
					</ul>
				</div>


			<?php } ?>

			<?php if (have_rows('news_item')): ?>
				<div class="sidebar-section" id="things-are-happening">
					<h5>Things are happening</h5>
					<?php while (have_rows('news_item')): the_row();
						$description = get_sub_field('item'); ?>
						<div class="news item">
							<div class="item-description small-description"><span>&rarr;</span> <?php echo $description; ?></div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php
				$cover_art = get_field('cover_art');
				$playlist_name = get_field('song__album__playlist_name');
				$playlist_link = get_field('song__album__playlist_link');
				$playlist_description = get_field('song__album__playlist_description'); ?>

			<?php if ($playlist_name || $playlist_description) { ?>
				<div class="sidebar-section" id="things-are-happening">
					<h5>What We're Listening To</h5>

					<div class="item album">
						<?php if ($cover_art) { ?>
							<?php if ($playlist_link) { ?>
								<a href="<?php echo $playlist_link; ?>"><img src="<?php echo $cover_art['url']; ?>" class="album-art"/></a>
							<?php } else { ?>
								<img src="<?php echo $cover_art['url']; ?>" class="album-art"/>
							<?php } ?>
							<div class="clear"></div>
						<?php } ?>

						<label><a href="<?php echo $playlist_link; ?>"><?php echo $playlist_name; ?></a></label>
						<div class="album-description small-description" style="float: left;"><?php echo $playlist_description; ?></div>
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>

			<?php
				$quote = get_field('quote');
				$source = get_field('source');
				$source_url = get_field('source_url');

				if ($quote) { ?>
					<div class="sidebar-section" id="quote-of-the-day">
						<h5>Quote of the Day</h5>
						<div class="item">
							<div class="quote">"<?php echo $quote; ?>"</div>
							<?php if ($source_url) { ?>
								<div class="source">- <a href="<?php echo $source_url; ?>"><?php echo $source; ?></a></div>
							<?php } else { ?>
								<div class="source">- <?php echo $source; ?></div>
							<?php } ?>

						</div>
					</div>
				<?php }
			?>
		</div>
	</div>

	<div class="row" id="whats-next">

		<?php
			$prev_post = get_previous_post();
			$next_post = get_next_post();

			$ppp = 200;
			$all_posts = new WP_Query( array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => $ppp,
				'orderby' => 'date',
				'order' => 'DESC'
				)
			);
			$total_post_count = $all_posts->found_posts;
			$array_of_indexed_posts = array();

			if ( $all_posts->have_posts() ) { ?>
				<?php
				while ( $all_posts->have_posts() ) : $all_posts->the_post();
					$index = $total_post_count - ($all_posts->current_post);
					$post_id = get_the_ID();
					$array_of_indexed_posts[$post_id] = $index;
					?>
				<?php endwhile;
				wp_reset_postdata(); ?>
			<?php }

			if ( ! empty( $prev_post ) ) {
				$prev_post_id = $prev_post->ID;
				$prev_post_index = $array_of_indexed_posts[$prev_post_id]; ?>
				<div class="col-6" id="previous">
					<h3 class="sans">Previously.</h1>
					<div class="description small">
						<ul>
							<li class="item">
								<a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post_index; ?>. <?php echo get_the_title( $prev_post->ID ); ?></a>
							</li>
						</ul>
					</div>
				</div>
			<?php } ?>

			<?php if ( ! empty( $next_post ) ) {
				$next_post_id = $next_post->ID;
				$next_post_index = $array_of_indexed_posts[$next_post_id]; ?>
				<div class="col-6 text-right" id="next">
					<h3 class="sans">Next.</h1>
					<div class="description small">
						<ul>
							<li class="item">
								<a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post_index; ?>. <?php echo get_the_title( $next_post->ID ); ?></a>
							</li>
						</ul>
					</div>
				</div>

			<?php } ?>

  </div>

</div>




	<?php
endwhile;

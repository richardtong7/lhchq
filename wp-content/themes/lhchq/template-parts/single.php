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

<div class="container-fluid container-lhc lead-container newsletter-container">
  <div class="row">
    <div class="col-12">
      <h1 class="sans"><?php echo get_the_title(); ?>.</h1>
    </div>
  </div>
</div>

<div class="container-fluid container-lhc">
	<div class="row">
		<div class="col-7" id="newsletter-text">
			<?php echo get_the_content(); ?>
		</div>
		<div class="col-2"></div>
		<div class="col-3" id="sidebar">


			<?php if (have_rows('job')): ?>
				<div class="sidebar-section" id="some-high-paying-jobs">
					<h5>Some high paying jobs</h5>
					<?php while (have_rows('job')): the_row();
						$title = get_sub_field('job_title');
						$description = get_sub_field('job_description');
						$url = get_sub_field('clickthrough_url'); ?>
						<div class="job item">
							<label class="job-title"><?php echo $title; ?></label>
							<div class="job-description small-description"><?php echo $description; ?></div>
							<a href="<?php echo $url; ?>" class="link">Apply Now &rarr;</a>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>


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

			<?php if ($playlist_name) { ?>
				<div class="sidebar-section" id="things-are-happening">
					<h5>What We're Listening To</h5>

					<div class="item album">
						<img src="<?php echo $cover_art['url']; ?>" class="album-art"/>
						<label><a href="<?php echo $playlist_link; ?>"><?php echo $playlist_name; ?></a></label>
						<div class="album-description small-description" style="float: left;"><?php echo $playlist_description; ?></div>
					</div>
				</div>
			<?php } ?>

			<?php
				$quote = get_field('quote');
				$source = get_field('source');
			?>
		</div>
	</div>

	<div class="row" id="whats-next">
    <div class="col-12">
			<?php
				$prev_post = get_previous_post();

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
					<h1 class="sans">Previously.</h1>
					<div class="description small" id="newsletter-listings">
						<ul>
							<li class="item">
								<a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post_index; ?>. <?php echo get_the_title( $prev_post->ID ); ?></a>
							</li>
						</ul>
					</div>
				<?php } ?>
    </div>
  </div>

</div>




	<?php
endwhile;

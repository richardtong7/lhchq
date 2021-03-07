<?php
/**
 * The template for the Client post type.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();

?>
<?php
	while ( have_posts() ) : the_post();
	$post = get_post();
	$page_title = get_the_title();
	$post_type = get_post_type();

	// Vars
	$hero_image = get_field('hero_image');
	$client_logo = get_field('client_logo');
	$background_info = get_field('background_info');
	$results_description = get_field('results_description');

?>

<div id="case-study-hero" <?php if ($hero_image) { ?>style=background:url('<?php echo $hero_image["url"]; ?>');<?php } ?>>
	<div id="case-study-hero-inner" class="container slide flex-container left-align" >
	  <div class="row">
	    <div class="col-12">
	      <h1 class="sans"><?php echo $page_title; ?></h1>
	    </div>
	  </div>
	</div>
</div>

<div class="container-fluid container-lhc" id="background-statement">
	<div class="row">
		<div class="col-12">
			<?php echo $background_info ?>
		</div>
	</div>
</div>

<!-- Gallery -->
<?php if (have_rows('gallery_images')): ?>
	<div class="container-fluid collapse-padding" id="gallery-images">
		<?php while (have_rows('gallery_images')): the_row();
			$image = get_sub_field('image'); ?>
			<div class="gallery-img-container"><img src="<?php echo $image['url']; ?>"/></div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>


<div class="container-fluid container-lhc" id="case-study-container">
	<div class="row">
		<div class="col-6" id="case-study-text">
			<?php echo get_the_content(); ?>
		</div>
		<div class="col-1"></div>

		<div class="col-5">
			<div id="case-study-stats">

				<?php if (have_rows('results')): ?>
					<div id="results" class="stats-section">
						<h5>Results</h5>
						<div id="results-description">
							<?php echo get_field('results_description'); ?>
						</div>
						<ul>
							<?php while (have_rows('results')): the_row();
								$stat = get_sub_field('stat');
								$description = get_sub_field('stat_description'); ?>
								<li class="stat">
									<label class="stat-label"><?php echo $stat; ?></label>
									<div class="stat-description"><?php echo $description; ?></div>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if (have_rows('deliverables')): ?>
					<div id="deliverables" class="stats-section">
						<h5>Deliverables</h5>
						<ul>
							<?php while (have_rows('deliverables')): the_row();
								$deliverable = get_sub_field('deliverable');
								$index = get_row_index(); ?>
								<li class="deliverable">
									<label>
									<?php if ($index < 10) {
										echo "0".$index;
									} else {
										echo $index;
									} ?>
									</label>
									<div class="deliverable-description"><?php echo $deliverable; ?></div>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div id="more-case-studies" class="container-fluid container-lhc left-align" >
	<div class="row">
		<div class="col-12">
			<h1 class="sans">More case studies.</h1>
			<?php $more_case_studies = array("Amazon Pay","Andela","Ceros","HIMSS","Amazon Pay Gift Guide", "IBM","Keystone","Lynda Carter", "NY State","NYS MTA");

			foreach ($more_case_studies as $client) { ?>
				<a href="/case-study/" class="case-study"><?php echo $client; ?></a>
			<?php } ?>
			<ul></ul>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$(".site-header").addClass("inverse");

		$('#gallery-images').flickity({
			imagesLoaded: true,
			arrowShape: {
				x0: 35,
			  x1: 60, y1: 25,
			  x2: 60, y2: 20,
			  x3: 40
			}
		});

		$(window).scroll(function(){
	    var hero  = $('#case-study-hero').height();
	    if ($(this).scrollTop() >= hero ){
				$(".site-header").removeClass("inverse");
				$("#header-logos .case-study-logo.white").hide();
				$("#header-logos .case-study-logo.color").css("display","flex");
				$("#header-logos img#lhc").removeClass("white");
	    } else {
				$(".site-header").addClass("inverse");
				$("#header-logos .case-study-logo.color").hide();
				$("#header-logos .case-study-logo.white").css("display","flex");
				$("#header-logos img#lhc").addClass("white");
			}
	  });
	})
</script>

<?php
endwhile;
get_footer();
?>

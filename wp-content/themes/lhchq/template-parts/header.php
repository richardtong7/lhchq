<?php
/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$request_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$post_type = get_post_type();
if (strpos($request_url, 'localhost') !== false) {
  $localhost = true;
	$root_url = "/lhchq/";
	$landing_page_id = 5;
} else {
	$localhost = false;
	$root_url = "/";
	$landing_page_id = 33;
}
?>

<header class="site-header" role="banner">
	<div class="container-fluid">
		<div class="row">

			<div class="site-nav-left col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

				<!-- Hamburger -->
				<button class="hamburger hamburger--collapse" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>

				<!-- Logo -->
				<div id="header-logos">

					<?php if ($post_type == "case-study") {
						$client_logo_white = get_field('client_logo_white');
						$client_logo_color = get_field('client_logo_color');
						$page_title = get_the_title();
						$image_id = strtolower(str_replace(" ","-",$page_title));
						if ($client_logo_white) { ?>
							<img src="<?php echo $client_logo_white['url']; ?>" class="<?php echo $image_id; ?> case-study-logo white"/>
						<?php } ?>

						<?php if ($client_logo_color) { ?>
							<img src="<?php echo $client_logo_color['url']; ?>" class="<?php echo $image_id; ?> case-study-logo color"/>
						<?php } ?>

					<?php } ?>

					<?php
						if ( has_custom_logo() ) {
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$image_url = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						?>
							<a href="<?php echo $root_url; ?>"><img src="<?php echo $image_url[0]; ?>" alt="Lighthouse Creative" class="custom-logo <?php if ($post_type == 'case-study') { echo 'white'; } ?>" id="lhc"/></a>
						<?php }
					?>
				</div>

			</div>

		</div>
	</div>
</header>

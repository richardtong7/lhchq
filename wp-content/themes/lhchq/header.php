<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<?php wp_head(); ?>
  <script>
    var $ = jQuery.noConflict();
  </script>

</head>
<body <?php body_class(); ?>>
	<?php get_template_part( 'template-parts/sidebar' ); ?>
	<?php get_template_part( 'template-parts/socials' ); ?>

	<div id="main">

		<?php
		hello_elementor_body_open();

		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
			get_template_part( 'template-parts/header' );
		}

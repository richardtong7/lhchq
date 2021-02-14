<?php
/**
 * The template for displaying the socials sidebar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div id="socials-nav-container">
	<?php if ( has_nav_menu( 'socials' ) ) : ?>
	<nav class="socials-nav" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'socials' ) ); ?>
	</nav>
	<?php endif; ?>
</div>

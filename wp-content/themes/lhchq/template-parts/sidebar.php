<?php
/**
 * The template for displaying the sidebar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div id="sidebar-nav-container" class="drop-shadow no-hover flex-container left-align">
  <div class="sidebar-menu-container">
		<?php if ( has_nav_menu( 'menu-1' ) ) : // menu-1 is the primary menu ?>
		<nav class="site-nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
		</nav>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'socials' ) ) : ?>
		<nav class="socials-nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'socials' ) ); ?>
		</nav>
		<?php endif; ?>

  </div>
</div>
<div id="main-body-overlay"></div>

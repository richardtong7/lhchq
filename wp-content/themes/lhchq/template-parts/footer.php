<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
?>
</div> <!-- main -->
<footer id="site-footer" class="site-footer" role="contentinfo">
	<ul id="footer-socials" class="flex-container">
		<li><a href="https://twitter.com/lhchq"><img src="https://lhchq.com/wp-content/uploads/2021/03/002-twitter.png" alt=""/></a></li>
		<li><a href="https://www.facebook.com/lhchq/"><img src="https://lhchq.com/wp-content/uploads/2021/03/001-facebook.png" alt=""/></a></li>
		<li><a href="https://www.instagram.com/lhc_ig/"><img src="https://lhchq.com/wp-content/uploads/2021/03/003-instagram.png" alt="" id="instagram"/></a></li>
		<li><a href="https://www.linkedin.com/company/lighthouse-creative-group/"><img src="https://lhchq.com/wp-content/uploads/2021/03/004-linkedin.png" alt=""/></a></li>
	</ul>
</footer>

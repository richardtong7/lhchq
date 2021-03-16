<?php
/**
* Template Name: Landing Page
**/
?>
<?php get_header();?>

<style type="text/css">
  .site-header {
    display: none;
  }

  #main, body, html {
    height: 100%;
  }

</style>

<div class="flex-container" id="lp-outer-container">
  <div class="container-fluid collapse-padding-right">
    <div class="row">
      <div class="col-12" id="lp-container">


        <!-- Video -->
        <div id="vid-container" style="background: #060606">
          <video autoplay playsinline muted loop preload poster="https://lhchq.com/wp-content/uploads/2021/03/black.png" style="margin-top: -720px;">
            <source type="video/mp4" src="https://lhchq.s3.amazonaws.com/brooklyn+train.mp4" />
          </video>
          <svg viewBox="0 0 1000 60" xmlns="https://www.w3.org/2000/svg">
            <g class="header-backdrop" mask="url(#header-mask)">
              <rect id="cover" x="0" y="0" width="100%" height="100%" />
            </g>
            <g class="transparent-text">
              <text id="heading" class="heading-text" text-anchor="start" x="7" y="0" dy="1em">LighthouseCreative.</text>
            </g>
            <mask id="header-mask">
              <use xlink:href="#cover" style="fill: white;" />
              <use xlink:href="#heading" />
              <use xlink:href="#heading" />
            </mask>
          </svg>
        </div>

        <?php if ( has_nav_menu( 'menu-1' ) ) : // menu-1 is the primary menu ?>
    			<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
    		<?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer();?>

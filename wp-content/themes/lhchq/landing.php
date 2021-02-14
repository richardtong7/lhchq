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

  .heading-text {
    font-size: 24px;
    font-weight: bold;
    letter-spacing: -1px;
  }

  .transparent-text {
    fill-opacity: 0;
    stroke: white;
    stroke-opacity: 0;
  }

  .header-backdrop {
    fill: #ffffff;
  }

  #vid-container {
    width: 100%;
    margin: 0px auto;
    max-width: 1200px;
    overflow: hidden;
    background: #ffffff;
  }

  svg {
    position: absolute;
    width: 100%;
    left: 0;
    top: 100px;
    height: 100%;
  }

</style>

<div id="main-container" class="flex-container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12" id="lp-container" style="opacity: 0.0; position: relative; right: -20px;">
        <h1>LighthouseCreative.</h1>

        <!-- https://s3.console.aws.amazon.com/s3/object/lhchq?region=us-east-1&prefix=brooklyn.mp4 -->
        <!-- <div id="vid-container">
          <video autoplay playsinline muted loop preload poster="assets/oceanshot.jpg">
            <source type="video/mp4" src="/lhchq/wp-content/themes/lhchq/assets/media/brooklyn.mp4" />
          </video>
          <svg viewBox="0 0 160 120">
            <g class="header-backdrop" mask="url(#header-mask)">
              <rect id="cover" x="0%" y="-25%" width="120%" height="125%" />
            </g>
            <g class="transparent-text">
              <text id="heading" class="heading-text" text-anchor="start" x="0%" y="0%" dy="1em">LighthouseCreative.</text>
            </g>
            <mask id="header-mask">
              <use xlink:href="#cover" style="fill: white;" />
              <use xlink:href="#heading" />
              <use xlink:href="#heading" />
            </mask>
          </svg>
        </div> -->

        <?php if ( has_nav_menu( 'menu-1' ) ) : // menu-1 is the primary menu ?>
    			<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
    		<?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer();?>

<script type="text/javascript">
  $(function(){
    resizeText();
  })

  $(window).on("resize", function(){
    resizeText();
  })

  function resizeText() {

    var window_width = $(window).width()
    var headline_width = $("#lp-container h1").width();
    var new_width = window_width - 60;
    var headline_font_size = $("#lp-container h1").css("font-size").replace("px","");
    var headline_font_size = parseInt(headline_font_size);
    var new_font_size = parseInt(new_width * headline_font_size / headline_width);
    var new_letter_spacing = parseInt(new_font_size / 20);

    $("#lp-container h1").css({
      'font-size'     : new_font_size + "px",
      'line-height'   : new_font_size + "px",
      'letter-spacing': "-" + new_letter_spacing + "px"
    });

    $("#lp-container ul li").css({
      'font-size'     : new_font_size + "px",
      'line-height'   : new_font_size + "px"
    });

    $("#lp-container").delay(200).animate({
      opacity: 1.0,
      right: 0
    }, 700);

  }

</script>

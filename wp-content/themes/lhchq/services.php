<?php
/**
* Template Name: Services
**/
?>

<?php
  $demand_gen = 67;
  $design = 69;
  $photography = 70;
  $social_media = 71;
  $strategy = 72;
  $technology = 73;
  $video = 66;
  $writing = 74;

  $services = array(66,67,69,70,71,72,73,74);

?>


<?php get_header();?>

<div class="container-fluid container-lhc lead-container">
  <div class="row">
    <div class="col-12">
      <h1 class="sans"><?php echo get_the_title(); ?>.</h1>
      <div class="description">
        <?php echo get_the_content(); ?>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid container-lhc" id="services">
  <div class="row">
    <?php if (have_rows('category_of_services')): ?>
      <?php while (have_rows('category_of_services')): the_row();
        $icon = get_sub_field('icon');
        $icon_hover = get_sub_field('icon_hover');
        $label = get_sub_field('category_label');
        $parameterized_label = str_replace(" ","-", strtolower($label));
        $link = get_sub_field('link');
        ?>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 service" id="preview-<?php echo $parameterized_label; ?>">
          <div class="icon-container">
            <a href="#"><img src="<?php echo $icon['url']; ?>" class="default"/></a>
            <a href="#"><img src="<?php echo $icon_hover['url']; ?>" class="hover open-fs-modal"/></a>
          </div>
          <div class="clear"></div>

          <h3><a href="#" class="open-fs-modal"><?php echo $label; ?></a></h3>
          <ul>
            <?php if (have_rows('service')): ?>
              <?php while (have_rows('service')): the_row();
                $service = get_sub_field('name_of_service');
                ?>
                <li><?php echo $service; ?></li>
              <?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </div>

      <?php endwhile; ?>
    <?php endif; ?>

  </div>
</div>

<div id="fs-modal">

  <!-- X to close -->
  <div id="mdiv">
    <div class="mdiv">
      <div class="md"></div>
    </div>
  </div>

  <div id="fs-modal-inner" class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8" id="fs-modal-left">
        <div id="fs-modal-header"></div>
        <div id="fs-modal-subhead"></div>
        <div id="fs-modal-description"></div>
        <div id="fs-modal-testimonial">
          <div id="fs-modal-testimonial-quote"></div>
          <div id="fs-modal-testimonial-source"></div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="fs-modal-right">
        <div id="fs-modal-photo"></div>
        <div id="fs-modal-photo-name"></div>
        <div id="fs-modal-photo-title">Team Lead</div>
      </div>
    </div>
  </div>

  <div class="clear"></div>
</div>


<div id="services-detailed-descriptions">
  <?php
    foreach ($services as &$page_id) {
      $service_name = get_the_title($page_id);
      $parameterized_name = str_replace(" ","-", strtolower($service_name));
      $post = get_post($page_id);
      $service_description = $post->post_content;
      $photo = get_field('photo', $page_id);
      $name = get_field('name', $page_id);
      $quote = get_field('quote', $page_id);
      $source = get_field('source', $page_id);
      ?>

      <div class="service-details" id="<?php echo $parameterized_name; ?>">

        <?php
        if ($service_name) { ?>
          <div class="service-name"><?php echo $service_name; ?></div>
        <?php } else { ?>
          <div class="service-name"></div>
        <?php } ?>

        <?php
        if ($service_description) { ?>
          <div class="service-description"><?php echo $service_description; ?></div>
        <?php } else { ?>
          <div class="service-description"></div>
        <?php } ?>

        <?php
        if ($photo) { ?>
          <div class="service-photo"><?php echo $photo['url']; ?></div>
        <?php } else { ?>
          <div class="service-photo"></div>
        <?php } ?>

        <?php
        if ($name) { ?>
          <div class="service-team-lead"><?php echo $name; ?></div>
        <?php } else { ?>
          <div class="service-team-lead"></div>
        <?php } ?>

        <?php
        if ($quote) { ?>
          <div class="service-quote"><?php echo $quote; ?></div>
        <?php } else { ?>
          <div class="service-quote"></div>
        <?php } ?>

        <?php
        if ($source) { ?>
          <div class="service-source"><?php echo $source; ?></div>
        <?php } else { ?>
          <div class="service-source"></div>
        <?php } ?>

      </div>
    <?php }
  ?>
</div>



<?php get_footer();?>

<script type="text/javascript">
  $(window).on("click", function(e) {
    e.preventDefault();
    var modal_detail = $("#fs-modal-inner");

    if ($(e.target).hasClass("open-fs-modal")) {

      if ($(e.target).hasClass("hover")) {
        var service_id = $(e.target).parent().parent().parent().attr("id").replace("preview-","");
      } else {
        var service_id = $(e.target).parent().parent().attr("id").replace("preview-","");
      }

      var header = $("#" + service_id + " .service-name").text().trim(),
          subhead = $("#" + service_id + " .service-description h2").text().trim(),
          description = $("#" + service_id + " .service-description p").html(),
          photo = $("#" + service_id + " .service-photo").text().trim(),
          team_lead = $("#" + service_id + " .service-team-lead").text().trim(),
          quote = $("#" + service_id + " .service-quote").text().trim(),
          source = $("#" + service_id + " .service-source").text().trim();

      $("#fs-modal #fs-modal-header").text(header);
      $("#fs-modal #fs-modal-subhead").text(subhead);
      $("#fs-modal #fs-modal-description").html(description);
      if (photo == undefined) {
        $("#fs-modal-photo").html("");
      } else {
        $("#fs-modal-photo").html("<img src='" + photo + "' alt='" + name + "' class='img-fluid'/>");
      }
      $("#fs-modal #fs-modal-photo-name").text(team_lead);
      $("#fs-modal #fs-modal-testimonial-quote").text(quote);
      $("#fs-modal #fs-modal-testimonial-source").text(source);

      $("#fs-modal").fadeIn(200);
    } else if (!modal_detail.is(e.target) && modal_detail.has(e.target).length === 0) {
      $("#fs-modal").fadeOut(200);
    }

  })
</script>

<?php
/**
* Template Name: Contact
**/
?>
<?php get_header();?>


<div class="container-fluid container-lhc lead-container">
  <div class="row">
    <div class="col-12">
      <h1 class="sans"><?php echo get_the_title(); ?>.</h1>
      <div id="contact-form">
        <?php echo do_shortcode('[wpforms id="624"]'); ?>
      </div>
    </div>
  </div>
</div>




<?php get_footer();?>

<?php
/**
* Template Name: Services Detail
**/
?>
<?php get_header();?>

<div class="container-fluid container-lhc lead-container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
      <h1 class="sans"><?php echo get_the_title(); ?>.</h1>
      <div class="services-description">
        <?php echo get_the_content(); ?>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <?php
        $photo = get_field('photo');
        $name = get_field('name');
        if ($photo) { ?>
          <img src="<?php echo $photo['url']; ?>" alt="<?php echo $name; ?>"/>
          <div id="team-lead" class="text-right">
            <div class="name"><?php echo $name; ?></div>
            <label>Team Lead</label>
          </div>
        <?php } ?>
    </div>
  </div>
</div>

<?php get_footer();?>

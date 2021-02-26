<?php
/**
* Template Name: Services
**/
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
        $link = get_sub_field('link');
        ?>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 service">
          <div class="icon-container">
            <a href="<?php echo $link; ?>"><img src="<?php echo $icon['url']; ?>" class="default"/></a>
            <a href="<?php echo $link; ?>"><img src="<?php echo $icon_hover['url']; ?>" class="hover"/></a>
          </div>
          <div class="clear"></div>

          <h3><a href="<?php echo $link; ?>"><?php echo $label; ?></a></h3>
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

<?php get_footer();?>

<?php
/**
* Template Name: Projects
**/
?>
<?php get_header();?>

<div class="container-fluid container-lhc lead-container">
  <div class="row">
    <div class="col-12">
      <h1 class="sans"><?php echo get_the_title(); ?>.</h1>
      <div class="description small" id="newsletter-listings">
        <?php if (have_rows('project')) { ?>
          <?php while (have_rows('project')): the_row();
            $name = get_sub_field('name');
            $url = get_sub_field('url');
            ?>
            <li class="item">
              <?php if ($url) { ?>
                <a href="<?php echo $url; ?>"><?php echo $name; ?></a>
              <?php } else { ?>
                <?php echo $name; ?>
              <?php } ?>
            </li>
          <?php endwhile; ?>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer();?>

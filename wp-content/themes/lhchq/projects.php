<?php
/**
* Template Name: Projects
**/
?>
<?php get_header();?>

<style type="text/css">

  #projects-subhead p:before {
    content: "(";
  }
  #projects-subhead p:after {
    content: ")";
  }
  #projects-subhead {
    margin-bottom: 25px;
  }
</style>

<div class="container-fluid container-lhc lead-container">
  <div class="row">
    <div class="col-12">
      <h1 class="sans"><?php echo get_the_title(); ?>.</h1>
      <div class="description" id="projects-subhead">
        <?php echo get_the_content(); ?>
      </div>
      <div class="description small" id="newsletter-listings">
        <?php if (have_rows('project')) { ?>
          <?php while (have_rows('project')): the_row();
            $name = get_sub_field('name');
            $url = get_sub_field('url');
            ?>
            <li class="item">
              <?php if ($url) { ?>
                <a href="<?php echo $url; ?>" target="_blank"><?php echo $name; ?></a>
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

<?php
/**
* Template Name: Newsletter
**/

  // Vars
  $ppp = 200;

  // WP Query
  $posts = new WP_Query( array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $ppp,
    'orderby' => 'date',
    'order' => 'DESC'
    )
  );

  $total_post_count = $posts->found_posts;

?>
<?php get_header();?>


<div class="container-fluid container-lhc lead-container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <h1 class="sans">Newsletter.</h1>
      <div class="description small" id="newsletter-listings">
        <?php if ( $posts->have_posts() ) { ?>
          <ul>
            <?php
            while ( $posts->have_posts() ) : $posts->the_post();
              $index = $total_post_count - ($posts->current_post);
              ?>
              <li class="item">
                <a href="<?php the_permalink(); ?>"><span><?php echo $index ; ?>. </span> <?php the_title(); ?></a>
              </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
          </ul>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer();?>

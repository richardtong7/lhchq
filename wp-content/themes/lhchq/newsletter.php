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


<div class="container-fluid" id="mailchimp-signup">
  <div class="row">
    <div class="col-8">
      <!-- Begin Mailchimp Signup Form -->
      <div id="mc_embed_signup">
        <form action="https://lhchq.us17.list-manage.com/subscribe/post?u=d78e6378250fe9ea33d1d8c74&amp;id=9ff04b7d82" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
            	<label for="mce-EMAIL">Subscribe</label>
              <div class="clear"></div>
            	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d78e6378250fe9ea33d1d8c74_9ff04b7d82" tabindex="-1" value=""></div>
              <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
            </div>
        </form>
        <div class="clear"></div>
      </div>

      <!--End mc_embed_signup-->
    </div>
    <div class="col-4" id="newsletter-testimonial">
      <div class="testimonial">"By far the best newsletter I get from a dog."</div>
      <div class="source">- Janet Yellen</div>
    </div>
  </div>
</div>


<div class="container-fluid container-lhc lead-container newsletter-container">
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

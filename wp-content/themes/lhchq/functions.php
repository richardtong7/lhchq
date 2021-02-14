<?php

function enqueue_parent_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function load_scripts() {

  // Plugins
	wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/d676ab9d3a.js', array(), false, true );
  wp_enqueue_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), false, true );
  wp_enqueue_script( 'anime', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', array(), false, true );

  // Theme
  wp_enqueue_script( 'default', get_bloginfo( 'stylesheet_directory' ) . '/assets/js/default.js', array(), filemtime(get_theme_file_path('/assets/js/default.js')), true );

  // Localize scripts
  wp_localize_script( 'default', 'ajax_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'noposts' => __('No older posts found', 'lhchq'),
  ));
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

function load_header_styles() {

  // Plugins
  wp_enqueue_style( 'reset', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/css-reset-min.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/css-reset-min.css'));
  wp_enqueue_style( 'bootstrap-grid','https://cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.min.css');
  wp_enqueue_style( 'flickity','https://unpkg.com/flickity@2/dist/flickity.min.css');

  // Theme
  wp_enqueue_style( 'bootstrap-icons', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/bootstrap-icons.svg', array(), filemtime(get_stylesheet_directory() . '/assets/css/bootstrap-icons.svg'));
  wp_enqueue_style( 'hamburgers', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/hamburgers.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/hamburgers.css'));

  wp_enqueue_style( 'fonts', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/fonts.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/fonts.css'));
  wp_enqueue_style( 'global-base', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/global_base.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/global_base.css'));
  wp_enqueue_style( 'global-nav', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/global_nav.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/global_nav.css'));

  // Pages
  wp_enqueue_style( 'content', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/content.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/content.css'));

  // Mobile
  wp_enqueue_style( 'mobile', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/mobile.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/mobile.css'));

}
add_action( 'wp_enqueue_scripts', 'load_header_styles', 99 );

function load_footer_styles() {
  // Footer Styles
};
add_action( 'get_footer', 'load_footer_styles' );


function load_menus() {
  register_nav_menus(
    array(
      'socials' => __( 'Socials' )
    )
  );
}
add_action( 'init', 'load_menus' );

function load_posts_ajax() {
  $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 9;
  $post_type = (isset($_POST["post_type"])) ? $_POST["post_type"] : "post";
  $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
  header("Content-Type: text/html");

  $posts = new WP_Query( array(
    'post_type' => $post_type,
    'post_status' => 'publish',
    'posts_per_page' => $ppp,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $page
    )
  );
  $post_count = $posts->post_count;
  $total_post_count = $posts->found_posts;

  $out = '';

  if ($posts -> have_posts()) :  while ($posts -> have_posts()) : $posts -> the_post();
    $post = get_post();
    $permalink = get_the_permalink();
    $press_link_url = get_field('press_link_url');
    $title = get_the_title();
    $post_date = get_field('date');
    $source = get_field('source');
    $photo = get_the_post_thumbnail_url();
    $description = get_the_content();
    $image_string = '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 photo"><div class="placeholder"></div></div>';

    if (strlen($description) >= 190) {
      $description = strip_tags($description);
      $description = substr($description, 0, 190);
      $description .= '...';
    }

    $description .= '<a href="'.$permalink.'" class="read-more">Read more &raquo;</a>';

    if (strlen($photo) > 0) {
      $image_string = '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 photo"><img src="'.$photo.'" alt="'.$title.'"/></div>';
    }

    if (strlen($source) > 0) {
      $eyebrow = $source." &nbsp;|&nbsp; ";
    }

    if (strlen($post_date) > 0) {
      $eyebrow = $eyebrow.$post_date;
    }

    $out .= '<div class="press-article block text-left row">'.$image_string.'<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 description-container"><div class="eyebrow">'.$eyebrow.'</div><div class="title"><a href="'.$permalink.'">'.$title.'</a></div><div class="description aa text-left">'.$description.'</div></div></div>';

    endwhile;
  endif;
  wp_reset_postdata();

  $data = array("posts" => $out, "page_number" => $page, "post_count" => $post_count, "total_post_count" => $total_post_count);

  wp_send_json($data);
}
add_action('wp_ajax_nopriv_load_posts_ajax', 'load_posts_ajax');
add_action('wp_ajax_load_posts_ajax', 'load_posts_ajax');

add_filter('single_template', function($original){
  global $post;
  $post_type = $post->post_type;
  if ($post_type == "case-study") {
    $base_name = 'case-study.php';
    $template = locate_template($base_name);
    if ($template && ! empty($template)) return $template;
  } else {
    return $original;
  }
});

?>

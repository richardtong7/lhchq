<?php
/**
* Template Name: Clients
**/
?>
<?php get_header();?>

<div class="container-fluid container-lhc lead-container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <h1 class="sans"><?php echo get_the_title(); ?>.</h1>
      <div class="description small" id="client-listings">

        <!-- Clients -->
        <?php if (have_rows('client')): ?>

          <?php
            $repeater = get_field('client');
            foreach ($repeater as $key => $row) {
            	$the_name[$key] = $row['client_name'];
            }
            array_multisort($the_name, SORT_ASC, $repeater);
          ?>

          <?php if ($repeater) { ?>
            <ul>
              <?php foreach ($repeater as $row) {
                $logo = $row['logo'];
                $client_id = str_replace(" ","-",strtolower($row['client_name']));?>
                <li class="item flex-container">
                  <a href="#"><?php echo $row['client_name']; ?></a>
                  <img src="<?php echo $logo['url']; ?>" id="<?php echo $client_id; ?>"/>
                </li>
              <?php } ?>
            </ul>

          <?php } ?>

        <?php endif; ?>

      </div>
    </div>
  </div>
</div>

<?php get_footer();?>

<?php
/**
* Template Name: Clients
**/

$layout_found = isset($_GET["l"]);
$layout = $layout_found ? trim($_GET["l"]) : 'list';
?>
<?php get_header();?>

<div class="container-fluid container-lhc lead-container" id="clients">

  <!-- Grid -->
  <?php if ($layout && ($layout == "grid")) { ?>
    <div class="row" id="client-grid">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h1 class="sans"><?php echo get_the_title(); ?>.</h1>
      </div>

      <?php if (have_rows('client')): ?>
        <?php
          $repeater = get_field('client');
          foreach ($repeater as $key => $row) {
            $the_name[$key] = $row['client_name'];
          }
          array_multisort($the_name, SORT_ASC, $repeater);
        ?>
        <?php if ($repeater) { ?>
            <?php foreach ($repeater as $row) {
              $logo = $row['logo'];
              $client_id = str_replace(" ","-",strtolower($row['client_name']));?>
              <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <div class="client flex-container" style="border: 1px solid #eeeeee"><img src="<?php echo $logo['url']; ?>" id="<?php echo $client_id; ?>"/></div>
              </div>
            <?php } ?>
        <?php } ?>

      <?php endif; ?>
    </div>
  <?php } ?>


  <!-- List -->
  <?php if ($layout && ($layout == "list")) { ?>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h1 class="sans"><?php echo get_the_title(); ?>.</h1>
        <div class="description small" id="client-list">
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
                  $clickthrough_url = $row['clickthrough_url'];
                  $case_study = $row['case_study'];
                  $client_id = str_replace(" ","-",strtolower($row['client_name'])); ?>
                  <li class="item flex-container">
                    <?php if ($case_study) { ?>
                      <a href="<?php echo $case_study; ?>"><?php echo $row['client_name']; ?></a>
                    <?php } else if (strlen($clickthrough_url) > 0) { ?>
                      <a href="<?php echo $url; ?>"><?php echo $row['client_name']; ?></a>
                    <?php } else { ?>
                      <?php echo $row['client_name']; ?>
                    <?php } ?>
                    <img src="<?php echo $logo['url']; ?>" id="<?php echo $client_id; ?>"/>
                  </li>
                <?php } ?>
              </ul>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

<?php get_footer();?>

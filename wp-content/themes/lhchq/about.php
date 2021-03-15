<?php
/**
* Template Name: About
**/


$description = get_field('description');
$map = get_field('map');

?>
<?php get_header();?>
<style type="text/css">
  #fs-modal #fs-modal-testimonial::before {
    display: none;
  }
</style>

<div class="container slide flex-container left-align">
  <div class="row">
    <div class="col-12">
      <div class="eyebrow">About</div>
      <h1 class="serif">Lighthouse Creative is a <br/>full-service content agency.</h1>
    </div>
    <?php if ($description) { ?>
      <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
        <div class="description lead">
          <?php echo $description; ?>
        </div>
      </div>
    <?php } ?>
  </div>

</div>


<div id="fs-modal">

  <!-- X to close -->
  <div id="mdiv">
    <div class="mdiv">
      <div class="md"></div>
    </div>
  </div>

  <div id="fs-modal-inner" class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8" id="fs-modal-left">
        <div id="fs-modal-header"></div>
        <div id="fs-modal-subhead"></div>
        <div id="fs-modal-description"></div>
        <div id="fs-modal-testimonial">
          <div id="fs-modal-testimonial-quote"></div>
          <div id="fs-modal-testimonial-source"></div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="fs-modal-right">
        <div id="fs-modal-photo"></div>
        <div id="fs-modal-photo-name"></div>
        <div id="fs-modal-photo-title"></div>
      </div>
    </div>
  </div>

  <div class="clear"></div>
</div>


<div class="container slide height-auto black inverse flex-container" id="team-members">
  <div class="row text-center" style="justify-content: center">
    <?php if (have_rows('team_member')): ?>
      <?php while (have_rows('team_member')): the_row();
        $photo = get_sub_field('photo');
        $name = get_sub_field('name');
        $title = get_sub_field('title');
        $bio = get_sub_field('bio');
        $index = get_row_index();
        $muted = rand(0,1) == 1;
        $dog = get_sub_field('dog_or_human');

        ?>
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 team-member-container <?php if ($index == 6) { echo 'selected';} ?>  <?php if ($dog) { echo "dog"; } ?>">
          <div class="team-member text-center">

            <?php if ( $photo ) { ?>
              <div class="photo <?php if ($dog) { echo "dog"; } ?>">
                <img src="<?php echo $photo['url']; ?>" alt="<?php echo $name; ?>"/>
              </div>

              <?php if ($name) { ?>
                <div class="name">
                  <?php if ($muted) { ?>
                    <img src="http://lhchqstaging.wpengine.com/wp-content/uploads/2021/02/icon_muted.png" class="muted"/>
                  <?php } ?>
                  <?php echo $name; ?>
                </div>
              <?php } ?>

            <?php } else { ?>
              <div class="photo missing flex-container <?php if ($dog) { echo "dog"; } ?>"><?php echo explode(" ", $name)[0]; ?></div>

              <?php if ($name) { ?>
                <div class="name">
                  <?php if ($muted) { ?>
                    <img src="http://lhchqstaging.wpengine.com/wp-content/uploads/2021/02/icon_muted.png" class="muted" style="margin-right: 0;"/>
                  <?php } ?>
                  <span style="display: none;"><?php echo $name; ?></span>
                </div>
              <?php } ?>
            <?php } ?>

            <?php if ($title) { ?>
              <div class="title"><?php echo $title; ?></div>
            <?php } ?>

            <?php if ($bio) { ?>
              <div class="bio"><?php echo $bio; ?></div>
            <?php } ?>

          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>

<?php if ($map) { ?>
  <div class="container slide flex-container left-align" id="map" style="background:url('<?php echo $map["url"]; ?>') no-repeat; background-size: cover !important; background-position: center center !important;">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
<?php } ?>

<div class="container slide flex-container left-align">
  <div class="row">
    <div class="col-12">
      <div class="inner-container">
        <div class="eyebrow">Work With Us</div>
        <h2>Open roles.</h2>
        <?php if (have_rows('role')) { ?>
          <div class="details">
          <?php while (have_rows('role')): the_row();
            $job_title = get_sub_field('job_title');
            $url = get_sub_field('url');
            ?>
            <div class="item">
              <?php if ($url) { ?>
                <a href="<?php echo $url; ?>"><?php echo $job_title; ?></a>
              <?php } else { ?>
                <?php echo $job_title; ?>
              <?php } ?>
            </div>
          <?php endwhile; ?>
          </div>
        <?php } else { ?>
          <!-- no open roles -->
        <?php } ?>
      </div>

    </div>
  </div>
</div>

<div class="container slide inverse black flex-container left-align" style="background: url('http://lhchqstaging.wpengine.com/wp-content/uploads/2021/03/charles-1-1-scaled.jpg') no-repeat; background-size: cover !important; background-position: center center">
  <div class="row details">
    <div class="col-12">
      <div class="eyebrow">Work With Us</div>
      <h2>How we work.</h2>
      <div class="subhead">We are invested in the growth of both our clients and our team. We always respect our clients’ humanity, even when their requests are superhuman. We fully believe that work/life balance is compatible with being an always-responsive, letter-perfect services business.</div>
    </div>
    <div class="clear"></div>

    <?php if (have_rows('benefit')) { ?>
      <div id="benefits" class="container-fluid">
        <div class="row">
          <?php while (have_rows('benefit')): the_row();
            $name_of_benefit = get_sub_field('name_of_benefit');
            $index = get_row_index();
            ?>

            <?php if ($index % 3 == 0) { ?>
              <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4"></div>
            <?php } else { ?>
              <div class="benefit small col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <?php echo $name_of_benefit; ?>
              </div>
            <?php } ?>

          <?php endwhile; ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>


<?php get_footer();?>

<script type="text/javascript">
  $(window).on("click", function(e) {
    var modal_detail = $("#fs-modal-inner");

    if ($(e.target).hasClass("slide")) {
      var element = $(e.target).next();
      if (element.length != 0) {
        $('html, body').animate({
          scrollTop: $(e.target).next().offset().top
        }, 400);
      }
    } else if ($(e.target.parentElement).hasClass("photo") || $(e.target).hasClass("photo")) {

      if ($(e.target.parentElement).hasClass("dog") || $(e.target).hasClass("dog")) {
        return false;

      } else {
        var elem = $(e.target.parentElement.parentElement);
        var name = elem.find(".name").text().trim(),
            title = elem.find(".title").text().trim(),
            bio = elem.find(".bio").text().trim(),
            photo = elem.find(".photo img").attr("src");

        $("#fs-modal #fs-modal-header").text(name);
        $("#fs-modal #fs-modal-subhead").text(title);
        $("#fs-modal #fs-modal-description").text(bio);

        if (photo == undefined) {
          $("#fs-modal-photo").html("");
        } else {
          $("#fs-modal-photo").html("<img src='" + photo + "' alt='" + name + "' class='img-fluid'/>");
        }

        $("#fs-modal").fadeIn(200);
      }

    } else if (!modal_detail.is(e.target) && modal_detail.has(e.target).length === 0) {
      $("#fs-modal").fadeOut(200);
    }
  })
</script>

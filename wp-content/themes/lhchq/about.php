<?php
/**
* Template Name: About
**/


$description = get_field('description');
$map = get_field('map');

?>
<?php get_header();?>

<div class="container slide flex-container left-align">
  <div class="row">
    <div class="col-12">
      <div class="eyebrow">About</div>
      <h1 class="serif">Lighthouse Creative is a <br/>full-service content agency.</h1>
    </div>
    <?php if ($description) { ?>
      <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
        <div class="description lead">
          <?php echo $description; ?>
        </div>
      </div>
    <?php } ?>
  </div>

  <div id="scroll-notice">scroll to learn more</div>

</div>

<div id="team-member-detail">
  <div id="team-member-detail-outer" class="flex-container left-align">
    <div id="team-member-detail-inner" class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="bio-container">
          <div id="detail-title">title</div>
          <div id="detail-name"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
          <div id="detail-bio"></div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="photo-container">
        </div>
      </div>
    </div>
  </div>
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
    var team_member_detail = $("#team-member-detail-inner");

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

        $("#team-member-detail #detail-title").text(title);
        $("#team-member-detail #detail-name").text(name);
        $("#team-member-detail #detail-bio").text(bio);

        if (photo == undefined) {
          $("#team-member-detail #photo-container").html("");
        } else {
          $("#team-member-detail #photo-container").html("<img src='" + photo + "' alt='" + name + "' class='img-fluid'/>");
        }

        $("#team-member-detail").fadeIn(200);
        animateName();
      }

    } else if (!team_member_detail.is(e.target) && team_member_detail.has(e.target).length === 0) {
      $("#team-member-detail").fadeOut(200);
      resetName();
    }
  })


  function resetName() {
    $("#team-member-detail #detail-title").css({
      'left' : '20px',
      'opacity' : '0.0'
    });
    $("#team-member-detail #detail-bio").css({
      'left' : '5px',
      'opacity' : '0.0'
    });
    $("#team-member-detail #photo-container").css({
      'opacity' : '0.0'
    });
  }

  function animateName() {
    var textWrapper = document.querySelector('#team-member-detail #detail-name');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: false})
      .add({
        targets: '#detail-name .letter',
        translateX: [40,0],
        translateZ: 0,
        opacity: [0,1],
        easing: "easeOutExpo",
        duration: 600,
        delay: (el, i) => 500 + 30 * i
      })

    $("#team-member-detail #detail-title").animate({
      opacity: 1.0,
      left: "0",
    }, 1200, function(){
      $("#team-member-detail #detail-bio").animate({
        opacity: 1.0,
        left: "0"
      }, 400)

      $("#team-member-detail #photo-container").css("opacity", "1.0");
      $("#team-member-detail #photo-container img").animate({
        opacity: 1.0,
        left: "0"
      }, 400)
    })
  }


</script>

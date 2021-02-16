<?php
/**
* Template Name: About
**/
?>
<?php get_header();?>

<div class="container slide flex-container left-align">
  <div class="row">
    <div class="col-12">
      <div class="eyebrow">About</div>
      <h1 class="serif">Lighthouse Creative is a <br/><span>full-stack</span> content agency.</h1>
    </div>
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
      <div class="description lead">
        <p>Lighthouse creative was founded on in 2017 with the belief that all content should be good content. We work with some of the most influential companies on the planet to make sure everything they do — from social media stories to sales decks to TV spots — looks, sounds, and feels like a million bucks (even if it costs less).</p>
      </div>
    </div>
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
        ?>
        <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 team-member-container <?php if ($index == 6) { echo 'selected';} ?>">
          <div class="team-member text-center">
            <?php if ( $photo ) { ?>
              <div class="photo">
                <img src="<?php echo $photo['url']; ?>" alt="<?php echo $name; ?>"/>
              </div>
            <?php } else { ?>
              <div class="photo"></div>
            <?php } ?>
            <?php if ($name) { ?>
              <div class="name">
                <?php if ($muted) { ?>
                  <img src="http://lhchqstaging.wpengine.com/wp-content/uploads/2021/02/icon_muted.png" class="muted"/>
                <?php } ?>
                <?php echo $name; ?>
              </div>
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

<div class="container slide flex-container left-align" id="map" style="background:url('https://lhchq.s3.amazonaws.com/map_v2.png') no-repeat; background-size: 90%; background-position: 150% center !important;">
  <div class="row">
    <div class="col-12">
    </div>
  </div>
</div>

<div class="container slide flex-container left-align">
  <div class="row">
    <div class="col-12">
      <div class="inner-container">
        <div class="eyebrow">Work With Us</div>
        <h2>Open roles.</h2>
        <div class="details">
          <div class="item"><a href="">Sr. Content Strategist</a></div>
          <div class="item"><a href="">Director, Social Media</a></div>
          <div class="item"><a href="">Senior Editor</a></div>
          <div class="item"><a href="">Social Strategist</a></div>
          <div class="item"><a href="">Paid Media Specialist</a></div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container slide inverse black flex-container left-align" style="background: url('https://live.staticflickr.com/65535/50803867588_a2c642805a_h.jpg') no-repeat; background-size: cover !important; background-position: center center">
  <div class="row">
    <div class="col-12">
      <div class="eyebrow">Work With Us</div>
      <h2>Benefits.</h2>
    </div>
    <div class="col-5 details">
      <div class="item small">4 day work week / 401k</div>
      <div class="item small">Health insurance</div>
      <div class="item small">Snacks (delivered 2 yr home)</div>
      <div class="item small">Quarterly profit-sharing</div>
    </div>
    <div class="col-7 details">
      <div class="item small">Employee-owned company</div>
      <div class="item small">Dogs and kids encouraged in meetings</div>
      <div class="item small">Sick merch</div>
    </div>
  </div>
</div>


<?php get_footer();?>

<script type="text/javascript">
  $(window).on("click", function(e) {
    var team_member_detail = $("#team-member-detail-inner");

    if ($(e.target).hasClass("slide")) {
      var element = $(e.target).next();
      if (element.hasClass("inverse")) {
        $(".site-header").addClass("inverse")
      } else {
        $(".site-header").removeClass("inverse")
      }
      if (element.length != 0) {
        $('html, body').animate({
          scrollTop: $(e.target).next().offset().top
        }, 400);
      }
    } else if (e.target.parentElement.className == "photo") {
      var elem = $(e.target.parentElement.parentElement);
      var name = elem.find(".name").text().trim(),
          title = elem.find(".title").text().trim(),
          bio = elem.find(".bio").text().trim(),
          photo = elem.find(".photo img").attr("src");

      $("#team-member-detail #detail-title").text(title);
      $("#team-member-detail #detail-name").text(name);
      $("#team-member-detail #detail-bio").text(bio);
      $("#team-member-detail #photo-container").html("<img src='" + photo + "' alt='" + name + "' class='img-fluid'/>");

      $("#team-member-detail").fadeIn(200);
      animateName();

    } else if (!team_member_detail.is(e.target) && team_member_detail.has(e.target).length === 0)
    {
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
      $("#team-member-detail #photo-container img").animate({
        opacity: 1.0,
        left: "0"
      }, 400)
    })
  }


</script>

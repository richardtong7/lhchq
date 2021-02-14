$(function(){
  loadSidebarNav();
})


function loadSidebarNav() {

  // Check if the admin bar is displaying above the nav
  // in order to accommodate the logo placement in the sidebar
  if (($("#wpadminbar").length) && ($("#wpadminbar").is(":visible"))) {
    $("#sidebar-nav-container").addClass("accommodate-adminbar");
    $(".site-header").addClass("accommodate-adminbar");
  }

  // Clicking hamburger pops out sidebar nav
  // and displays white overlay above main body content
  $("header.site-header .hamburger").on("click", function(e){
    e.preventDefault();
    $(this).toggleClass("is-active");
    $("#main-body-overlay").fadeToggle(200);
    $("#sidebar-nav-container").toggleClass("is-active");
    $("#sidebar-nav-container .hamburger").toggleClass("is-active");

    if ($("#sidebar-nav-container").hasClass("is-active")) {
      $("#sidebar-nav-container .sidebar-menu-container ul li").each(function(i) {
        $(this).delay(50 * i).queue(function() {
          $(this).addClass("is-active");
          $(this).dequeue();
        })
      });
    } else {
      $("#sidebar-nav-container .sidebar-menu-container ul li").removeClass("is-active");
    }
  })

  // Clicking white overlay hides sidebar
  $("#main-body-overlay").on("click", function(e){
    e.preventDefault();
    $("header.site-header .hamburger").removeClass("is-active");
    $("#main-body-overlay").fadeToggle(200);
    $("#sidebar-nav-container").toggleClass("is-active");
    $("#sidebar-nav-container .hamburger").toggleClass("is-active");
    $("#sidebar-nav-container .sidebar-menu-container ul li").removeClass("is-active");
  })

  // Clicking close sidebar hides sidebar
  $("#close-sidebar").on("click", function(e){
    e.preventDefault();
    $("header.site-header .hamburger").removeClass("is-active");
    $("#main-body-overlay").fadeToggle(200);
    $("#sidebar-nav-container").toggleClass("is-active");
    $("#sidebar-nav-container .hamburger").toggleClass("is-active");
  })
}

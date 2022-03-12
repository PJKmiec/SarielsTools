$(document).ready(function() {
  fixNavbar();

  $(window).resize(function() {fixNavbar();});

  function fixNavbar() {
    if ($(window).width() < 992) {
      $(".navbar-collapse").removeClass("show");
    }
  }

});

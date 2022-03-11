$(document).ready(function() {

  // make sortable
  $("table").stupidtable();
  $($("th:eq(1)")).trigger( "click" );

  // auto add inches & studs
  $.fn.expandUnits = function() {
    function round(value, decimals) {return Number(Math.round(value+'e'+decimals)+'e-'+decimals);}
    var milli = $(this).text();

    if(milli.slice(-2) == "mm"){
      milli = milli.slice(0,-2);
      var inches = milli * 0.039370;
      var studs = milli / 8;
      $(this).append('<br />' + round(inches,2) + '"<br />' + round(studs,2) + " studs");
    }
  }

  $(".sortable").click(function() {
    $(".sortable").find("span").text("");
    if ($(this).hasClass("sorting-asc")) {
      $(this).find("span").text("arrow_drop_down");
    } else {
      $(this).find("span").text("arrow_drop_up");
    }

  });

  $("table tr td").each(function(){
    $(this).expandUnits();
  });

  // filter with checkboxes
  $("#showRoadBox").change(function() {
      if (this.checked) {$(".road").show();}
      else {$(".road").hide();}
  });

  $("#showOffroadBox").change(function() {
      if (this.checked) {$(".offroad").show();}
      else {$(".offroad").hide();}
  });

  $("#showBikeBox").change(function() {
      if (this.checked) {$(".bike").show();}
      else {$(".bike").hide();}
  });

  $("#showSinglePieceBox").change(function() {
      if (this.checked) {$(".single").show();}
      else {$(".single").hide();}
  });

  // show subparts and matching parts
  $("tbody tr").mouseenter(function() {
    $( this ).find("span").stop().animate({left: "260px", opacity: "1.0", filter: "alpha(opacity=100)"}, 250);
    $( this ).find("span").eq(1).stop().animate({left: "353px", opacity: "1.0", filter: "alpha(opacity=100)"}, 250);
  });

  $("tbody tr").mouseleave(function() {
    $( this ).find("span").stop().animate({left: "53px", opacity: "0", filter: "alpha(opacity=0)"}, 250);
  });

  $("tbody tr span").mouseenter(function() {
    $( this ).find("p").stop().slideDown("fast");
  });

  $("tbody tr span").mouseleave(function() {
    $( this ).find("p").stop().slideUp("fast");
  });

  // show number of items and update date
  var rowCount = $("table tr").length;
  $(".card-header").prepend('Total items: ' + (rowCount - 1) + '. Last updated: March 8th 2022.');

});

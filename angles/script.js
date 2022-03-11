$(document).ready(function() {

  $("#showPlatesBox").change(function() {
      if (this.checked) {$(".plate").show();}
      else {$(".plate").hide();}
  });

  $("#showSlopesBox").change(function() {
      if (this.checked) {$(".slope").show();}
      else {$(".slope").hide();}
  });

  $("#showTechnicBox").change(function() {
      if (this.checked) {$(".connector").show();}
      else {$(".connector").hide();}
  });

  $("#showMiscBox").change(function() {
      if (this.checked) {$(".misc").show();}
      else {$(".misc").hide();}
  });
});

$(document).ready(function() {

  $(function() {
    $( ".resizable" ).resizable({ grid: 40 }).draggable({ grid: [ 40,40 ] });

    //hover states on the static widgets
    $('.edit div, .toolbar div, .toolbar p, .icons div').hover(
      function() { $(this).addClass('ui-state-hover'); },
      function() { $(this).removeClass('ui-state-hover'); }
    );

  $('.toolbar .ui-icon-pencil').live('click', function() {
    $(".colorpicker").toggle();
  });

  $('.colorpicker span').live('click', function() {
    var setbg = $(this).css("background-color");
    $(this).closest('.resizable').css("background", setbg);
    $(".colorpicker").hide();
  });

  $('.toolbar .ui-icon-document').live('click', function() {
    var xid = $(this).parent().parent().parent().attr("id");
    var fid = "#" + xid + " .edit";
    $(fid).toggle();
    $(fid + " input").select();
  });

  $('.edit .ui-icon-arrowthick-1-e').live('click', function() {
    var xid = $(this).parent().parent().parent().attr("id");
    var newname = $('#' + xid + ' .edit input').val();
    $("#" + xid + " .text").html(newname);
    $("#" + xid + " .edit").hide();
  });

  $('#addnew').click(function(event) {
    var newbox = '<div class="resizable ui-widget-content" id="d' + $( "#incrementer" ).val() + '"><div class="toolbar"><div class="ui-state-default ui-corner-all" title="Change color" alt="Change color"><span class="ui-icon ui-icon-pencil"></span><span class="colorpicker"><span class="cyan"></span><span class="yellow"></span><span class="green"></span><span class="blue"></span><span class="red"></span><span class="pink"></span><span class="brown"></span><span class="violet"></span><span class="orange"></span><span class="white"></span></span></div><div class="ui-state-default ui-corner-all" title="Edit description"><span class="ui-icon ui-icon-document"></span></div></div><div class="text">Plot description</div><div class="edit"><input type="text" value="Plot description"><div class="ui-state-default ui-corner-all" title="Save"><span class="ui-icon ui-icon-arrowthick-1-e"></span></div></div>';
    $("#wrapper").append(newbox);
    $( ".resizable" ).resizable({ grid: 40 }).draggable({ grid: [ 40,40 ], });
    curnum = parseInt($( "#incrementer" ).val()) + 1;
    $( "#incrementer" ).val(curnum);
    return false;
  });

  $('.toolbar .ui-icon-trash').live('click', function() {
    var xid = $(this).parent().parent().parent().attr("id");
    var answer = confirm("Are you sure you want to delete this plot?");
      if (answer){
        $("#" + xid).hide();
      }
    });

  $('#railroad img').click(function(event) {

    var position = $(this).attr("src").indexOf('.') - 1;
    var whichtile = $(this).attr("src").charAt(position);
    if (whichtile < 3)
      var newtile = '<div class="draggableres" style="background-image: url(' + $(this).attr("src") + ');">';
    else
      var newtile = '<div class="draggable" style="background-image: url(' + $(this).attr("src") + ');">';
    $("#wrapper").append(newtile);
    $( ".draggable" ).draggable({ grid: [ 10,10 ], });
    $( ".draggableres" ).resizable({ grid: 10 }).draggable({ grid: [ 10,10 ], });
  });

  $('#wrappersize').submit(function(event) {
    var newwidth = parseInt($('#wrapper-w').val()) * 40;
    var newheight = parseInt($('#wrapper-h').val()) * 40;
    $('#wrapper').css("width", newwidth + "px");
    $('#wrapper').css("height", newheight + "px");
    return false;
  });

    $( "#droppable" ).droppable({
      drop: function( event, ui ) {
        $(ui.draggable).hide();
        $(this).html( "Deleted!");

        function resetkosza(){
          $( "#droppable" ).html("Trash area - drag items here to delete them");}

        setTimeout(function(){
          resetkosza();
        },1000);
      }
    });


  });
});

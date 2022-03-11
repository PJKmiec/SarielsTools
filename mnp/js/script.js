$(document).ready(function() {

  $(function() {
		$("ul input").val(0);

		$( ".resizable" ).draggable({ grid: [ 5,5 ] });

	$('#addnew').click(function(event) {
		var newbox = '<div class="resizable ui-widget-content" id="d' + $( "#incrementer" ).val() + '">';
		$("#wrapper").prepend(newbox);
		$( ".resizable" ).resizable({ grid: 5 });
		curnum = parseInt($( "#incrementer" ).val()) + 1;
		$( "#incrementer" ).val(curnum);
		return false;
	});

	$('#menu img').click(function(event) {
		var xtitle = $(this).attr("title");
		var newtile = '<div class="draggable" style="background-image: url(' + $(this).attr("src") + '); width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" title="' + xtitle + '">';
		$("#wrapper").prepend(newtile);
		$( ".draggable" ).draggable({ grid: [ 5,5 ], });

		var handle = "#" + xtitle;
		var x = parseFloat($(handle).val()) + 1;
		$(handle).val(x);

	});

	$('#wrappersize').submit(function(event) {
		var newwidth = parseInt($('#wrapper-w').val()) * 5;
		var newheight = parseInt($('#wrapper-h').val()) * 5;
		$('#wrapper').css("width", newwidth + "px");
		$('#wrapper').css("height", newheight + "px");
		return false;
	});

		$( "#droppable" ).droppable({
			drop: function( event, ui ) {
				$(ui.draggable).hide();
				var y = $(ui.draggable).attr("title");
				var handle = "#" + y;
				var x = parseFloat($(handle).val()) - 1;
				$(handle).val(x);

				$(this).html( "Item deleted.");

				function resetkosza(){
					$( "#droppable" ).html("Trash area - drag & drop items here to delete them");}

				setTimeout(function(){
					resetkosza();
				},1000);
			}
		});

	});

});

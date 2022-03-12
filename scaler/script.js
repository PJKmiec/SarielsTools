$(document).ready(function(){

  var paper = $("#paper");
  paper[0].ruler = new Ruler(paper[0]);

	$('#blueprint').focus(function(event) {
		$("#blueprint").select();
	});

  var protractorAX = 0;
  var protractorAY = 0;
  var protractorBX = 0;
  var protractorBY = 0;
  var ratio = 1;

  //Protractor tool
  $('#protractor-active').change(function() {
    if(this.checked) {
      $(".card:eq(3)").css("box-shadow", "0 2px 0 rgba(255,180,0,.5),0 4px 8px rgba(255,180,0,.5),0 10px 10px rgba(255,180,0,.5),0 7px 70px rgba(255,180,0,.5)");
    } else {
      $(".card:eq(3)").css("box-shadow", "0 2px 0 rgb(90 97 105 / 11%), 0 4px 8px rgb(90 97 105 / 12%), 0 10px 10px rgb(90 97 105 / 6%), 0 7px 70px rgb(90 97 105 / 10%)");
    }
});

  $('#paper').click(function(e) {
    if ($('#protractor-active').is(":checked")) {
      if ($('#protractor1').text() == "unknown") {
        protractorAX = e.pageX;
        protractorAY = e.pageY;
        $('#protractor1').text("X:" + e.pageX + ", Y:" + e.pageY);
        $('#protractor-reset1').removeClass("d-none");
      } else {
        protractorBX = e.pageX;
        protractorBY = e.pageY;
        $('#protractor2').text("X:" + e.pageX + ", Y:" + e.pageY);
        $('#protractor-reset2').removeClass("d-none");
      }

      // calculate distance and angle
      if ($('#protractor1').text() != "unknown" && $('#protractor2').text() != "unknown") {
        var a = protractorAX - protractorBX;
        var b = protractorAY - protractorBY;

        var distanceUnits = $( "#units option:selected" ).text();

        if ($('#ratio-size').val() <= 0 || $('#ratio-size').val() == "") {
          distanceUnits = "pixels";
        }

        var distance = Math.round(Math.sqrt( a*a + b*b ) * ratio * $('#units').val() * $('#accuracy').val()/$('#accuracy').val() * 100) / 100;
        $('#protractor-distance').text(distance + " " + distanceUnits);
        var angle = Math.round(Math.atan2(b, a) * 180 / Math.PI * 100) / 100;

        if (angle > 90 && angle < 180) {
          var angle1 = Math.round((angle - 90) * 100) / 100;
          $('#protractor-angle-img').css("background-position", "top left").show();
        } else if (angle > 0 && angle < 90) {
          var angle1 = angle;
          $('#protractor-angle-img').css("background-position", "bottom left").show();
        } else if (angle < -90 && angle > -180) {
          var angle1 = Math.round((angle + 180) * 100) / 100;;
          $('#protractor-angle-img').css("background-position", "top right").show();
        } else {
          var angle1 = Math.round((angle + 90) * 100) / 100;;
          $('#protractor-angle-img').css("background-position", "bottom right").show();
        }
        $('#protractor-angle').html("<span class='red'>" + angle1 + "&deg;</span> / <span class='blue'>" +  Math.round((90 - angle1) * 100) / 100 + "&deg;</span> ");

      }

      $("svg path").last().remove();
  		$(".hlabel").last().remove();
  		$(".vlabel").last().text("").css("border-radius", "3px");
    }
  });

  $('#protractor-reset1').click(function(e) {
    protractorAX = 0;
    protractorAY = 0;
    $('#protractor1').text("unknown");
    $('#protractor-distance').text("unknown");
    $('#protractor-angle').text("unknown");
    $('#protractor-angle-img').hide();
    $('#protractor-reset1').hide();
    e.preventDefault();
    return false;
  });

  $('#protractor-reset2').click(function(e) {
    protractorBX = 0;
    protractorBY = 0;
    $('#protractor2').text("unknown");
    $('#protractor-distance').text("unknown");
    $('#protractor-angle').text("unknown");
    $('#protractor-angle-img').hide();
    $('#protractor-reset2').hide();
    if ($(".vlabel").last().text() == "") {$(".vlabel").last().remove();}
    e.preventDefault();
    return false;
  });

	// load image
	$('#blueprint-submit').click(function(event) {
		$("#canvas").css("background", "#797979 url('images/spinner.gif') no-repeat 50% 200px");
		$("#canvas").html("<img src='" + $("#blueprint").val() + "' alt=''>");
		if ($("#blueprint").val()){
      $("#imageControls").removeClass("d-none");

			if ($.cookie("modelscalerlastused")){
				var lastimage = $.cookie("modelscalerlastused").split('^');

				if (lastimage[0] != $("#blueprint").val())
					$.cookie("modelscalerlastused", $("#blueprint").val() + '^' + lastimage[0] + '^' + lastimage[1] + '^' + lastimage[2] + '^' + lastimage[3], { expires: 60, path: '/', domain: 'scaler.sariel.pl' });
			}
			else
				$.cookie("modelscalerlastused", $("#blueprint").val() + '^', { expires: 60, path: '/', domain: 'scaler.sariel.pl' });
		}
	});

  // reset to original size
	$('#refit').click(function(event) {
		$("#canvas").css("background", "#797979 url('images/spinner.gif') no-repeat 50% 200px");
		$("#canvas").html("<img src='" + $("#blueprint").val() + "' alt=''>");
		return false;
	});

	// fit image to canvas
	$('#fit').click(function(event) {
		var canwidth = $("#canvas").width();
		var width = $("#canvas img").width();
    var height = $("#canvas img").height();
		ratio = canwidth / width;
		$("#canvas img").css("width", canwidth);
		$("#canvas img").css("height", height * ratio);
		return false;
	});

  // increase size
	$('#increase').click(function(event) {
    var width = Math.round($("#canvas img").width() * 1.1);
    var height = Math.round($("#canvas img").height() * 1.1);
		$("#canvas img").css("width", width);
		$("#canvas img").css("height", height);
		return false;
	});

  // decrease size
	$('#decrease').click(function(event) {
    var width = Math.round($("#canvas img").width() * 0.9);
    var height = Math.round($("#canvas img").height() * 0.9);
		$("#canvas img").css("width", width);
		$("#canvas img").css("height", height);
		return false;
	});

	// change color
	$('#colors a').click(function(event) {
		var color = this.id.replace('c-', "");
		$("#color").val(color);
		$(".hlabel").css("color", color);
		$(".vlabel").css("color", color);
		$('path').attr('stroke', color);
		$("#labelcolor").val("black");
		$(".hlabel").css("background-color", $("#labelcolor").val());
		$(".vlabel").css("background-color", $("#labelcolor").val());

		if (color == "black" || color == "green" || color == "blue"){
		$("#labelcolor").val("yellow");
		$(".hlabel").css("background-color", $("#labelcolor").val());
		$(".vlabel").css("background-color", $("#labelcolor").val());
		}

		return false;
	});

	$('#getratio').click(function(event) {
		getRatio();
		return false;
	});

	$('#units').change(function() {
		getRatio();
	});

	$('#accuracy').change(function() {
		getRatio();
	});

	// calculate ratio
	function getRatio() {
		var studs = $("#ratio-size").val();
    var r_type = $("#ratio-type").val();
		$("#ratioresult").html("<strong>Results:</strong><br />");

		if (studs < 1){
			$("#ratio-size").css("background","red");
			$("#ratioresult").append('<span class="warning">Enter dimension no less than 1 stud!</span>');
			}
		else if (studs >= 1){
			$("#ratio-size").css("background","#f3f3f3");

			if ($('.hlabel').length < 1)
				$("#ratioresult").append('<span class="warning">Draw dimension first!</span>');
			else{
				if ($("#originaldimension").val() == 0)
					$("#originaldimension").val($("." + r_type + "label").html());
				var dimension = $("#originaldimension").val();
				ratio = Math.round((studs / dimension)*1000000)/1000000;
				$("#ratio").val(ratio);
				$("#ratioresult").append('1 px = ' + ratio + ' stud');
				$('.hlabel').each(function(index) {
					$(this).html(Math.round((parseInt($(this).attr("title")) * ratio) * $('#units').val() * $('#accuracy').val())/$('#accuracy').val()); // calculate
				});
				$('.vlabel').each(function(index) {
					$(this).html(Math.round((parseInt($(this).attr("title")) * ratio) * $('#units').val() * $('#accuracy').val())/$('#accuracy').val()); // calculate
				});
				$("#scale").removeClass("d-none");
			}
		}
	}

	$('#getscale').click(function(event) {
		getScale();
		return false;
	});

	// calculate scale
	function getScale() {
		var studs = $("#ratio-size").val();
		var realsize = $("#scale-size").val();
		var realunits = $("#scale-units").val();

		if (realsize < 1)
			$("#scaleresult").html('<br /><span class="warning">Enter dimension no less than 1 unit!</span>');
		else
		{
			var scale = Math.round(((studs * realunits) / realsize) * 100)/100;

			if (scale < 1)
				var rscale = '1:' + Math.round((1 / scale) * 10)/10 + ' scale (' + Math.round((1 / scale) * 10)/10 + ' times smaller than original).';
			else if (scale == 1)
				var rscale = '1:1 scale (same size as original).';
			else
				var rscale = scale + ':1 scale (' + scale + ' times bigger than original).';

			$("#scaleresult").html('<br />Your model is in ' + rscale);
		}
	}

	// clear all measurements
	$('#clear-all').click(function(event) {
		var answer = confirm("Clear all existing measurements from the image?")
		if (answer){
			$("svg path").remove();
			$("#labels div").remove();
		}
		return false;
	});

	// clear last measurement
	$('#clear-last').click(function(event) {
		$("svg path").last().remove();
		$(".hlabel").last().remove();
		$(".vlabel").last().remove();
		return false;
	});

	// read last images from a cookie
	$('#blueprint').focus(function(event) {
		if ($.cookie("modelscalerlastused") != undefined){
			$('#lastused').html('<div style="font-weight: bold; margon-bottom: 3px;">The last 5 images used</strong> (click to load):</div>');
			var lastimage =  $.cookie("modelscalerlastused").split('^');
			for (var i=0; i < 5; i++){
				if (lastimage[i] && lastimage[i] != 'undefined')
					$('#lastused').append('<br />&raquo; <a href="' + lastimage[i] + '" id="lastimage' + i + '">' + lastimage[i] + '</a>');
			}
			$('#lastused').slideDown('slow');
		}
	});

	// get link from last images list
  $(document).on("click", "#lastused a" , function() {
		$('#blueprint').val($(this).attr("href"));
    $('#blueprint-submit').trigger("click");
		return false;
  });

	// hide last images list on clicking elsewhere
	$("body").click(function (evt) {
		var target = evt.target;
		if(target.id !== 'lastused' && target.id !== 'blueprint'){
				$("#lastused").slideUp('fast');
			}
    });

});

var Ruler = function (elem) {
  elem = $(elem);
  this.elem = elem[0];
  this.raph = new Raphael(elem[0],elem.width(),elem.height());

  var b = this;
  elem.mousedown(function(e) { b.start(e); });
  elem.mouseup(function(e) { b.finish(e); });
  elem.mousemove(function(e) { b.move(e); });
};


Ruler.methods = {
  start: function(e) {
    if ( this.start_at ) return;
    this.offset = $(this.elem).offset();
    this.start_at = { left: e.pageX - this.offset.left,
                      top: e.pageY - this.offset.top };

    // Create the path
    this.path = this.raph.path({stroke:$("#color").val(),'stroke-width':'2px'}).
      moveTo(this.start_at.left,this.start_at.top).
      lineTo(this.start_at.left,this.start_at.top).
      lineTo(this.start_at.left,this.start_at.top);

    // Create the text labels
    this.hlabel = $('<div class="hlabel" style="color: ' + $("#color").val() + '; background-color: ' + $("#labelcolor").val() + '"></div>').
      appendTo($("#labels"));
    this.vlabel = $('<div class="vlabel" style="color: ' + $("#color").val() + '; background-color: ' + $("#labelcolor").val() + '"></div>').
      appendTo($("#labels"));
    this.unselectable(this.hlabel[0]);
    this.unselectable(this.vlabel[0]);

    this.dir = null; // initially un-biased
    this.move(e);

    return false;
  },

  finish: function(e) {
    this.start_at = null;
     return false;
  },

  finishclear: function(e) {
    this.start_at = null;
    try {
			this.path[0].parentNode.removeChild(this.path[0]);
      this.hlabel[0].parentNode.removeChild(this.hlabel[0]);
      this.vlabel[0].parentNode.removeChild(this.vlabel[0]);
    } catch(e) { };
    return false;
  },

  move: function(e) {
    if ( !this.start_at ) return;
    var left = e.pageX - this.offset.left;
    var top = e.pageY - this.offset.top;
    this.draw(left,top);
    return false;
  },

  draw: function(left,top) {
    this.dx = (left - this.start_at.left);
    this.dy = (top - this.start_at.top);
    if ( !this.dir ) this.bias(left,top);
    this.draw_lines(left,top);
    this.draw_labels(left,top);
  },

  bias: function(left,top) {
    var dx = Math.abs(this.dx);
    var dy = Math.abs(this.dy)
    if ( (dx+dy) > 10 )
      this.dir = (dx > dy) ? 'h':'v';
  },

  draw_lines: function(left,top) {
    var p = this.path.path;
    if ( this.dir == 'h' )
      p[1].arg = [left, this.start_at.top];
    else
      p[1].arg = [this.start_at.left, top];
    p[2].arg = [left, top];
    this.path.redraw();
  },

  draw_labels: function(left,top) {
    var hl, ht, vl, vt;
    if ( this.dir == 'h' ) {
      // horz label
      hl = (this.start_at.left + left)/2;
      ht = this.start_at.top;
      // vert label
      vl = left + 2;
      vt = (this.start_at.top + top)/2;
    } else {
      // horz label
      hl = (this.start_at.left + left)/2;
      ht = top;
      // vert label
      vl = this.start_at.left + 2;
      vt = (this.start_at.top + top)/2;
    }

		var mxsize = Math.round((parseInt(this.dx) * $("#ratio").val()) * $('#units').val() * $('#accuracy').val())/$('#accuracy').val();
		if (mxsize<0){
			mxsize = (mxsize * -1)}
		var txsize	= this.dx;
		if (txsize<0){
			txsize = (txsize * -1)}

		var mysize = Math.round((parseInt(this.dy) * $("#ratio").val()) * $('#units').val() * $('#accuracy').val())/$('#accuracy').val();
		if (mysize<0){
			mysize = (mysize * -1)}
		var tysize	= this.dy;
		if (tysize<0){
			tysize = (tysize * -1)}

		$(this.hlabel).text(mxsize).
      css({left: (this.offset.left + hl)+"px",
           top: (ht)+"px"}).
			attr({title: txsize});
    $(this.vlabel).text(mysize).
      css({left: (this.offset.left + vl)+"px",
           top: (vt)+"px"}).
			attr({title: tysize});
  },

  unselectable: function(element) {
    // http://ajaxcookbook.org/disable-text-selection/
    element.onselectstart = function() { return false; }
    element.unselectable = "on";
    element.style.MozUserSelect = "none";
  }

};
$.extend(Ruler.prototype,Ruler.methods);

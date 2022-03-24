$(document).ready(function(){

  var paper = $("#paper");
  paper[0].ruler = new Ruler(paper[0]);

  // Protractor transparency slider
  jQuery('#shards-custom-slider').customSlider({
    start: [50],
    tooltips: true,
    range: {
      'min': 0,
      'max': 100
    },
    pips: {
      mode: 'positions',
      values: [0, 25, 50, 75, 100],
      density: 5
      }
  });

  // Protractor label transparency slider
  jQuery('#shards-custom-slider2').customSlider({
    start: [100],
    tooltips: true,
    range: {
      'min': 0,
      'max': 100
    },
    pips: {
      mode: 'positions',
      values: [0, 25, 50, 75, 100],
      density: 5
      }
  });

  function calculateMidpoint(x1, y1, x2, y2) {
     return [(parseInt(x1) + parseInt(x2)) / 2, (parseInt(y1) + parseInt(y2)) / 2];
   }

  function roundNumber(x, f = 2) {
    return Number(x.toFixed(f));
  }

  // protractor lines transparency
  $('#shards-custom-slider .noUi-handle').mouseup(function(e) {
    changeTransparency();
    $("svg line").last().attr("opacity", "1.0");
    $(".anglePoint").last().css("opacity", "1.0");
  });

  function changeTransparency() {
    let transparency = parseInt($("#protractorTransparency").val()) / 100;
    $("svg line").attr("opacity", transparency);
    $(".anglePoint").css("opacity", transparency);
  }

  $('#shards-custom-slider2 .noUi-handle').mouseup(function(e) {
    changeLabelTransparency();
    $(".dlabel").last().css("opacity", "1.0");
  });

  function changeLabelTransparency() {
    let transparency = parseInt($("#protractorLabelTransparency").val()) / 100;
    $(".dlabel").css("opacity", transparency);
  }

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

  function setProtractorA (x, y) {
    protractorAX = x;
    protractorAY = y;
    $('#protractor1').text("X:" + x + ", Y:" + y);
    $('#protractor-reset1').removeClass("d-none");
  }

  $('#paper').click(function(e) {
    if ($('#protractor-active').is(":checked")) {
      if ($('#protractor1').text() == "unknown") {
        setProtractorA (e.pageX, e.pageY);
      } else {
        // chain up a new segment if there already is one
        if ($('#protractor2').text() != "unknown") {
          let cordsX = $('#protractor2').text().split(":");
          let cordsY = cordsX[2];
          cordsX = cordsX[1].split(",")[0];
          setProtractorA (cordsX, cordsY);
        }

        protractorBX = e.pageX;
        protractorBY = e.pageY;
        $('#protractor2').text("X:" + e.pageX + ", Y:" + e.pageY);
        $('#protractor-reset2').removeClass("d-none");
        const svg = document.querySelector('svg');
        let labels = $(".vlabel").length;
        var startPoint = $(".vlabel").eq(labels - 2).position();
        var endPoint = $(".vlabel").last().position();
        changeTransparency();
        var newLine = document.createElementNS("http://www.w3.org/2000/svg", 'line');
        newLine.setAttribute('x1', startPoint.left + 2);
        newLine.setAttribute('y1', startPoint.top + 2);
        newLine.setAttribute('x2', endPoint.left + 2);
        newLine.setAttribute('y2', endPoint.top + 2);
        newLine.setAttribute('stroke-width', 2);
        newLine.setAttribute("stroke", $('#colors').val());
        svg.appendChild(newLine);
      }

      // calculate distance and angle
      if ($('#protractor1').text() != "unknown" && $('#protractor2').text() != "unknown") {
        var a = protractorAX - protractorBX;
        var b = protractorAY - protractorBY;

        var distanceUnits = $("#units option:selected").text();

        if ($('#ratio-size').val() <= 0 || $('#ratio-size').val() == "") {
          distanceUnits = "pixels";
        }

        var rawDistance = Math.sqrt(a * a + b * b) ;
        var distance = roundNumber(rawDistance * ratio * $('#units').val(), $('#accuracy').val());
        $('#protractor-distance').text(distance + " " + distanceUnits);
        var angle = roundNumber(Math.atan2(b, a) * 180 / Math.PI);

        var midpoint = calculateMidpoint(protractorAX, protractorAY, protractorBX, protractorBY);
        var midpointLabel = $('<div class="dlabel" style="color: ' + $("#color").val() + '; background-color: ' + $("#labelcolor").val() + '" title="' + rawDistance + '"></div>');
        let midpointLabelCoords = {x: midpoint[0] - $("#paper").offset().left, y: midpoint[1] - $("#paper").offset().top };
        midpointLabel.text(distance).css({"left": midpointLabelCoords.x, "top": midpointLabelCoords.y}).appendTo($("#labels"));

        if (angle > 90 && angle < 180) {
          var angle1 = roundNumber(angle - 90);
          $('#protractor-angle-img').css("background-position", "top left").show();
        } else if (angle > 0 && angle < 90) {
          var angle1 = angle;
          $('#protractor-angle-img').css("background-position", "bottom left").show();
        } else if (angle < -90 && angle > -180) {
          var angle1 = roundNumber(angle + 180);
          $('#protractor-angle-img').css("background-position", "top right").show();
        } else {
          var angle1 = roundNumber(angle + 90);
          $('#protractor-angle-img').css("background-position", "bottom right").show();
        }
        $('#protractor-angle').html("<span class='red'>" + angle1 + "&deg;</span> / <span class='blue'>" +  roundNumber(90 - angle1) + "&deg;</span> ");
      }

      $("svg path").last().remove();
  		$(".hlabel").last().remove();
  		$(".vlabel").last().text("").css({"border-radius": "3px", "background-color": $("#colors").val()}).addClass("anglePoint");
    }
  });

  // save / load
  $('#saveLoadButton').click(function(event) {
    loadSaves();
  });

  function loadSaves() {
    var saves = ["save1", "save2", "save3"];

    saves.forEach(function (item) {
      var save = localStorage.getItem("afolscaler" + item);
      if (save != null && save != "" && save.includes("^", 10)) {
        var parts = save.split("^");
        $('#' + item + ' .blueprintSaveImg').css({"background": "transparent url(\"" + parts[1] + "\") no-repeat center", "background-size" : "cover"});
        $('#' + item + ' .blueprintSave span').text("SAVE " + parts[0]);
        $('#' + item + ' .blueprintSave .save').text("Save over");
        $('#' + item + ' .blueprintSave .load').removeClass("d-none");
        $('#' + item + ' .blueprintSave .delete').removeClass("d-none");
      } else {
        $("#" + item).html('<div class="blueprintSaveImg rounded"></div>' +
          '<div class="blueprintSave text-center pt-2 pl-4"><span>EMPTY</span><br><br>' +
            '<button class="save btn btn-success text-uppercase m-1">Save here</button>' +
            '<button class="load btn btn-info text-uppercase m-1 d-none">Load</button>' +
            '<button class="delete btn btn-danger text-uppercase m-1 d-none">Delete</button>' +
        '</div>')
      }
    });
  }

  // save a save
  $(document).on("click", ".modal-body .save" , function() {
    var id = $(this).parent().parent().attr("id");
    var today = new Date();
    var date = today.getDate() + "." + (today.getMonth() + 1 ) + "." + today.getFullYear() + " " +
    today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var blueprintLink = $("#blueprint").val();
    var blueprintSize = $("#blueprintSize").val();
    var ratio = $("#ratio").val();
    var ratioSize = $("#ratio-size").val();
    var ratioType = $("#ratio-type").val();
    var originaldimension = $("#originaldimension").val();
    var svgContent = $("#paper svg").html();
    var labelContent = $("#labels").html();
    var colors = $("#colors").val();
    var labelColors = $("#labelColors").val();
    var separator = "^";
    var saveString = date + separator
                   + blueprintLink + separator
                   + svgContent + separator
                   + labelContent + separator
                   + blueprintSize + separator
                   + ratioSize + separator
                   + ratioType  + separator
                   + ratio + separator
                   + originaldimension + separator
                   + colors + separator
                   + labelColors;
    localStorage.setItem("afolscaler" + id, saveString);
    loadSaves();
  });

  // load a save
  $(document).on("click", ".modal-body .load" , function() {
    var id = $(this).parent().parent().attr("id");
    var save = localStorage.getItem("afolscaler" + id);
    if (save != null && save != "" && save.includes("^", 10)) {
      var parts = save.split("^");
      var sizes = parts[4].split("x");
      $("#blueprint").val(parts[1]);
      $("#canvas").html("<img src='" + parts[1] + "' alt='' style='width: " + sizes[0] + "; height: " + sizes[1] + "'>");
      $("#blueprint-submit").trigger("click");
      $("svg").html(parts[2]);
      $("#labels").html(parts[3]);
      $("#ratio").val(parts[7]);
      $("#ratio-size").val(parts[5]);
      $("#ratio-type").val(parts[6]);
      $("#originaldimension").val(parts[8]);
      $("#colors").val(parts[9]);
      $("#color").val(parts[9]);
      $("#labelColors").val(parts[10]);
      $("#labelcolor").val(parts[10]);
      getRatio();
      $('#saveModal').modal('toggle');
    }
  });

  // delete a save
  $(document).on("click", ".modal-body .delete" , function() {
    var confirmation = confirm("Are you sure you want to delete a save?");
    if (confirmation) {
      var id = $(this).parent().parent().attr("id");
      localStorage.setItem("afolscaler" + id, null);
      loadSaves();
    }
  });

  // load image
	$('#blueprint-submit').click(function(event) {
		$("#canvas").html("<img src='" + $("#blueprint").val() + "' alt=''>");
    $("#blueprintSize").val($("#canvas img").width() + "x" + $("#canvas img").height());
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

  // upload image
  $('#blueprint-upload').click(function(event) {
    var file = $("#blueprint-local").get(0).files[0];
    if (file) {
      $("#canvas").html("<img src='' alt=''>");
      console.log("x");
      var reader = new FileReader();

      reader.onload = function(){
        $("#canvas img").attr("src", reader.result);
        $("#imageControls").removeClass("d-none");
      }

      reader.readAsDataURL(file);
    }

    $("#blueprintSize").val($("#canvas img").width() + "x" + $("#canvas img").height());
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
		$("#canvas").html("<img src='" + $("#blueprint").val() + "' alt=''>");
    $("#blueprintSize").val($("#canvas img").width() + "x" + $("#canvas img").height());
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
    $("#blueprintSize").val($("#canvas img").width() + "x" + $("#canvas img").height());
		return false;
	});

  // increase size
	$('#increase').click(function(event) {
    var width = Math.round($("#canvas img").width() * 1.1);
    var height = Math.round($("#canvas img").height() * 1.1);
		$("#canvas img").css("width", width);
		$("#canvas img").css("height", height);
    $("#blueprintSize").val($("#canvas img").width() + "x" + $("#canvas img").height());
		return false;
	});

  // decrease size
	$('#decrease').click(function(event) {
    var width = Math.round($("#canvas img").width() * 0.9);
    var height = Math.round($("#canvas img").height() * 0.9);
		$("#canvas img").css("width", width);
		$("#canvas img").css("height", height);
    $("#blueprintSize").val($("#canvas img").width() + "x" + $("#canvas img").height());
		return false;
	});

	// change color
	$('#colors').change(function(event) {
		var color = $(this).val();
    $("#color").val(color);
		$(".hlabel").css("color", color);
		$(".vlabel").css("color", color);
    $(".dlabel").css("color", color);
		$('path').attr('stroke', color);
    $('line').attr('stroke', color);
    $(".anglePoint").css("background-color", color);
		return false;
	});

  $('#labelColors').change(function(event) {
    var color = $(this).val();
    $("#labelcolor").val(color);
    $(".hlabel").css("background-color", color);
    $(".vlabel").not(".anglePoint").css("background-color", color);
    $(".dlabel").css("background-color", color);
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
			$("#ratio-size").css("border-color","red");
			$("#ratioresult").append('<span class="warning">Enter dimension no less than 1 stud!</span>');
			}
		else if (studs >= 1){
			$("#ratio-size").css("border-color","#red");

			if ($('.hlabel').length < 1)
				$("#ratioresult").append('<span class="warning">Draw dimension first!</span>');
			else{
				if ($("#originaldimension").val() == 0)
					$("#originaldimension").val($("." + r_type + "label").html());
				var dimension = $("#originaldimension").val();
				ratio = roundNumber((studs / dimension), 7);
				$("#ratio").val(ratio);
				$("#ratioresult").append('1 px = ' + ratio + ' stud');
				$('.hlabel').each(function(index) {
          $(this).text(recalculateMeasurement($(this)));
				});
				$('.vlabel').not('.anglePoint').each(function(index) {
          $(this).text(recalculateMeasurement($(this)));
				});
        $('.dlabel').each(function(index) {
          $(this).text(recalculateMeasurement($(this)));
        });
				$("#scale").removeClass("d-none");
			}
		}
    $("#ratio-type").prop('disabled', 'disabled');
	}

  function recalculateMeasurement(label) {
    return roundNumber((parseInt(label.attr("title")) * ratio) * $('#units').val(), $('#accuracy').val());
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
			var scale = roundNumber((studs * realunits) / realsize);

			if (scale < 1)
				var rscale = '1:' + roundNumber((1 / scale), 1) + ' scale (' + roundNumber((1 / scale), 1) + ' times smaller than original).';
			else if (scale == 1)
				var rscale = '1:1 scale (same size as original).';
			else
				var rscale = scale + ':1 scale (' + scale + ' times bigger than original).';

			$("#scaleresult").html('<br />Your model is in ' + rscale);
		}
	}

  function resetProtractor1() {
    protractorAX = 0;
    protractorAY = 0;
    $('#protractor1').text("unknown");
    $('#protractor-distance').text("unknown");
    $('#protractor-angle').text("unknown");
    $('#protractor-angle-img').hide();
  }

  function resetProtractor2() {
    protractorBX = 0;
    protractorBY = 0;
    $('#protractor2').text("unknown");
    $('#protractor-distance').text("unknown");
    $('#protractor-angle').text("unknown");
    $('#protractor-angle-img').hide();
  }

	// clear all measurements
	$('#clear-all').click(function(event) {
		var confirmation = confirm("Clear all existing measurements from the image?");
    if (confirmation) {
      if ($('#protractor-active').is(":checked")) {
        $("svg line").remove();
        $(".anglePoint").remove();
        $(".dlabel").remove();
        resetProtractor1();
        resetProtractor2();
      } else {
        $("svg path").remove();
  		  $(".hlabel").remove();
  		  $(".vlabel").remove();
      }
    }
		return false;
	});

	// clear last measurement
	$('#clear-last').click(function(event) {
    if ($('#protractor-active').is(":checked")) {
      $("svg line").last().remove();
      $(".anglePoint").last().remove();
      $(".dlabel").last().remove();
      resetProtractor1();
      resetProtractor2();
    } else {
      $("svg path").last().remove();
  		$(".hlabel").last().remove();
  		$(".vlabel").not(".anglePoint").last().remove();
    }
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
	$("body").click(function (e) {
		var target = e.target;
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

		var mxsize = Number((parseInt(this.dx) * $("#ratio").val() * $('#units').val()).toFixed($('#accuracy').val()));
		if (mxsize<0){
			mxsize = (mxsize * -1)}
		var txsize	= this.dx;
		if (txsize<0){
			txsize = (txsize * -1)}

    var mysize = Number((parseInt(this.dy) * $("#ratio").val() * $('#units').val()).toFixed($('#accuracy').val()));
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

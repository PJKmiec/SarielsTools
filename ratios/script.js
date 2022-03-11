	$(document).ready(function() {

		// calculate standard
		$('.dropdown-menu a').click(function(e) {
			var dropdown = $(this).parent();
			dropdown.dropdown('toggle');
			dropdown.parent().find('button').html($(this).html());

			var row = $(this).closest('.row');
			row.find('.col-1').removeClass("mt-3").addClass("mt-4");

			var gear1 = row.find('button').eq(0).text().trim();
			var gear2 = row.find('button').eq(1).text().trim();

			if(gear1 != 'Driver gear' && gear2 != 'Follower gear') {
				gear1 = gear1.split(' ')[0];
				gear2 = gear2.split(' ')[0];

				// calculate this pair's ratio
				var results = calculateRatio(gear1, gear2);
				var summary = "The gear ratio is <span class='singleRatio'>" + results[0] + "</span><br />" + results[1] +" " + results[2] + "<br />" + results[3];
				row.find('.col').html(summary);
				checkCompatibility(row);
				calculateTotalRatio();
			}

			e.preventDefault();
			return false;
		 });

		 // calculate ratio
		 function calculateRatio(gear1, gear2) {
			 if (parseFloat(gear1) == parseFloat(gear2))
			 {
				 var result = "1:1";
				 var speed = "The speed is unchanged.";
				 var torque = "The torque is unchanged.";
				 var rotation = "The follower gear rotates 1 time per each revolution of the driver gear.";
			 }
			 else if (parseFloat(gear1) < parseFloat(gear2))
			 {
				 var ratio = round((gear2 / gear1));
				 var result = ratio + ":1";
				 var ends = (round(1 / ratio) >= 2) ? "s" : "";
				 var speed = "The speed is decreased " + ratio + " times.";
				 var torque = "The torque is increased " + ratio + " times.";
				 var rotation = "The follower gear rotates " + round(1 / ratio) + " time" + ends + " per each revolution of the driver gear.";
			 }
			 else
			 {
				 var ratio = round((gear1 / gear2));
				 var result = "1:" + ratio;
				 var ends = (ratio >= 2) ? "s" : "";
				 var speed = "The speed is increased " + ratio + " times.";
				 var torque = "The torque is decreased " + ratio + " times.";
				 var rotation = "The follower gear rotates " + ratio + " time" + ends + " per each revolution of the driver gear.";
			 }

			 return [result, speed, torque, rotation];
		 }

		 // calculate total ratio
		 function calculateTotalRatio() {
			 var totalGear1 = parseFloat(1);
			 var totalGear2 = parseFloat(1);
			 $(".singleRatio").each(function(index) {
				 if ($(this).text() != "") {
					 let teeth = $(this).text().trim().split(':');
					 totalGear1 *= parseFloat(teeth[0]);
					 totalGear2 *= parseFloat(teeth[1]);
				 }
			 });

			 let modifier = 1
			 if ($("#planetary-active").prop("checked")) {
				 modifier = 5.4;
			 }

			 var totalRatio = calculateRatio(totalGear2, totalGear1 * modifier);

			 $("#finalRatio span").text(totalRatio[1] + " " + totalRatio[2]);
			 $("#finalRatio h3 span").text(totalRatio[0]);
			 calculateMotorPerformance();
		 }


// calculate planetary
$('#planetary').submit(function(e) {
	if ($('#planetary1').val() == 'Select' || $('#planetary2').val() == 'Select') {
		e.preventDefault();
		return false;
	}

	var sun = parseInt($('#planetary1').val());
	var ring = parseInt($('#planetary2').val());

	if (sun < ring) {
		var r1 = round((1 + ring) / sun) + ":1";
		var r2 = round(1 / ((1 + sun) / ring)) + ":1";
		var r3 = round(ring / sun) + ":1";
		$('#planetary-result-1').text(r1);
		$('#planetary-result-2').text(r2);
		$('#planetary-result-3').text(r3);
	} else {
		var errorMessage = "Error: this sun gear is too big for this ring gear.";
		$('#planetary-result-1').text(errorMessage);
		$('#planetary-result-2').text(errorMessage);
		$('#planetary-result-3').text(errorMessage);
	}
	e.preventDefault();
	return false;
  });

	// when planetary hub selected / deselected
	$("#planetary-active").change(function() {
		calculateTotalRatio();
	});

	// add pairs
	$('#add').click(function() {
		var p = parseInt($('#pair').val()) + 1;
		$('div .d-none:first').removeClass('d-none');
		$('#pair').val(p);

		if (p == 25) {
			$(this).hide();
		}
	});

	// remove pairs
	$('.btn-outline-warning').click(function() {
		var row = $(this).closest(".row");
		row.addClass('d-none');

		row.find('button').eq(0).text('Driver gear');
		row.find('button').eq(1).text('Follower gear');
		row.find('.col').text('');
		row.find('.col-1').removeClass("mt-4").addClass("mt-3");

		calculateTotalRatio();

		var p = parseInt($('#pair').val()) - 1;
		$('#pair').val(p);

		if (p < 25) {
			$('#add').show();
		}
	});

	$("#motorPicker").change(function() {
		calculateMotorPerformance();
	});

	$("#motorNumber").change(function() {
		calculateMotorPerformance();
	});

	// show motors output
	function calculateMotorPerformance() {
		if ($("#motorPicker").val() != 0) {
			let teeth = $("#finalRatio h3 span").text().split(':');
			let ratio = parseFloat(teeth[0]) / parseFloat(teeth[1]);

			var params = $("#motorPicker").val().split("/");
			var hmm = $("#motorNumber").val();

			var speed = round(params[0] / ratio * hmm);
			var torque = round(params[1] * ratio * hmm);
			$("#output").html('Theoretical output at 9V: speed ' + speed + ' RPM / torque '+ torque +' N.cm');
		} else {
			$("#output").html('');
		}
	}

	// check gears compatibility
	function checkCompatibility(row) {
		var button1 = row.find('button').eq(0);
		var button2 = row.find('button').eq(1);

		if (button1.hasClass("btn-danger")) {
			button1.removeClass("btn-danger").addClass("btn-primary");
		}

		if (button2.hasClass("btn-danger")) {
			button2.removeClass("btn-danger").addClass("btn-warning");
		}

		var gear1 = button1.text().trim().split(' ')[0];
		var gear2 = button2.text().trim().split(' ')[0];

        switch (gear1) {
            case "1":
							undesirables = [140, 168];
							if (undesirables.indexOf(parseInt(gear2)) !== -1) {alertIncompatibleGears(row);}
              break;
            case "14":
							undesirables = [8, 12, 16, 20, 24, 28, 36, 40, 56, 60, 140, 168];
							if (undesirables.indexOf(parseInt(gear2)) !== -1) {alertIncompatibleGears(row);}
              break;
        }

        switch (gear2) {
					case "14":
						undesirables = [8, 12, 16, 20, 24, 28, 36, 40, 56, 60, 140, 168];
						if (undesirables.indexOf(parseInt(gear1)) !== -1) {alertIncompatibleGears(row);}
						break;
        }

    }

		function alertIncompatibleGears(row) {
			row.find('button').removeClass("btn-primary").removeClass("btn-warning").addClass("btn-danger");
			row.find('.col').append("<br/><span class='text-danger'>Warning: the gears you've selected don't mesh with each other.</span>");
		}

	function round(x) {
		return Number(x.toFixed(2));
	}

	$('.liftarm').click(function() {
		$('.liftarm').removeClass("active");
		var locator = this.id;
		$('#' + locator).addClass("active");
		var v = this.id.replace("l-", "");
		$('#c-output').show();
		showCombinations('liftarm', v);
	});

	$('.brick').click(function() {
		$('.brick').removeClass("active");
		var locator = this.id;
		$('#' + locator).addClass("active");
		var v = this.id.replace("b-", "");
		$('#c-output').show();
		showCombinations('brick', v);
	});

	function showCombinations(type, locator) {
		if (type == 'liftarm')
			var combinations = {'a' : '8:8',
														'b' : '8:24 12:20 16:16 20:12 24:8',
														'c' : '8:40 12:36 24:24 36:12 40:8',
														'd' : '24:40 40:24',
														'e' : '40:40',
														'f' : '8:8',
														'g' : '',
														'h' : '12:24 16:20 20:16 24:12',
														'i' : '12:40 40:12',
														'j' : '24:40 40:24',
														'k' : '8:24 12:20 16:16 20:12 24:8',
														'l' : '12:24 16:20 20:16 24:12',
														'm' : '8:36 20:24 24:20 36:8',
														'n' : '16:40 20:36 36:20 40:16w',
														'o' : '36:36',
														'p' : '8:40 12:36 24:24 36:12 40:8',
														'q' : '12:40 40:12',
														'r' : '16:40 20:36 36:20 40:16',
														's' : '',
														't' : '40:40',
														'u' : '24:40 40:24',
														'w' : '24:40 40:24',
														'v' : '36:36',
														'y' : '40:40',
														'x' : '40:40'
													};
		else
			var combinations = {'a' : '8:12 12:g8',
													  'b' : '',
														'c' : '16:40 20:36 36:20 40:16',
														'd' : '36:40 40:36',
														'f' : '8:8',
														'g' : '8:16 16:8',
														'h' : '16:24 20:20 24:16',
														'i' : '20:40 24:36 36:24 40:20',
														'k' : '8:24 12:20 16:16 20:12 24:8',
													  'l' : '12:24 24:12',
														'm' : '8:40 16:36 24:24 36:16 40:8',
													  'n' : '24:40 40:24',
														'o' : '8:40 12db:36 24:24 36:12 40:8',
														'p' : '12:40 16:36 36:16 40:12',
														'r' : '20:40 24:36 36:24 40:20',
														's' : '36:40 40:36',
														't' : '24:40 40:24wc',
														'u' : '',
														'w' : '36:40 40:36',
														'v' : '40:40'
													};

			combinations = combinations[locator].split(" ");

			if (combinations.length > 0 && combinations[0].includes(':')) {
				if (combinations.length == 1) {
						$('#c-output').html("1 gear combination is available for these positions:");
						$('#c-combinations').empty();
						renderCombination(combinations[0]);
				} else {
					$('#c-output').html(combinations.length + " gear combinations are available for these positions:");
					$('#c-combinations').empty();

					combinations.forEach(function (c) {
  					renderCombination(c);
					});
				}
			} else {
				$('#c-output').html("There are no gear combinations available for these positions");
				$('#c-combinations').empty();
			}
	}

	function renderCombination(combination) {
		var gears = combination.split(":");
		var results = calculateRatio(gears[0], gears[1]);
		var summary = '<div class="row my-2 pt-4 border-top"><div class="col-2 mx-3"><img class="align-middle" src="images/g' + gears[0] + '.png"></div>' +
		'<div class="col-2 mx-3"><img class="align-middle" src="images/g' + gears[1] + '.png"></div>' +
		'<div class="col d-flex flex-wrap align-items-center"><h4>Gear ratio:' + results[0] + '</h4>' + results[1] + '<br>'
		+ results[2] + '<br>' + results[3] + '</div>';

		$('#c-combinations').html($('#c-combinations').html() + "<br>" + summary);



	}

	$('#liftarms').click(function() {
		$('#bricks').removeAttr("checked")
		$('.brick').removeClass("active");
		$('#c-liftarms').show();
		$('#c-bricks').hide();
		$('#c-output').empty();
		$('#c-output').hide();
		$('#c-combinations').empty();
	});

	$('#bricks').click(function() {
		$('#liftarms').removeAttr("checked")
		$('.liftarm').removeClass("active");
		$('#c-liftarms').hide();
		$('#c-bricks').show();
		$('#c-output').empty();
		$('#c-output').hide();
		$('#c-combinations').empty();
	});

	});

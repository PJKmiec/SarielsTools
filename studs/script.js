$(document).ready(function(){
	function round(value, decimals) {return Number(Math.round(value+'e'+decimals)+'e-'+decimals);}

	var f = null;
	var v = null;
	var x = null;
	var xs = 1;

function convert() {
	if (f == 's'){
		x = 20 * v;
		//$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'n'){
		x = 2.5 * v;
		$("#s").val(round(x / 20, 3));
		//$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'c'){
		x = 25 * v;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		//$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'm'){
		x = 2500 * v;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		//$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'i'){
		x = 25 * 2.54 * v;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		//$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'f'){
		x = 25 * 30.48 * v;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		//$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'l'){
		x = v;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		//$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'sb'){
		x = 24 * v;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		//$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'sp'){
		x = 8 * v;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		//$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'mi'){
		x = 100 * v;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		//$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'stl'){
		x = 20 * v * 13/15;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		//$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'ltl'){
		x = 20 * v * 13/8;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		//$("#ltl").val(round(x / 20 * 8/13, 3));
		$("#bpl32").val(round(x / 20 / 32, 3));
	}
	else if (f == 'bpl32'){
		x = 20 * v * 13/8;
		$("#s").val(round(x / 20, 3));
		$("#n").val(round(x * 0.4, 3));
		$("#c").val(round(x * 0.04, 3));
		$("#m").val(round(x * 0.0004, 3));
		$("#i").val(round(x * 0.04/2.54, 3));
		$("#f").val(round(x * 0.04/30.48, 3));
		$("#l").val(round(x, 3));
		$("#sb").val(round(x / 24, 3));
		$("#sp").val(round(x / 8, 3));
		$("#mi").val(round(x / 100, 3));
		$("#stl").val(round(x / 20 * 15/13, 3));
		$("#ltl").val(round(x / 20 * 8/13, 3));
		// $("#bpl32").val(round(x / 20 / 32, 3));
	}
}

function doscale() {
		$("#ss").val(Math.round(($("#s").val() / xs) * 1000) / 1000);
		$("#sn").val(Math.round(($("#n").val() / xs) * 1000) / 1000);
		$("#sc").val(Math.round(($("#c").val() / xs) * 1000) / 1000);
		$("#sm").val(Math.round(($("#m").val() / xs) * 1000) / 1000);
		$("#si").val(Math.round(($("#i").val() / xs) * 1000) / 1000);
		$("#sf").val(Math.round(($("#f").val() / xs) * 1000) / 1000);
		$("#sl").val(Math.round(($("#l").val() / xs) * 1000) / 1000);
		$("#ssb").val(Math.round(($("#sb").val() / xs) * 1000) / 1000);
		$("#ssp").val(Math.round(($("#sp").val() / xs) * 1000) / 1000);
		$("#smi").val(Math.round(($("#mi").val() / xs) * 1000) / 1000);
		$("#sstl").val(Math.round(($("#stl").val() / xs) * 1000) / 1000);
		$("#sltl").val(Math.round(($("#ltl").val() / xs) * 1000) / 1000);
		$("#sbpl32").val(Math.round(($("#bpl32").val() / xs) * 1000) / 1000);
}

$(".form-inline input").bind("change paste keyup", function() {
	f = this.id;
	v = $(this).val();
	convert();
	doscale();
});

$("#scale").bind("change paste keyup", function() {
	xs = $(this).val();
	doscale();
});

});

<?php

	$member = trim(strip_tags($_GET['m']));
	$total_views = trim(strip_tags($_GET['tv']));
	$folders = trim(strip_tags($_GET['f']));	
	$value = trim(strip_tags($_GET['a']));
	$value = explode(",", $value);
	
	for ($i=0; $i < count($value); $i++)
	{
		if ($i % 2 == 0)
			$output = $output.$value[$i].">".$value[($i + 1)]."<";
	}
	$value = $output."^".$total_views.":".$folders;
	
	if ($member && $value)
	{
		setcookie("BSS".$member, $value, time()+60*60*24*365, '/');
		echo "Stats saved. Re-render stats to see a comparison.
					<br />The save is valid for a year. You can have a single save of every BrickShelf gallery on a single computer - a new save overwrites the old one.";
	}
?>
<?PHP

	$member = trim(strip_tags($_GET['m']));
	$arr = trim(strip_tags($_GET['a']));
	$total_views = trim(strip_tags($_GET['tv']));
	$folders = trim(strip_tags($_GET['f']));	
	
	// save and close users log
	$plik = fopen("../logs/bsstats.log", "a");
	$logform = date('d-m-Y (H:i)')." - ".$member." - ".getenv ("REMOTE_ADDR")." \n";
	
	if (flock($plik, LOCK_EX))
	{
		fwrite($plik, $logform);
		flock($plik, LOCK_UN); 
	}
	
	fclose($plik);

	echo "<button style='width: 200px;' onClick='requestHttp3(\"php/save.php?m=".$member."&a=".$arr."&tv=".$total_views."&f=".$folders."\",\"footer\",\"Saving...\");'><strong>Save stats</strong></button>";

?>
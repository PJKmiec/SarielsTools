<div class='header'>Results</div><div class='content'>

<?php
$url = trim($_GET['g']);
if (!$url)
	echo "Please provide your page's URL address!";
else
	{
		$thumbnailsize = trim($_GET['t']);
		switch ($thumbnailsize) {
    case "128":
        $width = 128;
				$height = 72;
        break;
    case "320":
        $width = 320;
				$height = 180;
        break;
    case "640":
        $width = 640;
				$height = 360;
        break;
		}
		
		$imagesize = trim($_GET['i']);
		switch ($imagesize) {
    case "full":
        $crop = "";
        break;
    case "1920":
        $crop = "/1920x1080.JPG";
        break;
    case "1280":
        $crop = "/1280x720.JPG";
        break;
    case "800":
        $crop = "/800x450.JPG";
        break;
		}
		
		function get_content($URL){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $URL);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
		}
		
		$page = get_content($url);
		$page = explode ('<div class="cbp-caption-activeWrap" title="', $page);
		$hmf = count ($page);
		$path = end(explode('bricksafe.com/pages/',$url));
		$output = '';
		$totalfound = 0;
			
		for ($i = 1; $i < $hmf; $i++)
		{
			$subpage = explode ('">', $page[$i]);
			$filetype = substr($subpage[0], -4,1);
			if ($filetype == ".")
			{
				$totalfound++;
				$imgname = $subpage[0];
				$big = "http://bricksafe.com/files/".$path."/".$imgname;
				$thumb = $big."/".$width."x".$height.".jpg";
				$big = $big.$crop;			
				$name = end(explode('/',$path));
				$output = $output."<img src='".$thumb."' width='".$width."' height='".$height."' border='0' alt='".$name."' class='thumb' onClick='if(document.getElementById(\"image_".$i."\").value==\"1\"){this.className = \"selected\"; document.getElementById(\"image_".$i."\").value=\"0\"; add_pic(\"".$big."\", \"".$thumb."\");}else{this.className = \"thumb\"; document.getElementById(\"image_".$i."\").value=\"1\"; rem_pic(\"".$big."\", \"".$thumb."\");}'> ";
			}
		}
			
		$generated_content = "<div style='width: 100%; overflow-x:hidden;overflow-y:scroll;overflow:-moz-scrollbars-vertical !important; white-space: no-wrap; height: 405px; margin-bottom: 10px;'>".$output."</div>";

		echo "Images found: ".$totalfound.". Click the images you want to show in your post. Click again a selected image to deselect it: <br /><br />".$generated_content."<br /><br /><br />
			
		This is your BBCode. Mark it, copy it, and paste into your post:<br /><br />
		<textarea id='finalcode' name='finalcode' style='width: 100%; height: 100px; background: white; border: 1px solid silver;'></textarea>
		<br /><br />
		<input type='button' class='submit' value='Mark the code' onClick='document.getElementById(\"finalcode\").focus(); document.getElementById(\"finalcode\").select();'>
		<input type='button' class='submit' value='Clear the code' onClick='document.getElementById(\"finalcode\").value=\"\";'>";
	}

?>
</div>

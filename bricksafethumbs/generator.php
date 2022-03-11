<?php
if (!isset($_POST['gallery']))
	echo "Please provide your page's URL address!";
else
	{
		$url = trim($_POST['gallery']);
		$thumbnailsize = trim($_POST['thumbnailsize']);
		switch ($thumbnailsize) {
    case "320":
        $width = 320;
				$height = 180;
        break;
    case "640":
        $width = 640;
				$height = 360;
        break;
		default:
		    $width = 128;
				$height = 72;
		    break;
		}

		$imagesize = trim($_POST['imagesize']);
		switch ($imagesize) {
    case "1920":
        $crop = "/1920x1080.JPG";
        break;
    case "1280":
        $crop = "/1280x720.JPG";
        break;
    case "800":
        $crop = "/800x450.JPG";
        break;
		default:
		    $crop = "";
		    break;
		}

		function get_content($url)
		{
			$contents = file_get_contents($url, 200);
			return $contents;
		}

		$page = get_content($url);
		$page = explode('<div class="cbp-caption-activeWrap" title="', $page);
		$hmf = count($page);
		$path = explode('bricksafe.com/pages/',$url);
		$path = end($path);
		$output = '';
		$totalfound = 0;

		for ($i = 1; $i < $hmf; $i++)
		{
			$subpage = explode ('">', $page[$i]);
			$filetype = substr($subpage[0], -4, 1);
			if ($filetype == ".")
			{
				$totalfound++;
				$imgname = $subpage[0];
				$big = "http://bricksafe.com/files/".$path."/".$imgname;
				$thumb = $big."/".$width."x".$height.".jpg";
				$big = $big.$crop;
				$name = explode('/',$path);
				$name = end($name);
				$output = $output."<img src='".$thumb."' data-big='".$big."' width='".$width."' height='".$height."' border='0' alt='".$name."' class='thumb m-1'> ";
			}
		}

		$generated_content = "<div style='width: 100%; overflow-x:hidden;overflow-y:scroll;overflow:-moz-scrollbars-vertical !important; white-space: no-wrap; height: 305px; margin-bottom: 10px;'>".$output."</div>";

		echo "Images found: ".($hmf - 1).". Click the images you want to show in your post. Click again a selected image to deselect it: <br /><br />".$generated_content."<br /><br />

		This is your BBCode. Mark it, copy it, and paste into your post:<br /><br />
		<textarea id='finalcode' class='form-control w-60 mb-2' rows='4' style='height:100%'></textarea>
		<button class='btn btn-primary text-uppercase' id='markCodeButton'>Mark & copy the code</button>
		<button class='btn btn-danger text-uppercase' id='clearCodeButton'>Clear the code</button>";
	}

?>
</div>

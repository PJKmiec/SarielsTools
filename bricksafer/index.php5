<?php

$path = trim(strip_tags($_GET['f']));

if (!$path)
	echo '<form action="index.php" method="GET">Gallery URL:&nbsp;<input type="text" name="f"></form>';
else	
{
			function get_content($URL){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $URL);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
		}
		
			$page = get_content($path);
			$page = explode ('<div class="cbp-caption-activeWrap" title="', $page);
			$hmf = count ($page);
			$path = explode ('/sariel/', $path);
			$path = $path[1];
			
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
					$big = "http://bricksafe.com/files/sariel/".$path."/".$imgname;
					$thumb = $big."/128x72.jpg";
					$modelname = end(explode('/',$path));
					$output = $output."<a href='".$big."' rel='lightbox[".$modelname."]' title='".$imgname."'><img src='".$thumb."' width='128' height='72' border='0' alt='".$imgname."'></a> ";
				}
			}
			$totalwidth = 132 * $totalfound;
			
			$generated_content = "<div style='width: 100%; overflow-x:scroll;overflow-y:hidden;overflow:-moz-scrollbars-horizontal !important; white-space: no-wrap; height: 150px; margin-bottom: 10px;'><div style='height: 150px; width: ".$totalwidth."px;'>".$output."</div></div>";
			echo $generated_content."<br /><br />
			<textarea name='content' style='width: 800px; height: 200px; background: white; border: 1px solid silver; display: block; margin: 0 auto;' onFocus='this.select();'>".$generated_content."</textarea>";
			
}

?>
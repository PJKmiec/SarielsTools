
<?php
function open_page($url)
{
	$contents = file_get_contents($url, 200);
	return $contents;
}

function spitout($page)
{
			global $maindomain;
			$page = explode ('<TABLE WIDTH=840 BGCOLOR="#b0c0d0" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page);

			if (count($page) > 1)
				$page = $page[1].$page[2];
			else
				$page = $page[1];

			$page = explode ('<TABLE WIDTH=840 BGCOLOR="#d0d5df" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page);

			if (count($page) > 1)
				$page = $page[0].$page[2];
			else
				$page = $page[0];

			$cutoffs = array ('<TD WIDTH="15%" valign="top" align="center">', '</TR><TR>', '<TR>', '</tr>', '<TD WIDTH="15%">&nbsp;</TD>', '</TABLE>', '</FONT></B></FONT></TD>', '<BR><FONT SIZE=-1><B><FONT COLOR="#c00000">');
			$page = str_replace ($cutoffs, '', $page);

			$rows = explode ('<A HREF="/cgi-bin/gallery.cgi?i=', $page);
			$hmf = count($rows);

			$output = '';
			$totalwidth = 0;

			for ($i = 1; $i < $hmf; $i++)
			{
				$pts = explode ('"><IMG BORDER=0 WIDTH=', $rows[$i]);
				$pts = explode (' HEIGHT=', $pts[1]);
				$width = $pts[0];
				$pts = explode (' ALT="', $pts[1]);
				$height= $pts[0];
				$pts = explode ('" SRC=', $pts[1]);
				$name= $pts[0];
				$pts = explode ('></A>', $pts[1]);
				$thumb = $maindomain.$pts[0];
				$big = substr($thumb, 0, -10);
				$big = str_replace ('thumb/', '', $big);

				if (strtolower(substr($name, -3)) == "jpg" || strtolower(substr($name, -3)) == "png" || strtolower(substr($name, -3)) == "gif" || strtolower(substr($name, -4)) == "jpeg")
				{
					$totalwidth = $totalwidth + $width + 4;
					$output = $output."<img src='".$thumb."' data-big='".$big."' width='".$width."' height='".$height."' alt='".$name."' class='thumb m-1'>";

				}
			}
			$generated_content = "<div style='width: 100%; overflow-x:hidden;overflow-y:scroll;overflow:-moz-scrollbars-vertical !important; white-space: no-wrap; height: 305px; margin-bottom: 10px;'>".$output."</div>";

			echo "Images found: ".($hmf - 1).". Click the images you want to show in your post. Click again a selected image to deselect it: <br /><br />".$generated_content."<br /><br />

			This is your BBCode. Mark it, copy it, and paste into your post:<br /><br />
			<textarea id='finalcode' class='form-control w-60 mb-2' rows='4' style='height:100%'></textarea>
			<button class='btn btn-primary text-uppercase' id='markCodeButton'>Mark & copy the code</button>
			<button class='btn btn-danger text-uppercase' id='clearCodeButton'>Clear the code</button>
";
}

$gallery = trim($_POST['gallery']);
$url = $gallery;

$maindomain = "http://www.brickshelf.com";

if (!$gallery)
	echo 'Nie podano adresu galerii.';
else
	{
		$page = open_page($url);

		if (substr_count($page, "&n=48") > 0)
			$page = $page.open_page($url."&n=48");

		if (substr_count($page, "&n=96") > 0)
			$page = $page.open_page($url."&n=96");

		spitout($page);
	}

?>
</div>

<?PHP

$member = trim(strip_tags($_GET['m']));
$folder = trim(strip_tags($_GET['num']));
$totalviews = trim(strip_tags($_GET['views']));

if (isset($_COOKIE["BSS".$member])) {
  $save = $_COOKIE["BSS".$member];
}

$subfolders = '';

function roundPrecision($value, $precision=2 )
{
    $round = $precision - floor(log10(abs($value))) - 1;
    return round($value, $round);
}

// get saved values
if (isset($save))
{
	$save = explode("^", $save);
	$save = explode("<", $save[0]);
	$old_totalviews = 0;

	for ($i = 0; $i < count($save); $i++)
	{
		$item = $save[$i];
		$item = explode(">", $item);
		$old_totalviews = $old_totalviews + $item[1];

		if ($item[0] == $folder)
			$output = $item[1];
	}

	@ $old_share = ($output / $old_totalviews) * 100;
	$old_share = substr($old_share, 0, 4);
	$save = $output;
}


function open_page($url)
{
	$contents = file_get_contents($url, 200);
	return $contents;
}

if (!$member)
	echo 'No username specified.';
else
{
			if (is_numeric($member) == true)
				$url = "http://www.brickshelf.com/cgi-bin/gallery.cgi?f=".$member;
			else
				$url = "http://www.brickshelf.com/cgi-bin/gallery.cgi?m=".$member;

			if ($folder > 48)
			{
				$url = "http://www.brickshelf.com/cgi-bin/gallery.cgi?m=".$member."&n=48";
				$folder = $folder - 48;
			}

			$page = open_page($url);

			$page = explode ('<TABLE WIDTH=840 BGCOLOR="#b0c0d0" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page);
			$page = explode ('<TABLE WIDTH=840 BGCOLOR="#d0d5df" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page[1]);

			$cutoffs = array ('<TD WIDTH="15%" valign="top" align="center">', '</TR><TR>', '<TR>', '</tr>', '<TD WIDTH="15%">&nbsp;</TD>', '</TABLE>', '</FONT></B></FONT></TD>', '<BR><FONT SIZE=-1><B><FONT COLOR="#c00000">');
			$page = str_replace ($cutoffs, '', $page[0]);

			$rows = explode ('<A HREF="/cgi-bin/gallery.cgi?f=', $page);

				$pts = explode ('"><IMG BORDER=0 WIDTH=', $rows[$folder]);
				$suburl = "http://www.brickshelf.com/cgi-bin/gallery.cgi?f=".$pts[0];
				$pts = explode (' HEIGHT=', $pts[1]);
				$width = $pts[0];
				$pts = explode (' ALT="', $pts[1]);
				$height= $pts[0];
				$pts = explode ('" SRC=', $pts[1]);
				$name= $pts[0];
				$pts = explode ('></A>', $pts[1]);
				$thumb = "http://www.brickshelf.com".$pts[0];

				// adjust minimal thumb height
				if ($height < 100)
					$xheight = 100;
				else
					$xheight = $height;

				$subpage = open_page($suburl);
				$background = '#a6a6a6';

				if (substr_count($subpage, "error") < 1)
				{
					// check for subfolders
					if (substr_count($subpage, '#c00000') > 0)
					{
						$g_url = explode ("=", $suburl);
						$subfolders = "[<a href='index.php?g=".$g_url[1]."'>Scan subfolders</a>]";
						$background = '#b8b8b8';
					}

				$views = explode ('Views: ', $subpage);
				$views = explode ('</CENTER></TD>', $views[1]);
				$views = $views[0];
				@ $share = ($views / $totalviews) * 100;
				$share = substr($share, 0, 4);
				$bar = floor (5.5 * $share);

				// compare to the saved values
				if (isset($save))
				{
					$cp_views = $views - $save;

					if ($cp_views > 0)
						$cp_views = "(<span style='color: green;'>+".$cp_views."</span>) ";
					else
						$cp_views = "(<span style='color: gold;'>+".$cp_views."</span>) ";

					$cp_share = $share - $old_share;
					$cp_share = round($cp_share, 3);

					if ($cp_share > 0)
					{
						$cp_width = floor (5.5 * $cp_share);
						$cp_bar = "<div style='width: ".$cp_width."px; height: 12px; background: green; position: absolute; left: ".(175 + $bar - $cp_width)."px; top: 63px;'></div>";
						$cp_share = "(<span style='color: green; ;'>+".$cp_share."%</span>) ";
					}
					elseif ($cp_share < 0)
					{
						$cp_width = floor (5.5 * abs($cp_share));
						$cp_bar = "<div style='width: ".$cp_width."px; height: 12px; background: red; position: absolute; left: ".(175 + $bar)."px; top: 63px;'></div>";
						$cp_share = "(<span style='color: red; font-size: 10px;'>".$cp_share."%</span>) ";
					}
					else
						$cp_share = "(<span style='color: gold; font-size: 10px;'>+".$cp_share."%</span>) ";
				}

        echo "<div class='row p-2 m-2 border border-primary rounded bg-light'>
          <div class='col-3'>
            <a href='".$suburl."' target='_blank'><img src=".$thumb." width=".$width." height=".$height." alt=".$name." class='rounded'></a>
          </div>
          <div class='col align-middle'>";

				echo "<h5>".$name." ".$subfolders."</h5><br />
				Views: ".number_format($views, 0, ',', ' ');

        if (isset($cp_views)) {echo $cp_views;}

        echo " (".$share."%)<br />";

        if (isset($cp_share)) {echo $cp_share;}

				echo '<div class="progress progress-lg">
          <div class="progress-bar" role="progressbar" style="width: '.$bar.'px"></div>
        </div>';

        if (isset($cp_bar)) {echo $cp_bar;}

				echo "</div>";
				}
				else
				{
          echo "<div class='row'>
            <div class='col text-center'>
              Folder not public.
            </div>
          </div>";
				}



}

?>

<?PHP

$member = trim(strip_tags($_GET['m']));
$folder = trim(strip_tags($_GET['num']));
$totalviews = trim(strip_tags($_GET['views']));
$save = $_COOKIE["BSS".$member];

function roundPrecision($value, $precision=2 )
{ 
    $round = $precision - floor(log10(abs($value))) - 1; 
    return round($value, $round);
}

// get saved values
if ($save)
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
						$subfolders = "<span style='font-size: 10px;'>[<a href='index.php?g=".$g_url[1]."'>Scan subfolders</a>]</span>";
						$background = '#b8b8b8';
					}
				
				$views = explode ('Views: ', $subpage);
				$views = explode ('</CENTER></TD>', $views[1]);
				$views = $views[0];
				@ $share = ($views / $totalviews) * 100;
				$share = substr($share, 0, 4);
				$bar = floor (5.5 * $share);
				
				// compare to the saved values
				if ($save)
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

				echo "<div style='background: ".$background."; width: 140px; height: ".$xheight."px; text-align: center; padding: 5px 0px 5px; float: left; border-right: 1px solid white; position: relative;'><a href='".$suburl."' target='_blank'><img src=".$thumb." width=".$width." height=".$height." alt=".$name." border='0'></a></div>
				<div style='background: ".$background."; padding: 5px 20px 5px; height: ".$xheight."px;'>
				<div style='position: relative; left: 10px;'>
				<b>".$name."</b> ".$subfolders."<br /><br />
				Views: ".number_format($views, 0, ',', ' ')." ".$cp_views."<br /><br />
				".$share."%<br />".$cp_share."
				
					<div style='width: 550px; height: 12px; background: #8e8e8e; position: absolute; left: 175px; top: 63px;'></div>
					<div style='width: ".$bar."px; height: 12px; background: #767676; position: absolute; left: 175px; top: 63px;'></div>
					".$cp_bar."
				
				</div>
				</div>";
				}
				else
				{
					echo "<div style='background: ".$background."; width: 140px; height: 128px; text-align: center; padding: 5px 0px 5px; float: left; border-right: 1px solid white; position: relative;'><img src='http://www.brickshelf.com/images/folder.gif' width='128' height='128' alt='' border='0'></div>
				<div style='background: ".$background."; padding: 5px 20px 5px; height: 128px;'>
				<div style='position: relative; left: 10px;'>
				Folder not public.
				</div>
				</div>";
				}

			
			
}

?>
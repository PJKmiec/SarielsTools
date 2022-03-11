<?PHP

$member = trim(strip_tags($_GET['m']));
$folder = trim(strip_tags($_GET['num']));

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
				
				$subpage = open_page($suburl);
				
				$views = explode ('Views: ', $subpage);
				$views = explode ('</CENTER></TD>', $views[1]);
				$views = $views[0];
				
				if (!$views || $views < 1)
					$views = 0;
				
				echo $views;

			
			
}

?>
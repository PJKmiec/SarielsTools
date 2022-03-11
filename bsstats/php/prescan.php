<?PHP

$member = trim(strip_tags($_GET['m']));

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
			
			$page = open_page($url);
							
			$page = explode ('<TABLE WIDTH=840 BGCOLOR="#b0c0d0" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page);
			$page = explode ('<TABLE WIDTH=840 BGCOLOR="#d0d5df" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page[1]);
			
			$cutoffs = array ('<TD WIDTH="15%" valign="top" align="center">', '</TR><TR>', '<TR>', '</tr>', '<TD WIDTH="15%">&nbsp;</TD>', '</TABLE>', '</FONT></B></FONT></TD>', '<BR><FONT SIZE=-1><B><FONT COLOR="#c00000">');
			$page = str_replace ($cutoffs, '', $page[0]);
			
			$rows = explode ('<A HREF="/cgi-bin/gallery.cgi?f=', $page);
			$hmf = (count ($rows)) - 1;
			
			if ($hmf == 48)
			{
				$url2 = "http://www.brickshelf.com/cgi-bin/gallery.cgi?m=".$member."&n=48";
				$page = open_page($url2);
				$page = explode ('<TABLE WIDTH=840 BGCOLOR="#b0c0d0" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page);
				$page = explode ('<TABLE WIDTH=840 BGCOLOR="#d0d5df" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page[1]);
			
				$cutoffs = array ('<TD WIDTH="15%" valign="top" align="center">', '</TR><TR>', '<TR>', '</tr>', '<TD WIDTH="15%">&nbsp;</TD>', '</TABLE>', '</FONT></B></FONT></TD>', '<BR><FONT SIZE=-1><B><FONT COLOR="#c00000">');
				$page = str_replace ($cutoffs, '', $page[0]);
			
				$rows = explode ('<A HREF="/cgi-bin/gallery.cgi?f=', $page);
				$hmf2 = (count ($rows)) - 1;
				$hmf = $hmf + $hmf2;
			}
			
			echo $hmf;
}

?>
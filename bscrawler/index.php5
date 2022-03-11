<?php

$gallery = trim(strip_tags($_GET['f']));

if (!$gallery)
	echo '<form action="index.php" method="GET">Gallery ID:&nbsp;<input type="text" name="f"></form>';
else	
{
	function Render ($page)
	{		
			global $gallery;
	
			$page = explode ('<TABLE WIDTH=840 BGCOLOR="#b0c0d0" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page);
			$page = explode ('<TABLE WIDTH=840 BGCOLOR="#d0d5df" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page[1]);
			
			$cutoffs = array ('<TD WIDTH="15%" valign="top" align="center">', '</TR><TR>', '<TR>', '</tr>', '<TD WIDTH="15%">&nbsp;</TD>', '</TABLE>', '</FONT></B></FONT></TD>', '<BR><FONT SIZE=-1><B><FONT COLOR="#c00000">');
			$page = str_replace ($cutoffs, '', $page[0]);
			
			$rows = explode ('<A HREF="/cgi-bin/gallery.cgi?i=', $page);
			$hmf = count ($rows);
									
			$output = '';
			
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
				$thumb = "http://www.brickshelf.com".$pts[0];
				$big = substr($thumb, 0, -10);  
				$big = str_replace ('thumb/', '', $big);
			
				if (substr_count($name, '.txt') < 1 && substr_count($name, '.ldr') < 1)
					$output = $output."<a href='".$big."' rel='lightbox[".$gallery."]' title='".$name."'><img src='".$thumb."' width='".$width."' height='".$height."' border='0' alt='".$name."'></a> ";
			}
			return $output;
	}
	
	function GetWidth ($page)
	{					
			$page = explode ('<TABLE WIDTH=840 BGCOLOR="#b0c0d0" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page);
			$page = explode ('<TABLE WIDTH=840 BGCOLOR="#d0d5df" CELLSPACING=0 CELLPADDING=2 BORDER=0>', $page[1]);
			
			$cutoffs = array ('<TD WIDTH="15%" valign="top" align="center">', '</TR><TR>', '<TR>', '</tr>', '<TD WIDTH="15%">&nbsp;</TD>', '</TABLE>', '</FONT></B></FONT></TD>', '<BR><FONT SIZE=-1><B><FONT COLOR="#c00000">');
			$page = str_replace ($cutoffs, '', $page[0]);
			
			$rows = explode ('<A HREF="/cgi-bin/gallery.cgi?i=', $page);
			$hmf = count ($rows);
									
			$output = '';
			
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
				$thumb = "http://www.brickshelf.com".$pts[0];
				$big = substr($thumb, 0, -10);  
				$big = str_replace ('thumb/', '', $big);
			
				if (substr_count($name, '.txt') < 1 && substr_count($name, '.ldr') < 1)
					$totalwidth = $totalwidth + $width + 4;
			}
			return $totalwidth;
	}

			$url = "http://www.brickshelf.com/cgi-bin/gallery.cgi?f=".$gallery;
			
			// Launch the crawler
			include ("crawler.php");
			$crawler = new Secure_Crawler();
			$crawler->login('Sariel', 'samsung');
			$page = $crawler->get($url);
			$result = Render($page);
			$totalwidth = GetWidth($page);
			
			if (substr_count($page, '<B>Next</B>') > 0)
			{
				$offset = 47;
				if (substr_count($page, '&n=48') > 0)
					$offset = 48;
				
				$page = $crawler->get($url.'&n='.$offset);
				$result = $result.Render($page);
				$totalwidth = $totalwidth + GetWidth($page);
			}

			if (substr_count($page, '<B>Next</B>') > 0)
			{
				$offset = 94;
				if (substr_count($page, '&n=96') > 0)
					$offset = 96;
				
				$page = $crawler->get($url.'&n='.$offset);
				$result = $result.Render($page);
				$totalwidth = $totalwidth + GetWidth($page);
			}
			
			if (substr_count($page, '<B>Next</B>') > 0)
			{
				$offset = 141;
				if (substr_count($page, '&n=144') > 0)
					$offset = 144;
				
				$page = $crawler->get($url.'&n='.$offset);
				$result = $result.Render($page);
				$totalwidth = $totalwidth + GetWidth($page);
			}

			if (substr_count($page, '<B>Next</B>') > 0)
			{
				$offset = 188;
				if (substr_count($page, '&n=192') > 0)
					$offset = 192;
				
				$page = $crawler->get($url.'&n='.$offset);
				$result = $result.Render($page);
				$totalwidth = $totalwidth + GetWidth($page);
			}
			
			$generated_content = "<div style='width: 100%; overflow-x:scroll;overflow-y:hidden;overflow:-moz-scrollbars-horizontal !important; white-space: no-wrap; height: 150px; margin-bottom: 10px;'><div style='height: 150px; width: ".$totalwidth."px;'>".$result."</div></div>";
			
			echo $generated_content."<br /><br />
			
			<textarea name='content' style='width: 800px; height: 200px; background: white; border: 1px solid silver; display: block; margin: 0 auto;' onFocus='this.select();'>".$generated_content."</textarea>";
			
			
			}














?>
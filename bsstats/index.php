<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
    <title>Brickshelf Stats</title>
    <link rel='Stylesheet' href='style.css' type='text/css'>
		<script language="JavaScript" type="text/JavaScript">

			// predefined variables
			var totalViews=0;
			var j=0;
			var l=0;
						
			// predefined functions
			function formHide()
			{
				document.getElementById('sub').style.visibility="hidden";
				document.getElementById('cover').style.visibility="visible";
			}
			
			function formUnhide()
			{
				document.getElementById('sub').style.visibility="visible";
				document.getElementById('cover').style.visibility="hidden";
			}

			function numberFormat(nStr)
			{
				nStr += '';
				x = nStr.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				
				while (rgx.test(x1))
					x1 = x1.replace(rgx, '$1' + ' ' + '$2');
				
				return x1 + x2;
			}
			
			function readCookie(name) 
			{
				var nameEQ = name + "=";
				var ca = document.cookie.split(';');
				for(var i=0;i < ca.length;i++) 
				{
					var c = ca[i];
					while (c.charAt(0)==' ') c = c.substring(1,c.length);
						if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
				}
				return null;
			}
			
function requestHttp3(url,posTag,loadingText){
var httpRequest;

if(window.XMLHttpRequest){// Mozilla, Safari, ...
httpRequest = new XMLHttpRequest();
if(httpRequest.overrideMimeType){
httpRequest.overrideMimeType('text/xml');
}
}else if(window.ActiveXObject){ // IE
try{
httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
}catch (e){
try{
httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
}catch (e){}
}
}
getFile3(httpRequest,url,posTag,loadingText);
}

function getFile3(httpRequest,url,posTag,loadingText){
if(!httpRequest){
alert('Error - Cannot create an XMLHTTP instance');
return false;
}
httpRequest.onreadystatechange = function(){ 
showContents3(httpRequest,posTag,loadingText);
}
httpRequest.open('GET', url, true);
httpRequest.send(''); 
}

function showContents3(httpRequest,posTag,loadingText)
{
	if(httpRequest.readyState == 4)
	{
		if(httpRequest.status == 200)
		{
			var msg=httpRequest.responseText;
			document.getElementById(posTag).innerHTML = msg;
		}
		else
		{
		alert('Error');
		}
	}
	else if (httpRequest.readyState == (1 || 0)) 
	{
		document.getElementById(posTag).innerHTML = "<img src='img/loading.gif' width='16' height='16' alt='' border='' style='vertical-align: middle;'> " + loadingText;
	}
}
			
			
			
			
			
			
function requestHttp2(url,posTag,k,limiter){
var httpRequest;

if(window.XMLHttpRequest){// Mozilla, Safari, ...
httpRequest = new XMLHttpRequest();
if(httpRequest.overrideMimeType){
httpRequest.overrideMimeType('text/xml');
}
}else if(window.ActiveXObject){ // IE
try{
httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
}catch (e){
try{
httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
}catch (e){}
}
}
getFile2(httpRequest,url,posTag,k,limiter);
}

function getFile2(httpRequest,url,posTag,k,limiter){
if(!httpRequest){
alert('Error - Cannot create an XMLHTTP instance');
return false;
}
httpRequest.onreadystatechange = function(){ 
showContents2(httpRequest,posTag,k,limiter);
}
httpRequest.open('GET', url, true);
httpRequest.send(''); 
}

function showContents2(httpRequest,posTag,k,limiter){
if(httpRequest.readyState == 4)
{
	if(httpRequest.status == 200)
	{
		var msg=httpRequest.responseText;
		document.all(posTag).innerHTML=msg;
		l=l+1;
		
		if(l==parseInt(limiter)) // rendering done
		{
			l=0;
			myarray.pop();
			//requestHttp3('php/log.php?m=' +  document.getElementById('m').value + '&a=' + escape(myarray) + '&tv=' + totalViews + '&f=' + limiter,'footer','Finishing...');
			formUnhide();
		}
	
	}
	else
	{
alert('Error');
}
}
else if (httpRequest.readyState == (2 || 1 || 0)) 
				{
					document.getElementById(posTag).innerHTML = "<img src='img/loading.gif' width='16' height='16' alt='' border='' style='vertical-align: middle;'> Rendering folder " + k + "..."; 	
				}
}


			// calls count.php to count total views
			function requestHttp1(url,i,limiter)
			{
				var httpRequest;

				if(window.XMLHttpRequest)
				{// Mozilla, Safari, ...
					httpRequest = new XMLHttpRequest();
					
					if(httpRequest.overrideMimeType)
					{
						httpRequest.overrideMimeType('text/xml');
					}
				}
				else if(window.ActiveXObject)
				{ // IE
					try{
						httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
					}catch (e){
					try{
						httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
					}catch (e){}
					}
				}

				if(!httpRequest)
				{
					alert('Error - Cannot create an XMLHTTP instance');
					return false;
				}
				
				httpRequest.open("GET", url, true);
				httpRequest.send(''); 


				httpRequest.onreadystatechange = function()
				{ 
				if(httpRequest.readyState == 4)
				{
					if(httpRequest.status == 200)
					{
							totalViews=totalViews+parseInt(httpRequest.responseText);
							j=j+1;
							document.getElementById('headline1').innerHTML = "  Processing folder " + j + "/" + limiter + ", <b>" + numberFormat(totalViews) + "</b> total views.";
							
							if (limiter == 1)
							{
								myarray = [[0,0],[i,parseInt(httpRequest.responseText)]];
								
								function value(a,b) {
									a = a[1];
									b = b[1];
								return b - a;
								}

								myarray.sort(value);
								
								j=0;
								var average=parseInt(totalViews)/parseInt(limiter); 
								document.getElementById('loader').style.display = "none";
								document.getElementById('headline1').innerHTML = "<b>" + numberFormat(totalViews) + "</b> total views, average: " + numberFormat(parseInt(average)) + " views per folder.";
								
								for (k=1;k<=parseInt(limiter);k++) 
								{
									requestHttp2('php/scan.php?m=' + document.getElementById('m').value + '&num=' + myarray[(k-1)][0] + '&views=' + totalViews,'msg' + k,k,limiter);
								}
							}
							else if (j==1)
							{
								myarray = [[0,0],[i,parseInt(httpRequest.responseText)]];
							}
							else if (j==limiter)
							{
								myarray[j]=[i,parseInt(httpRequest.responseText)];
								
								function value(a,b) {
									a = a[1];
									b = b[1];
								return b - a;
								}

								myarray.sort(value);
								
								j=0;
								var average=parseInt(totalViews)/parseInt(limiter); 
								
								// compare to saved total views
								if (typeof storedTotalViews != "undefined" && storedTotalViews > 0)
								{
									var cTotalViews = parseInt(totalViews) - parseInt(storedTotalViews);
									cTotalViews = " <span style='color: #9b9b9b;'>(+" + numberFormat(cTotalViews) + ")</span>";
								}
								else
									var cTotalViews = "";
								
								// compare to saved average views
								if (typeof storedAverage != "undefined" && storedAverage > 0)
								{
									var cAverage = parseInt(average) - parseInt(storedAverage);
									if(parseInt(cAverage) < 0)
										cAverage = " <span style='color: #9b9b9b;'>(-" + numberFormat(cAverage) + ")</span>";
									else
										cAverage = " <span style='color: #9b9b9b;'>(+" + numberFormat(cAverage) + ")</span>";
								}
								else
									var cAverage = "";
								
								document.getElementById('loader').style.display = "none";
								document.getElementById('headline1').innerHTML = "<b>" + numberFormat(totalViews) + "</b> total views" + cTotalViews + ", average: " + numberFormat(parseInt(average)) + " views per folder" + cAverage + ".";
								
								for (k=1;k<=parseInt(limiter);k++) 
								{
									requestHttp2('php/scan.php?m=' + document.getElementById('m').value + '&num=' + myarray[(k-1)][0] + '&views=' + totalViews,'msg' + k,k,limiter);
								}
							}
							else
							{
								myarray[j]=[i,parseInt(httpRequest.responseText)];
							}
							
					}
				}
				else if (httpRequest.readyState == (2 || 1 || 0)) 
				{
					document.getElementById('headline1').innerHTML = " Preparing to count views..."; 	
				}
				}
			}


			
			
			
			

			// calls prescan.php to count folders
			function requestHttp(url,posTag,loadingText,oPrefix,oSuffix)
			{
				
				var URL = unescape(window.document.location);
				
				// convert gallery name to lower case
				document.getElementById('m').value=document.getElementById('m').value.toLowerCase();
				
				if(document.getElementById('m').value.length < 1 && URL.indexOf("?") < -1)
				{
					document.all(posTag).innerHTML = "Please enter your username first.";
					return false;				
				}
				
				formHide();
				
				var httpRequest;

				if(window.XMLHttpRequest)
				{// Mozilla, Safari, ...
					httpRequest = new XMLHttpRequest();
					
					if(httpRequest.overrideMimeType)
					{
						httpRequest.overrideMimeType('text/xml');
					}
				}
				
				else if(window.ActiveXObject)
				{ // IE
					try{
						httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
					}catch (e){
					try{
						httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
					}catch (e){}
					}
				}
				
				getFile(httpRequest,url,posTag,loadingText,oPrefix,oSuffix);
			}

			function getFile(httpRequest,url,posTag,loadingText,oPrefix,oSuffix)
			{
				if(!httpRequest)
				{
					alert('Error - Cannot create an XMLHTTP instance');
					return false;
				}

				httpRequest.onreadystatechange = function()
				{ 
					showContents(httpRequest,posTag,loadingText,oPrefix,oSuffix);//function display contents 
				}

				httpRequest.open("GET", url, true);
				httpRequest.send(''); 

			}

			function showContents(httpRequest,posTag,loadingText,oPrefix,oSuffix)
			{
				if(httpRequest.readyState == 4)
				{
					if(httpRequest.status == 200)
					{
						var msg=httpRequest.responseText;

						if(parseInt(msg) < 1)
						{
							document.all(posTag).innerHTML= "No such user found at Brickshelf.";
							document.getElementById('sub').style.visibility="visible";
							document.getElementById('cover').style.visibility="hidden";
						}
						else
						{
							// run cookie check
							var cookieContent = unescape(readCookie("BSS" + document.getElementById('m').value));
							var folderEvaluation = " ";
							
							if (cookieContent != null)
							{
								cookieContent = cookieContent.split("^");
								
								// check for old type cookie condition
								if (cookieContent[1])
								{
									cookieContent = cookieContent[1].split(":");		
								
									// declare global variables from the cookie
									storedFoldersNumber = cookieContent[1];
									storedTotalViews = cookieContent[0];
									storedAverage = parseInt(storedTotalViews)/parseInt(storedFoldersNumber);
								
									if (storedFoldersNumber != msg)
									{
										folderEvaluation = "<br /><b style='color: red;'>NOTE:</b> the number of folders found is different than in your save. The save is invalid, please overwrite it with a new one.";
									}
								}
							}
							
							document.all(posTag).innerHTML= oPrefix + msg + oSuffix + folderEvaluation;
							document.getElementById('loader').innerHTML = "<img src='img/loading.gif' width='16' height='16' alt='' border='' style='vertical-align: middle;'>";
							
							// pętla
							for (i=1;i<=parseInt(msg);i++) 
							{
								requestHttp1('php/count.php?m=' + document.getElementById('m').value + '&num=' + i,i,msg);
							}
						}
					}

					else
					{
						alert('Error');
					}
				}
				
				else if (httpRequest.readyState == (2 || 1 || 0)) 
				{
					document.getElementById(posTag).innerHTML = "<img src='img/loading.gif' width='16' height='16' alt='' border='' style='vertical-align: middle;'> " + loadingText; 	
				}
			}

			function clearAll()
			{
				for (i=1;i<=96;i++) 
				{
					document.all('msg' + i).innerHTML= "";
				}
				
				document.all('footer').innerHTML= "";
				document.all('headline1').innerHTML= "";
				totalViews=0;
			}

		</script>
	</head>
	
	<?PHP
	// scan subfolders
	$subfolder = trim(strip_tags($_GET['g']));

	if ($subfolder)
		echo '<body onLoad="requestHttp(\'php/prescan.php?m='.$subfolder.'\', \'headline\', \'Scanning gallery...\', \'Scan complete, \', \' folders found.\');document.getElementById(\'m\').value=\''.$subfolder.'\'">';
	else
		echo '<body>';
	
	?>
	
	<div style="width: 600px; margin: 0 auto; position: relative;">

		<form name="stats" action="" style="margin: 0px;" onSubmit="requestHttp('php/prescan.php?m=' + document.getElementById('m').value, 'headline', 'Scanning gallery...', 'Scan complete, ', ' folders found.'); return false;">	
			Your Brickshelf username (not case sensitive): <input type="text" id="m" name="m" maxlegth="32" style="width: 150px;" onBlur="this.value=this.value.toLowerCase();">
			<input type="submit" style="color: #767676;" name="sub" id="sub" value="   show stats &raquo;   " onClick="clearAll();">
			<span style="visibility: hidden; position: absolute; top: 1px; left: 453px;" name="cover" id="cover">Please wait...</span>
		</form>
		
		<div style="position: relative; top: 10px; font: normal 10px/0.3cm verdana; color: #a4a4a4;">
			The stats are now powered by AJAX and can render up to 96 folders maximum.</br />
			Please note that the speed of rendering is strictly dependent on the Brickshelf's server response time.<br />
			Works best with <a href="http://www.opera.com/"><img src="img/opera.gif" border="0" alt="Opera Browser" width="94" height="15" style="vertical-align: middle;"></a> and <a href="http://www.mozilla-europe.org/pl/firefox/"><img src="img/ffox.gif" border="0" alt="Firefox Browser" width="80" height="15" style="vertical-align: middle;"></a><br /><br />
		</div>
		
	</div>

	<div id="container" style="width: 780px; margin: 0 auto; margin-top: 10px;">

		<div id="headline"></div>
		<div id="loader" style="float: left; width: 16px; height: 16px; padding-right: 4px;"></div><div id="headline1"></div>
		<div id="msg1" style="margin-top: 10px; width: 780px; clear: both;"></div>
		<div id="msg2" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg3" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg4" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg5" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg6" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg7" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg8" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg9" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg10" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg11" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg12" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg13" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg14" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg15" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg16" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg17" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg18" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg19" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg20" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg21" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg22" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg23" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg24" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg25" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg26" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg27" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg28" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg29" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg30" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg31" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg32" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg33" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg34" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg35" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg36" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg37" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg38" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg39" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg40" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg41" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg42" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg43" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg44" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg45" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg46" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg47" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg48" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg49" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg50" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg51" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg52" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg53" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg54" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg55" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg56" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg57" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg58" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg59" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg60" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg61" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg62" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg63" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg64" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg65" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg66" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg67" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg68" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg69" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg70" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg71" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg72" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg73" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg74" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg75" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg76" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg77" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg78" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg79" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg80" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg81" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg82" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg83" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg84" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg85" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg86" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg87" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg88" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg89" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg90" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg91" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg92" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg93" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg94" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg95" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="msg96" style="margin-top: 1px; width: 780px; clear: both;"></div>
		<div id="footer" style="margin-top: 10px;"></div>
	
	</div>
</body>
</html>
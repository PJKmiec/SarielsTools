<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="Author" content="Sariel">
  <link rel="shortcut icon" href="favicon.ico"/>
	<title>Bricksafe Thumbnail Helper</title>
  <link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="http://tools.sariel.pl/64/style.css" media="screen">
	
	<script type="text/javascript">
		function requestHttp(url,posTag,loadingText){
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
getFile(httpRequest,url,posTag,loadingText);
}

function getFile(httpRequest,url,posTag,loadingText){
if(!httpRequest){
alert('Error - Cannot create an XMLHTTP instance');
return false;
}
httpRequest.onreadystatechange = function(){ 
showContents(httpRequest,posTag,loadingText);
}
httpRequest.open('GET', url, true);
httpRequest.send(''); 
}

function showContents(httpRequest,posTag,loadingText)
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
		document.getElementById(posTag).innerHTML = "<div class='content'><img src='loading.gif' style='width: 16px; height: 16px; vertical-align: middle;' alt='' border=''> " + loadingText + "</div>";
	}
}

function add_pic(big, thumb){
document.getElementById('finalcode').value = document.getElementById('finalcode').value + '[URL=' + big + '][img]' + thumb + '[/img][/URL] ';
}

function rem_pic(big, thumb){
var to_remove = '[URL=' + big + '][img]' + thumb + '[/img][/URL] ';
document.getElementById('finalcode').value = document.getElementById('finalcode').value.replace(to_remove, '');
}
	</script>
</head>
<body>

<?php include '../toolbar.php';?>
	
	<div id="main">
		<div id="header">
			Bricksafe Thumbnail Helper
		</div>
		
		<div class="header">
			Your page's URL address:
		</div>
		
		<div class="content">
			<form name="g_num_form" action="" style="margin: 0px;" onSubmit="requestHttp('generator.php5?g=' + escape(document.getElementById('g_num').value) + '&t='  + escape(document.getElementById('thumbnailsize').value) + '&i=' + escape(document.getElementById('imagesize').value), 'output', 'Scanning the gallery...'); return false;">	
			<input type="hidden" id="image_1" value="1" />
			<input type="hidden" id="image_2" value="1" />
			<input type="hidden" id="image_3" value="1" />
			<input type="hidden" id="image_4" value="1" />
			<input type="hidden" id="image_5" value="1" />
			<input type="hidden" id="image_6" value="1" />
			<input type="hidden" id="image_7" value="1" />
			<input type="hidden" id="image_8" value="1" />
			<input type="hidden" id="image_9" value="1" />
			<input type="hidden" id="image_10" value="1" />
			<input type="hidden" id="image_11" value="1" />
			<input type="hidden" id="image_12" value="1" />
			<input type="hidden" id="image_13" value="1" />
			<input type="hidden" id="image_14" value="1" />
			<input type="hidden" id="image_15" value="1" />
			<input type="hidden" id="image_16" value="1" />
			<input type="hidden" id="image_17" value="1" />
			<input type="hidden" id="image_18" value="1" />
			<input type="hidden" id="image_19" value="1" />
			<input type="hidden" id="image_20" value="1" />
			<input type="hidden" id="image_21" value="1" />
			<input type="hidden" id="image_22" value="1" />
			<input type="hidden" id="image_23" value="1" />
			<input type="hidden" id="image_24" value="1" />
			<input type="hidden" id="image_25" value="1" />
			<input type="hidden" id="image_26" value="1" />
			<input type="hidden" id="image_27" value="1" />
			<input type="hidden" id="image_28" value="1" />
			<input type="hidden" id="image_29" value="1" />
			<input type="hidden" id="image_30" value="1" />
			<input type="hidden" id="image_31" value="1" />
			<input type="hidden" id="image_32" value="1" />
			<input type="hidden" id="image_33" value="1" />
			<input type="hidden" id="image_34" value="1" />
			<input type="hidden" id="image_35" value="1" />
			<input type="hidden" id="image_36" value="1" />
			<input type="hidden" id="image_37" value="1" />
			<input type="hidden" id="image_38" value="1" />
			<input type="hidden" id="image_39" value="1" />
			<input type="hidden" id="image_40" value="1" />
			<input type="hidden" id="image_41" value="1" />
			<input type="hidden" id="image_42" value="1" />
			<input type="hidden" id="image_43" value="1" />
			<input type="hidden" id="image_44" value="1" />
			<input type="hidden" id="image_45" value="1" />
			<input type="hidden" id="image_46" value="1" />
			<input type="hidden" id="image_47" value="1" />
			<input type="hidden" id="image_48" value="1" />
			<input type="hidden" id="image_49" value="1" />
			<input type="hidden" id="image_50" value="1" />
			<input type="hidden" id="image_51" value="1" />
			<input type="hidden" id="image_52" value="1" />
			<input type="hidden" id="image_53" value="1" />
			<input type="hidden" id="image_54" value="1" />
			<input type="hidden" id="image_55" value="1" />
			<input type="hidden" id="image_56" value="1" />
			<input type="hidden" id="image_57" value="1" />
			<input type="hidden" id="image_58" value="1" />
			<input type="hidden" id="image_59" value="1" />
			<input type="hidden" id="image_60" value="1" />
			<input type="hidden" id="image_61" value="1" />
			<input type="hidden" id="image_62" value="1" />
			<input type="hidden" id="image_63" value="1" />
			<input type="hidden" id="image_64" value="1" />
			<input type="hidden" id="image_65" value="1" />
			<input type="hidden" id="image_66" value="1" />
			<input type="hidden" id="image_67" value="1" />
			<input type="hidden" id="image_68" value="1" />
			<input type="hidden" id="image_69" value="1" />
			<input type="hidden" id="image_70" value="1" />
			<input type="hidden" id="image_71" value="1" />
			<input type="hidden" id="image_72" value="1" />
			<input type="hidden" id="image_73" value="1" />
			<input type="hidden" id="image_74" value="1" />
			<input type="hidden" id="image_75" value="1" />
			<input type="hidden" id="image_76" value="1" />
			<input type="hidden" id="image_77" value="1" />
			<input type="hidden" id="image_78" value="1" />
			<input type="hidden" id="image_79" value="1" />
			<input type="hidden" id="image_80" value="1" />
			<input type="hidden" id="image_81" value="1" />
			<input type="hidden" id="image_82" value="1" />
			<input type="hidden" id="image_83" value="1" />
			<input type="hidden" id="image_84" value="1" />
			<input type="hidden" id="image_85" value="1" />
			<input type="hidden" id="image_86" value="1" />
			<input type="hidden" id="image_87" value="1" />
			<input type="hidden" id="image_88" value="1" />
			<input type="hidden" id="image_89" value="1" />
			<input type="hidden" id="image_90" value="1" />
			<input type="hidden" id="image_91" value="1" />
			<input type="hidden" id="image_92" value="1" />
			<input type="hidden" id="image_93" value="1" />
			<input type="hidden" id="image_94" value="1" />
			<input type="hidden" id="image_95" value="1" />
			<input type="hidden" id="image_96" value="1" />
			<input type="hidden" id="image_97" value="1" />
			<input type="hidden" id="image_98" value="1" />
			<input type="hidden" id="image_99" value="1" />
			<input type="hidden" id="image_100" value="1" />

			<strong>Options:</strong> 
			thumbnail size:
			<select id="thumbnailsize">
				<option value="128" selected>128 x 72px</option>
				<option value="320">320 x 180px</option>
				<option value="640">640 x 360px</option>
			</select>
			&nbsp;&nbsp;
			enlarged image size:
			<select id="imagesize">
				<option value="full" selected>original full size</option>
				<option value="1920">1920 x 1080px</option>
				<option value="1280">1280 x 720px</option>
				<option value="800">800 x 450px</option>
			</select><br /><br />
			Paste your page's complete URL address (e.g. <i>http://bricksafe.com/pages/sariel/tatra-dakar-truck</i>):
			<br />
			<input id="g_num" type="text" style="width: 500px;" /> 
			<input type="submit" class="submit" value=" Process &raquo; " /> 
			<input type='button' class='submit' value='Clear' onClick='document.getElementById("g_num").value="";'>
			</form>
		</div>
		
		<div id="output"></div>

		<div id="footer">
			<a href="http://validator.w3.org/" target="_blank"><img src="valid-html401-blue.png" alt="" /></a>
			<a href="http://jigsaw.w3.org/css-validator/" target="_blank"><img src="valid-css-blue.png" alt="" /></a>
		</div>
		
	</div>

</body>
</html>
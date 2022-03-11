$(document).ready(function() {
  let urlParams = new URLSearchParams(window.location.search);

  if (urlParams.has('g')) {
    let param = urlParams.get('g');
    $('#m').val(param);
    doAnalytics();
  }


  $('#mainForm').submit(function(e) {
    doAnalytics();
  	e.preventDefault();
  	return false;
    });

    function doAnalytics() {
      $('#headline').html("<img src='img/loading.gif' width='16' height='16' alt='' border='' style='vertical-align: middle;'> Scanning...");
      clearAll();
      requestHttp('php/prescan.php?m=' + $('#m').val(), 'headline', 'Scanning gallery...', 'Scan complete, ', ' folders found.');
      $('#sub').val('Please wait...').prop('disabled', true);
    }

// predefined variables
var totalViews=0;
var j=0;
var l=0;

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

        // p�tla
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

});

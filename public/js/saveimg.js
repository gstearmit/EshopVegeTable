var domain  = localStorage.getItem("doaminname"); 
var v=document.getElementById("video1");
var width;
var height;
var c=document.getElementById("myCanvas");
v.addEventListener( "loadedmetadata", function (e) {
    width = this.videoWidth,
    height = this.videoHeight;
	var wid=document.createAttribute("width");
wid.value=width;
c.setAttributeNode(wid);
	var hei=document.createAttribute("height");
hei.value=height;
c.setAttributeNode(hei);
		//document.write(height)
		
}, false );

ctx=c.getContext('2d');
var dataURLtn;
var dataURL;
var width;
var height;

v.addEventListener( "loadedmetadata", function (e) {
    width = this.videoWidth,
        height = this.videoHeight;
		//document.write(height)
}, false );
function Drawvid(ctx){
ctx.drawImage(v,5,5,width,height);
dataURL = c.toDataURL();
//loadXMLDoc(dataURL);
}

var ii;
v.addEventListener( "loadedmetadata", function (e) {
    var width = this.videoWidth,
        height = this.videoHeight;
		//document.write(height)
}, false );
v.addEventListener('play', function() {ii=window.setInterval(function() {
Drawvid(ctx);
//Drawthumnail(ctx);

},100);},false);

//v.addEventListener('play', function() {ctx.drawImage(v,5,5,260,125);
//var dataURL = c.toDataURL();}
v.addEventListener('pause',function() {window.clearInterval(ii);},false);
v.addEventListener('ended',function() {clearInterval(ii);},false);  

function loadXMLDoc(title)
{
    //var abcc=title;
document.getElementById('canvasImg').src = dataURL;

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST",domain+"/main/uploadimg",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("dataURL="+dataURL+"&title="+title);
}

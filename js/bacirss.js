var xmlHttp

function showRSS(str){ 
 xmlHttp=GetXmlHttpObject()
 if (xmlHttp==null){
  alert ("Browser does not support HTTP Request")
  return
 }
 var url="bacirss.php"
 url=url+"?feed="+str
 url=url+"&sid="+Math.random()
 xmlHttp.onreadystatechange=stateChanged 
 xmlHttp.open("GET",url,true)
 xmlHttp.send(null)
 }

function stateChanged(){ 
 if (xmlHttp.readyState==4)
  { 
  document.getElementById("rssOutput")
  .innerHTML=xmlHttp.responseText 
  } 
 }

function GetXmlHttpObject(){
var xmlHttp=null;
try {
 xmlHttp=new XMLHttpRequest();
 } catch (e) {
 try {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}

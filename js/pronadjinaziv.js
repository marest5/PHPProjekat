var xmlHttp;
function PrikaziProizvod(naziv){ 
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null){
 alert ("Browser ne podrzava HTTP zahtev")
 return
 }
 
if (naziv.length==0){ 
    alert ("Niste izabrali odredjeni proizvod!!!")
    return
}

var url="pronadjiponazivu.php";
url=url+"?naziv="+naziv;
url=url+"&sid="+Math.random();
xmlHttp.onreadystatechange=stateChanged; 
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function izbaci(element){
    document.getElementById('txt').value = element.innerHTML;
	document.getElementById("livesearch").style.display = "none";
    }

function homerpuf(id) {
    var e = document.getElementById(id);
    if(e.style.display == 'none')
    e.style.display = 'block';
    else
    e.style.display = 'none';
}

function sugerisi(naziv){ 
    if (naziv.length==0){ 
     document.getElementById("livesearch").innerHTML="";
     document.getElementById("livesearch").style.border="0px";
     return
     }
    
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
     alert ("Browser ne podrzava HTTP Zahtev");
     return;
     }
     
    var url="sugesticija.php";
    url=url+"?unos="+naziv;
    url=url+"&sid="+Math.random();
    xmlHttp.onreadystatechange=stateChanged; 
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
    }

function stateChanged(){ 

if (xmlHttp.readyState==4){ 
 document.getElementById("livesearch").innerHTML=xmlHttp.responseText;
 document.getElementById("livesearch").style.display="block";
 document.getElementById("livesearch").style.border="2px solid";
 } 
}

function GetXmlHttpObject(){
var xmlHttp=null;
try {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 } catch (e) {
 //Internet Explorer
 try {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
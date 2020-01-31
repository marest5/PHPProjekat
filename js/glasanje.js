function getVote(int) {
    if (window.XMLHttpRequest) {
     
      xmlhttp=new XMLHttpRequest();
    } else {  
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("anketica").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","anketica.php?glas="+int,true);
    xmlhttp.send();
  }
  
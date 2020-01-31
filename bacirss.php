<?php
if (!isset ($_GET["feed"])){
echo "Parametar Feed nije prosleđen!";
} else {
$feed=$_GET["feed"];

switch ($feed){
case "B92":
$xml=("http://www.b92.net/info/rss/sport.xml");
break;
case "RTS":
$xml=("http://www.rts.rs/page/sport/sr/rss.html");
break;
default:
echo "Nepostojeći feed!";
die();
}

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=2; $i++){
 $item_title=$x->item($i)->getElementsByTagName('title')
 ->item(0)->childNodes->item(0)->nodeValue;
 $item_link=$x->item($i)->getElementsByTagName('link')
 ->item(0)->childNodes->item(0)->nodeValue;
 $item_desc=$x->item($i)->getElementsByTagName('description')
 ->item(0)->childNodes->item(0)->nodeValue;

 echo ("<p><a href='" . $item_link
 . "'>" . $item_title . "</a>");
 echo ("<br />");
 echo ($item_desc . "</p>");
}
}
?>

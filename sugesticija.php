<?php
if (!isset ($_GET["unos"])){
echo "Dati parametar Unos nije prosleđen!";
} else {
$pomocna=$_GET["unos"];
include "konekcija.php";
$sql="SELECT idproizvod,naziv FROM proizvod WHERE naziv LIKE '$pomocna%'ORDER BY naziv";
$rezultat = $mysqli->query($sql);
if ($rezultat->num_rows==0){
echo "Ne postoji proizvod koji počinje na " . $pomocna;
} else {
while($red = $rezultat->fetch_object()){
?>
<a href="#" onclick="izbaci(this)"><?php  echo $red->naziv;?></a>
<br/>
<?php
}
}
$mysqli->close();
}
?>
<?php
if (!isset ($_GET["naziv"])){
echo "Parametar Naziv nije prosleđen!";
} else {
$pomocna=$_GET["naziv"];
include "konekcija.php";

$sql="SELECT p.kategorija,p.cena,p.naziv,k.email,k.username FROM proizvod p INNER JOIN korisnik k ON p.idkorisnik=k.idkorisnik WHERE naziv='".$pomocna."'";
$rezultat = $mysqli->query($sql);
$red = $rezultat->fetch_array(MYSQLI_NUM);

echo "<table border='3px' font-size='small' width='765px' height='150px' text-align='center'>
<tr>
<th><b>Kategorija proizvoda</b></th>
<th><b>Naziv</b></th>
<th><b>Cena (u evrima)</b> </th>
<th><b>Kontakt email</b> </th>
<th><b>Oglasivac</b> </th>
</tr>";

 echo "<tr>";
 echo "<td>" . $red[0] . "</td>";
 echo "<td>" . $red[2] . "</td>";
 echo "<td>" . $red[1] . "</td>";
  echo "<td>" . $red[3] . "</td>";
   echo "<td>" . $red[4] . "</td>";
 echo "</tr>";

}
$mysqli->close();
?>
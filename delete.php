<?php 
if(isset($_GET['submitdelete'])) {
if(isset($_GET['nazivdelete']) && isset($_GET['korisnikdelete'])){
$naziv=$_GET['nazivdelete'];
$korisnik=$_GET['korisnikdelete'];

include "konekcija.php";
$sqll="SELECT * from proizvod p INNER JOIN korisnik k ON p.idkorisnik=k.idkorisnik where username='$korisnik' and naziv='$naziv'";
$rezultatt=$mysqli->query($sqll);
if(empty($naziv) || empty($korisnik)){
    echo "<script>
alert('Morate uneti sve parametre!');
window.location.href='updatedelete.php';
</script>";
} else {
    $sqlll="SELECT * from proizvod where naziv='$naziv'";
    $rezultattt=$mysqli->query($sqlll);
    if($rezultattt->num_rows==0) {
     echo "<script>
    alert('Proiyvod ne postoji');
    window.location.href='updatedelete.php';
    </script>";
    } elseif($rezultatt->num_rows==0){
        echo "<script>
    alert('Datom pivu ne odgovara dati korisnik!');
    window.location.href='updatedelete.php';
    </script>";

    } else {


$red=$rezultatt->fetch_object();
$br=$red->idkorisnik;
$sql="DELETE FROM proizvod WHERE  idkorisnik='".$br."' AND naziv='".$naziv."'";

if($rezultat = $mysqli->query($sql)){
	 header("refresh:1;url='pocetna.php'");
      echo "Uspešno ste obrisali proizvod!";
	     
 } else {

echo "<script>
alert('Došlo je do greške prilikom izvršenja ovog upita!!!');
window.location.href='updatedelete.php';
</script>";
}
}
}
}
$mysqli->close();
}
 ?>
<?php 
session_start();
if (isset($_GET['submitupdate'])) {
	if(isset($_GET['stilupdate']) && isset($_GET['nazivupdate'])  && isset($_GET['cenaupdate'])) {

		$naziv=$_GET['nazivupdate'];
		$kategorija=$_GET['stilupdate'];
		$cena=$_GET['cenaupdate'];
		$idkorisnik=$_SESSION["ide"];
		include "konekcija.php";
		if(empty($naziv) || empty($kategorija) || empty($cena)){
			echo "<script>
		alert('Morate uneti sve parametre!');
		window.location.href='updatedelete.php';
		</script>";
		} else {
		$sql="UPDATE proizvod SET kategorija='$kategorija',cena='$cena', naziv='$naziv' where idkorisnik='$idkorisnik'";
		$rezul=$mysqli->query($sql);
		if(!$rezul) {
			echo "<script>
         alert('Došlo je do greške prilikom izmene objave!');
         window.location.href='updatedelete.php';
         </script>";

		} else {

			 header("refresh:1;url='pocetna.php'");
             echo "Uspesno ste izmenili Vaš oglas!";
		}
	}
}
$mysqli->close();
}
 ?>
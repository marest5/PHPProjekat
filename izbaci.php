<?php
if(isset($_POST['submit'])) {
if(isset($_POST['kategorija']) && isset($_POST['naziv']) && isset($_POST['cena']) && isset($_POST['korisnik'])){
$kategorija=$_POST['kategorija'];
$naziv=$_POST['naziv'];
$cena=$_POST['cena'];
$korisnik=$_POST['korisnik'];

include "konekcija.php";
$sql="SELECT * FROM proizvod WHERE kategorija='$kategorija' AND naziv='$naziv'";
$sqll="SELECT * FROM korisnik WHERE username='$korisnik'";
$rezultat = $mysqli->query($sql);
$rezultatt = $mysqli->query($sqll);
$red=$rezultatt->fetch_object();
$id=$red->idkorisnik;
if(empty($kategorija) || empty($naziv) || empty($cena) || empty($korisnik)){
    echo "<script>
alert('Morate uneti sve parametre!');
window.location.href='izbaciproizvod.php';
</script>";
} elseif
($rezultat->num_rows==1){
    echo "<script>
alert('Takvav proizvod vec postoji!');
window.location.href='izbaciproizvod.php';
</script>";
} else{
     $sql2="INSERT INTO proizvod(kategorija,cena,naziv,idkorisnik) values ('".$kategorija."', '".$cena."', '".$naziv."','".$id."')";
    if ( $mysqli->query($sql2)){        
            header("refresh:1;url='pocetna.php'");
            echo "Proizvod je uspesno postavljen!!!";        
     } else {
            header("refresh:1;url='izbaciproizvod.php'");
            echo "Proizvod nije postavljen!!!";
        }     
$mysqli->close();
} 
}
}
?>
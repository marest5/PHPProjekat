<?php session_start(); ?>
<?php 
if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true that header redirect it to the home page directly 
 {
    header("Location:pocetna.php"); 
 }



if (isset($_POST["submit"])){


if (isset($_POST['username'])&&isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];


include "konekcija.php";
$sql="SELECT * from korisnik where username='$username' and password='$password'";

$q=$mysqli->query($sql);
$korisnik=mysqli_fetch_object($q);
if(empty($username) || empty($password)){
   echo "<script>
alert('Morate uneti obe vrednosti!');
window.location.href='index.php';
</script>";
} else {
if($q->num_rows==1){

   $_SESSION['use']=$username;
   $_SESSION['status']=$korisnik->idStatus;

         echo '<script type="text/javascript"> window.open("pocetna.php","_self");</script>';            //  On Successfull Login redirects to home.php

} else {
  echo "<script>
alert('Pogresan username ili password!');
window.location.href='index.php';
</script>";
}
}
}
}
$mysqli->close();
?>
<?php 
session_start();
if (isset($_GET['submitupdate'])) {
	if(isset($_GET['korisnikupdate']) && isset($_GET['nazivupdate'])) {
		$korisnik=$_GET['korisnikupdate'];
		$naziv=$_GET['nazivupdate'];
		include "konekcija.php";
		if(empty($naziv) || empty($korisnik)){
			echo "<script>
		alert('Morate uneti sve parametre!');
		window.location.href='updatedelete.php';
		</script>";
		} else {		
$sqll="SELECT * from korisnik where username='$korisnik'";
$rezultatt=$mysqli->query($sqll);
$redd=$rezultatt->fetch_object();
$idogl=$redd->idkorisnik;
$sql="SELECT * from proizvod where naziv='$naziv'";
$rezultat=$mysqli->query($sql);

	if($rezultat->num_rows==1) {
$red=$rezultat->fetch_object();
$idproizogl=$red->idkorisnik;

	if ($idproizogl==$idogl) {
$sqlll="SELECT * from proizvod where idkorisnik='$idogl' and naziv='$naziv'";
$rezultattt=$mysqli->query($sqlll);
$reddd=$rezultattt->fetch_object();
$_SESSION["ide"]=$reddd->idkorisnik;
?>
<html>
<head>
<title>Forma izmena</title>
<LINK REL="SHORTCUT ICON"
       HREF="slike/slika4.jpg">
<link rel="stylesheet" type="text/css" href="css/formaupdate.css"/>
</head>
<body>
<div class="natpisi">        
        <p><MARQUEE BEHAVIOR=ALTERNATE direction=left>KAD PIJEM NE VOZIM!!!---KAD PIJEM NE VOZIM!!!---KAD PIJEM NE VOZIM!!!</MARQUEE>
    </div>
			 <div id='izmenidiv2'>
            <form name='izmeniform' action='update.php' method='GET'>
<br><br>
<u><i><b><h2>Unesite nove vrednosti:</h2></b></i></u>
<br><br><br>
<i><b>Naziv:</b></i>
<input type='text' name='nazivupdate' />
<br><br><br><br>
<i><b>Kategorija:</b></i>
<input type='text' name='stilupdate' />
<br><br><br><br>
<i><b>Cena(RSD):</b></i>
<input type='text' name='cenaupdate' />
<br><br><br><br>
<input type='submit' id= "submit" name='submitupdate' value='Potvrdi' />
<br><br><br>
<button id="submit1" formaction="updatedelete.php">Nazad</button>
</form>
</div>
<div id="footer">
          <br>
          <br>       
            <ul style="list-style: none;">
               <li><u>This site and its contents are property of Southern Directors Brewery Company.
                   (Ovaj sajt i njegova cela sadržina su vlasništvo kompanije Southern Directors Brewery.)</u></li>
                   <span class="em-text3"><li>Radnička 3, 11030 Beograd, Srbija</li>
               <li>@southernbrew.com </li>
               <li>035 8 23 756 </li></span>
            </ul>
          </div>
</body>
</html>
<?php 
		} else {   

		 echo "<script>
         alert('Dati korisnik nije obajvio dato pivo');
         window.location.href='updatedelete.php';
         </script>";
		}} else {
      echo "<script>
         alert('Takavo pivo ne postoji');
         window.location.href='updatedelete.php';
         </script>";
		}}     
	}
	$mysqli->close();
}

 ?>
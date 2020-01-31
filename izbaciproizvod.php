<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Izbaci proizvod</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-language" content="sr">    
  <LINK REL="SHORTCUT ICON"
       HREF="slike/slika4.jpg">
  	 <link rel="stylesheet" type="text/css" href="css/proizvod.css"/>
  
</head>
<body>
<?php 
if(!isset($_SESSION['use'])) {
           header("Location:index.php");  
       } else {
        ?>
<div class="natpisi">        
        <p><MARQUEE BEHAVIOR=ALTERNATE direction=left>KAD PIJEM NE VOZIM!!!---KAD PIJEM NE VOZIM!!!---KAD PIJEM NE VOZIM!!!</MARQUEE>
    </div>
<div id="broj">
<form action="izbaci.php" method="post" enctype="multipart/form-data">

<p>Kategorija:</p>
<input type="text" name="kategorija" />
<br><br><br>
<p>Naziv:</p>
<input type="text" name="naziv" />
<br><br><br>
<p>Cena(RSD):</p>
<input type="number" name="cena" min="0" />
<br><br><br>
<p>Korisnik:</p>
<input type="text" name="korisnik" />
<br><br><br>
<input type="submit" id="submit" value="Izbaci proizvod" name="submit">
<br><br>
<button id="submit1" formaction="pocetna.php">Nazad</button>
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
          <?php } ?>
</body>
</html>
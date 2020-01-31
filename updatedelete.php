<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-language" content="sr">
    <title>Obrisi ili izmeni</title>
    <LINK REL="SHORTCUT ICON"
       HREF="slike/slika4.jpg">
       <script src="js/pronadjinaziv.js"type="text/javascript"></script>	
    <link rel="stylesheet" type="text/css" href="css/updatedelete.css"/>
	

</head>
<body>
<div class="natpisi">        
        <p><MARQUEE BEHAVIOR=ALTERNATE direction=left>KAD PIJEM NE VOZIM!!!---KAD PIJEM NE VOZIM!!!---KAD PIJEM NE VOZIM!!!</MARQUEE>
    </div>
<body>
    <div id="uno">
 <br><br><br>
<h2><p id="obrisip" onclick="homerpuf('obrisidiv')"><u>>>Obriši proizvod<<</u></h2>
<div id="obrisidiv" style="display:none">
<form action="delete.php" method="get">
Naziv:
<input type="text" name="nazivdelete" id="txt" />
Korisnik:
<input type="text" name="korisnikdelete" />

<input type="submit" id="submitdelete" name="submitdelete" value="Obriši" />
</form>
<br><br>
</div>
<br><br><br>
<h2><p id="izmenip" onclick="homerpuf('izmenidiv1')"><u>>>Izmeni proizvod<<</u></p></h2>
<div id="izmenidiv1" style="display:none">
<form action="formaupdate.php" method="get">
Naziv:
<input type="text" name="nazivupdate" id="txt" />
Korisnik:
<input type="text" name="korisnikupdate" />

<input type="submit" id="submitupdate"name="submitupdate" value="Izmeni"  onclick="homerpuf('izmenidiv2')" />
</form>
</div>
<br><br><br><br>
<form>
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
</body>
</html>
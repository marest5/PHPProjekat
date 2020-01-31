<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-language" content="sr">
  <title>Naslovna</title>
  <LINK REL="SHORTCUT ICON"
       HREF="slike/slika4.jpg">       
  <script type="text/javascript" src="js/bacirss.js"></script>
  <script src="js/glasanje.js" type="text/javascript"></script> 
  <script src="js/pronadjinaziv.js"type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="css/pocetna.css"/>
  <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css"/>  
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>


</head>
<body onload="document.getElementById('txt').focus()">
<?php 
if(!isset($_SESSION['use'])) {
           header("Location:indexx.php");  
       } else {
        ?>
<div class="natpisi">        
<MARQUEE BEHAVIOR=scroll direction=left scrollamount="15" id="prviNatpis"><p>
<?php
class rss 
{
    var $feed;
    function rss($feed) 
    {
        $this->feed = $feed;
    }
    function parse() 
    {
        $rss = simplexml_load_file($this->feed);
    $rss_split = array();
    foreach ($rss->channel->item as $item) {
            $title = (string) $item->title;
                $link   = (string) $item->link;
            $description = (string) $item->description;
                $rss_split[] = '<div>
                                <a href="'.$link.'" target="_blank" title="">'.$title.'</a>
                                
                                </div>';
        }
        return $rss_split;
    }
    function display($numrows,$head) 
    {
        $rss_split = $this->parse();
        $i = 0;
        $rss_data = '<div class="container">
                     <div class="title">'.$head.'</div>
                      <div class="links">
                    ';

        while ( $i < $numrows ) 
    {
                $rss_data .= $rss_split[$i];
                $i++;
        }
        $trim = str_replace('', '',$this->feed);
        $user = str_replace('&lang=en-us&format=rss_200','',$trim);
    $rss_data.='</div></div>';
        return $rss_data;
    }
}

$feedlist = new rss("http://www.blic.rs/rss/Kultura/Vesti");
echo $feedlist->display(1,"");
?>


</MARQUEE>
    </div>


<div id="anketica">
<h3>Ocenite kako vam se svideo naš sajt</h3>
<form>
Super:
<input type="radio" name="glas" value="0" onclick="getVote(this.value)">
<br>
Ok:
<input type="radio" name="glas" value="1" onclick="getVote(this.value)">
<br>
Dosadan:
<input type="radio" name="glas" value="2" onclick="getVote(this.value)">
<br>
Brisi:
<input type="radio" name="glas" value="3" onclick="getVote(this.value)">

</form>
</div>

<div id="rss">
<form> 
Odaberi neki RSS-Feed------>   
<select onchange="showRSS(this.value)">
<option value="B92">B92 Sport</option>
<option value="RTS">RTS Sport</option>
</select>
<br><br>
Imaš neku ideju za nas------>
<button  id="submit1" formaction="kontakt.html">Kontaktiraj nas!</button>
<p><div id="rssOutput">
</div></p>
</form>
</div>

<div id="popularno">
<form> 
<?php
$pivce = 'Naslov: Popularne pivare: npr';
$piva = substr($pivce, 8, -4);
$pivo = strtoupper($piva);
echo $pivo;
$pivare = array("Kabinet", "Dogma", "Salto", "Kaš", "Crow", "Tron");
sort($pivare);
$clength = count($pivare);
for($x = 0; $x < $clength; $x++) {
    echo "<br>";
    echo "-";
    echo $pivare[$x];
}
?>
</form>
</div>

<div id="uno">
<div class="topnav">
  <a class="active">>>></a>    
  <a href="tabela.php" id="tabelaa" style="color:white">Spisak pivara</a>
  <a href="telefoni.php" id="telefoni" style="color:white">Kolekcionari</a>
  <a href="pdfpravilnik.php" id="pravilnik" target="_blank" style="color:white">Pravilnik</a>
  <a class="active" id="toto" href="logout.php">>Log out<</a>
  <?php  if($_SESSION['status']==1) {
?>
<a href="admin.php" id="admin" style="color:white">Admin sektor</a>
<?php }
?> 

</div>
<a href="izlistajproizvode.php" id="izlistajproizvode"><h3>Svi proizvodi</h3></a>
<a href="izbaciproizvod.php"><h1>Izbaci svoj oglas ovde</h1></a>
<a href="updatedelete.php"><h2>Izmeni objavu ovde</h2></a>
<p>Pronadji pivo:</p>

<input type="text" id="txt" size="10" onkeyup="sugerisi(this.value)" title="Ukucaj naziv proizvoda koji trazis.">
<input type="button" id="sub" value="Detalji objave" onclick="PrikaziProizvod(document.getElementById('txt').value); homerpuf('uskok'); homerpuf('uskok2')" >

<div id="livesearch" style="color:rgb(200, 67, 67)"></div>

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
<img id="uskok" src= "slike/homer.png" style="display:none">
<img id="uskok2" src= "slike/homer1.png" style="display:none">


<?php } ?>
</body>
</html>
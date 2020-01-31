<?php session_start(); ?>

<html>
<head>
	<style type="text/css">
   body { background-image: url('slike/slika.jpg'); }

    /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
</style>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
<script type="text/javascript" src="js/obrisiizmeni.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="jquery-1.8.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$("#dugmee").click(function(){	 
   $(this).attr("disabled", "disabled");
$.getJSON('http://localhost/projekat/statuskorisnika.json', function(data) {
$.each (data.statusi,function(i, k){
$("#podacii").append("ID status: "+k.idStatus+", Opis: "+k.opis+"<br/>");
})
});
});
});
</script>
	<script type="text/javascript" src="js/obrisiizmeni.js"></script>
<script src="DataTables-1.10.4/media/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables-1.10.4/media/css/jquery.dataTables.min.css" />
<script src="DataTables-1.10.4/media/js/jquery.dataTables.min.js"></script>
<script src="DataTables-1.10.4/extensions/plugins/integration/jqueryui/dataTables.jqueryui.js"></script>
<link rel="stylesheet" type="text/css" href=
	"DataTables-1.10.4/extensions/plugins/integration/jqueryui/dataTables.jqueryui.css">
<link rel="stylesheet" type="text/css" href="jquery-ui-themes-1.12.1/themes/smoothness/jquery-ui.css">

<script>
$(document).ready(function(){
	$(".tabela").DataTable(
 { "scrollY":        "100px",
}
		);
});
</script>
<script>
$(document).ready(function(){
	$(".tabela2").DataTable(
 { "scrollY":        "100px",
}
		);
});
</script>
<script>
$(document).ready(function(){
	$(".tabela3").DataTable(
 { "scrollY":        "100px",
}
		);
});
</script>

<body>

	<?php 
if(!isset($_SESSION['use'])) {
           header("Location:index.php");  
       } else {
        ?>
	<div class="page-header" style="background-color:plum">  
  <h1><b>Admin control room</b></h1>
  <form>
<button class="btn btn-default" id="submit1" formaction="pocetna.php">Nazad</button>
<button class="btn btn-default" id="submit1" formaction="apidokumentacija.php">API dokumentacija</button>
</form>  		
	</div>
	<div class="container">
		<div class="row">
		<div class="col-sm-3 col-md-6" id="levaStrana">
			<button class="btn btn-default" onclick="obrisiizmeni('tabelaa')">Prikazi sve proizvode</button>
<br><br>
			<div id="tabelaa" style="display:none">

<?php
$url = 'http://localhost/projekat/proizvodi.json';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, false);
$curl_odgovor = curl_exec($curl);
curl_close($curl);
$json_objekat=json_decode($curl_odgovor);
?>
<table class="tabela" id="tabela">
<thead>
<tr>
<th>ID</th>
<th>Naziv</th>
<th>Kategorija</th>
<th>Cena</th>
<th>Korisnik</th>
<th>Email</th>
<th>Opis</th>
</tr>
</thead>
<tbody>
	<?php
foreach($json_objekat->proizvodi as $vrednost){
?>
<tr>
<th><?php echo $vrednost->idproizvod;?></th>
<th><?php echo $vrednost->naziv;?></th>
<th><?php echo $vrednost->kategorija;?></th>
<th><?php echo $vrednost->cena;?></th>
<th><?php echo $vrednost->username;?></th>
<th><?php echo $vrednost->email;?></th>
<th><?php echo $vrednost->opis;?></th>
</tr>
<?php
}
?>
</tbody>
</table>

</div>

<form methot="get" action=""<?=$_SERVER['PHP_SELF']?>"">
<input type="text" name="obrisiid" placeholder="ID proizvoda">
 <input class="btn btn-default" type="submit" name="obrisisubmit"value="Obrisi proizvod"><br><br><br><br>
</form>
<?php 
if(isset($_GET['obrisisubmit'])){

	if (isset($_GET['obrisiid'])) {
		$id=$_GET['obrisiid'];
		if ($id==null) {
			echo "Unesi ID";
		} else{
			
			$urll = 'http://localhost/projekat/proizvodi/'.$id;
$curll = curl_init($urll);
curl_setopt($curll, CURLOPT_CUSTOMREQUEST, "DELETE");

$curll_odgovor = curl_exec($curll);
if($curll_odgovor==1) {
	echo"Proizvod vise nije u bazi podataka";
} else {
	echo "Došlo je do greške prilikom brisanja proizvoda";
}

curl_close($curll);
}
	}
}
?>
<div class="row">
<div class="col-md-6">
 <form methot="get" action=""<?=$_SERVER['PHP_SELF']?>"">
<input type="text" name="postaviime" placeholder="Naziv roizvoda">
<input type="text" name="postavikategoriju" placeholder="Kategorija roizvoda">
<input type="text" name="postavicenu" placeholder="Cena roizvoda">
<input type="text" name="postaviidkorisnika" placeholder="ID admina"><br><br>
 <input class="btn btn-default" type="submit" name="postavisubmit"value="Postavi proizvod">
</form>
<?php 
if(isset($_GET['postavisubmit'])){

		
		$naziv=$_GET['postaviime'];
	$cena=$_GET['postavicenu'];
	$kategorija=$_GET['postavikategoriju'];
	$idkorisnika=$_GET['postaviidkorisnika'];
		$data = array('naziv'=>$naziv,'cena'=>$cena,'kategorija'=>$kategorija,'idkorisnik'=>$idkorisnika);
$json_podaci = json_encode($data);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/projekat/proizvodi');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$json_podaci);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
$ress=json_decode($response);
echo $ress->poruka;
curl_close($ch);


}
 ?>
</div>
<div class="col-md-6">
<form methot="get" action=""<?=$_SERVER['PHP_SELF']?>"">
<input type="text" name="izmeniid" placeholder="ID proizvoda">
<input type="text" name="izmeniime" placeholder="Novi naziv proizvoda">
<input type="text" name="izmenikategoriju" placeholder="Nova kategorija proizvoda">
<input type="text" name="izmenicenu" placeholder="Nova cena proizvoda">
<br><br>
 <input class="btn btn-default" type="submit" name="izmenisubmit"value="Izmeni proizvod">
</form>
<?php 
if(isset($_GET['izmenisubmit'])){

		$id=$_GET['izmeniid'];
		$naziv=$_GET['izmeniime'];
	$cena=$_GET['izmenicenu'];
	$kategorija=$_GET['izmenikategoriju'];
	
	$data = array('naziv'=>$naziv,'cena'=>$cena,'kategorija'=>$kategorija);
$json_podaci = json_encode($data);
$url='http://localhost/projekat/proizvodi/'.$id;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($json_podaci)));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS,$json_podaci);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
$ress=json_decode($response);
echo $ress->poruka;

curl_close($ch);


}
 ?>

</div></div>

</div>

<div class="col-sm-9 col-md-6">
	<div class="row">
		<div class="col-md-6">
		Svi registrovani korisnici u aplikaciji:
	<form method="GET" action=""<?=$_SERVER['PHP_SELF']?>"">
   <input type="radio" name="grupaa" value="1" checked> Korisnici<br>
   <input type="radio" name="grupaa" value="2">Admini i korisnici<br>
   <input class="btn btn-default" type="submit" name="prikazisubmit"value="Prikazi korisnike">
	</form>
	<form method="GET" action=""<?=$_SERVER['PHP_SELF']?>"">
		<input type="text" name="idkorisnika" placeholder="ID korisnika">
		<input class="btn btn-default" type="submit" name="unapredi"value="Unapredi u Admina">
	</form>
<?php 
if(isset($_GET['unapredi'])) {

	if(isset($_GET['idkorisnika'])){
		$id=$_GET['idkorisnika'];
		include "konekcija.php";
        $sql="UPDATE korisnik SET idStatus=1 where idkorisnik='$id'";
        $rezul=$mysqli->query($sql);
        if($rezul){
        	echo "Unapredili ste korisnika";
        } else {
        	echo "Niste unapredili korisnika";
        }
	} else {

		echo "Upisi ID korisnika";
	}
	$mysqli->close();
}


 ?>
    <form method="GET" action=""<?=$_SERVER['PHP_SELF']?>"">
		<input type="text" name="idkorisnikaa" placeholder="ID korisnika">
		<input type="text" name="idzasluge" placeholder="ID zasluge">
		<input class="btn btn-default" type="submit" name="dodajzaslugu"value="Dodaj zaslugu">
	</form>

	<?php 
if(isset($_GET['dodajzaslugu'])) {

	if(isset($_GET['idkorisnikaa']) && isset($_GET['idzasluge'])){
		$id=$_GET['idkorisnikaa'];
		$idzas=$_GET['idzasluge'];
		include "konekcija.php";
        $sql="UPDATE korisnik SET idzasluge='$idzas' where idkorisnik='$id'";
        $rezul=$mysqli->query($sql);
        if($rezul){
        	echo "Dodali ste zaslugu korisniku";
        } else {
        	echo "Niste dodali zaslugu korisniku";
        }
	} else {

		echo "Upisi ID korisnika i ID zasluge";
	}
	$mysqli->close();
}

	 ?>





<?php 
if (isset($_GET['prikazisubmit'])) {
	$vote = $_GET['grupaa'];
	if($vote==1) {

$url= 'http://localhost/projekat/korisnici.json';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, false);
$curl_odgovor = curl_exec($curl);

curl_close($curl);
$json_objekatt=json_decode($curl_odgovor);?>
<table class="tabela2" id="tabela2">
<thead>
<tr>
<th>ID</th>
<th>Naziv</th>
<th>Status</th>
<th>Zasluga</th>

</tr>
</thead>
<tbody>
	<?php
foreach($json_objekatt->korisnici as $vrednost){
?>
<tr>
<th><?php echo $vrednost->idkorisnik;?></th>
<th><?php echo $vrednost->username;?></th>
<th><?php echo $vrednost->idStatus;?></th>
<th><?php echo $vrednost->idzasluge;?></th>
</tr>
<?php
}
?>
</tbody>
</table>
<?php  
	} else {
$data = array('admin'=>'admin');
$json_podaci = json_encode($data);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/projekat/korisnici.json');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$json_podaci);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);

curl_close($ch);
$json_objekattt=json_decode($response);?>
<table class="tabela3" id="tabela3">
<thead>
<tr>
<th>ID</th>
<th>Naziv</th>
<th>Status</th>
<th>Zasluga</th>
</tr>
</thead>
<tbody>
	<?php
foreach($json_objekattt->korisnici as $vrednost){
?>
<tr>
<th><?php echo $vrednost->idkorisnik;?></th>
<th><?php echo $vrednost->username;?></th>
<th><?php echo $vrednost->idStatus;?></th>
<th><?php echo $vrednost->idzasluge;?></th>
</tr>
<?php
}
?>
</tbody>
</table>

	<?php  }
}

?>

</div>
<div class="col-md-6">





<form method="GET" action="" id="forma">
<input class="btn btn-default" type = "button" value = "Vidi status" id="dugmee"/>
</form>
<div id = "podacii"></div>
<input class="btn btn-default" type = "button" value = "Vidi zasluge" onclick="obrisiizmeni('zasluge')"/>
<div id="zasluge" style="display:none">
<br>
ID:1 Najposveceniji clan (Hall of Fame)
<br>
<br>
ID:2 Posvecen i pouzdan clan, takodje posten
<br>
<br>
ID:3 Opis: Bez zasluga, nezainteresovan
</div>

</div>
</div>

</div>
</div>
</div>

<?php } ?>
</body>

<style>
.page-header{
	position: top;
	height: 90px;
	text-align: center;
}
</style>

</html>

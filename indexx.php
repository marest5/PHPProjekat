<?php
require 'flight/Flight.php';
require 'jsonindent.php';
Flight::register('db', 'Database', array('bazaprojekat'));
$json_podaci = file_get_contents("php://input");
Flight::set('json_podaci', $json_podaci );


Flight::route('GET /proizvodi.json', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->select("proizvod",'proizvod.idproizvod, proizvod.kategorija, proizvod.cena, proizvod.naziv, korisnik.username,korisnik.email,statuskorisnika.opis',"korisnik","idkorisnik","idkorisnik","statuskorisnika","idStatus","idStatus",null,"cena DESC");
	$niz=array();
	while ($red=$db->getResult()->fetch_object()){
		$niz[] = $red;
		
	}
	
	$json_niz = json_encode ($niz,JSON_UNESCAPED_UNICODE);
	$jsonniz=indent($json_niz);
	$proizvodi='{"proizvodi":';
	$zagrada='}';
	echo $proizvodi.$jsonniz.$zagrada;
	
	return false;
});

Flight::route('GET /proizvodi.xml', function(){
header("Content-type: application/xml");

require "konekcija.php";

$sql="SELECT * FROM proizvod  inner join korisnik ON proizvod.idkorisnik=korisnik.idkorisnik inner join statuskorisnika ON korisnik.idStatus=statuskorisnika.idStatus  ORDER BY cena DESC";
$dom = new DomDocument('1.0','utf-8');

 $proizvodi = $dom->appendChild($dom->createElement('proizvodi'));

if (!$q=$mysqli->query($sql)){

 $greska = $proizvodi->appendChild($dom->createElement('greska'));
 
 $greska->appendChild($dom->createTextNode("Došlo je do greške pri izvršavanju upita"));
} else {

if ($q->num_rows>0){

$niz = array();
while ($red=$q->fetch_object()){
 $proizvod = $proizvodi->appendChild($dom->createElement('proizvod'));

 $id = $proizvod->appendChild($dom->createElement('id'));
 $id->appendChild($dom->createTextNode($red->idproizvod));
$kategorija = $proizvod->appendChild($dom->createElement('kategorija'));
$kategorija->appendChild($dom->createTextNode($red->kategorija));
$cena = $proizvod->appendChild($dom->createElement('cena'));
$cena->appendChild($dom->createTextNode($red->cena));
 $naziv = $proizvod->appendChild($dom->createElement('naziv'));
 $naziv->appendChild($dom->createTextNode($red->naziv));
 $username = $proizvod->appendChild($dom->createElement('username'));
 $username->appendChild($dom->createTextNode($red->username));
 $email = $proizvod->appendChild($dom->createElement('email'));
 $email->appendChild($dom->createTextNode($red->email));
 $opis = $proizvod->appendChild($dom->createElement('opis'));
 $opis->appendChild($dom->createTextNode($red->opis));

}
} else {
 $greska = $proizvodi->appendChild($dom->createElement('greska'));
 $greska->appendChild($dom->createTextNode("Nema unetih proizvoda"));
}
}

$xml_string = $dom->saveXML(); 
echo $xml_string;
$mysqli->close();

});









Flight::route('GET /proizvodi/@id.json', function($id){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->select("proizvod",'proizvod.idproizvod, proizvod.kategorija, proizvod.cena, proizvod.naziv,korisnik.username,korisnik.email,statuskorisnika.opis',"korisnik","idkorisnik","idkorisnik","statuskorisnika","idStatus","idStatus","proizvod.idproizvod = ".$id,null);
	$red=$db->getResult()->fetch_object();
	$json_niz = json_encode ($red,JSON_UNESCAPED_UNICODE);
	echo indent($json_niz);
	return false;
});



Flight::route('GET /proizvodi/@idd.xml', function($idd){
header("Content-type: application/xml");

require "konekcija.php";

$sql="SELECT proizvod.idproizvod, proizvod.kategorija, proizvod.cena, proizvod.naziv, korisnik.username,korisnik.email,statuskorisnika.opis FROM proizvod  inner join korisnik ON proizvod.idkorisnik=korisnik.idkorisnik inner join statuskorisnika ON korisnik.idStatus=statuskorisnika.idStatus WHERE proizvod.idproizvod=$idd";
$dom = new DomDocument('1.0','utf-8');

 $proizvodi = $dom->appendChild($dom->createElement('proizvodi'));

if (!$q=$mysqli->query($sql)){

 $greska = $proizvodi->appendChild($dom->createElement('greska'));
 
 $greska->appendChild($dom->createTextNode("Došlo je do greške pri izvršavanju upita"));
} else {

if ($q->num_rows>0){

$niz = array();
$red=$q->fetch_object();
 $proizvod = $proizvodi->appendChild($dom->createElement('proizvod'));

 $id = $proizvod->appendChild($dom->createElement('id'));
 $id->appendChild($dom->createTextNode($red->idproizvod));
$kategorija = $proizvod->appendChild($dom->createElement('kategorija'));
$kategorija->appendChild($dom->createTextNode($red->kategorija));
$cena = $proizvod->appendChild($dom->createElement('cena'));
$cena->appendChild($dom->createTextNode($red->cena));
 $naziv = $proizvod->appendChild($dom->createElement('naziv'));
 $naziv->appendChild($dom->createTextNode($red->naziv));
 $username = $proizvod->appendChild($dom->createElement('username'));
 $username->appendChild($dom->createTextNode($red->username));
 $email = $proizvod->appendChild($dom->createElement('email'));
 $email->appendChild($dom->createTextNode($red->email));
 $opis = $proizvod->appendChild($dom->createElement('opis'));
 $opis->appendChild($dom->createTextNode($red->opis));


} else {
 $greska = $proizvodi->appendChild($dom->createElement('greska'));
 $greska->appendChild($dom->createTextNode("Nema unetih proizvoda"));
}
}

$xml_string = $dom->saveXML(); 
echo $xml_string;
$mysqli->close();

});






Flight::route('POST /proizvodi', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$podaci_json = Flight::get("json_podaci");
	$podaci = json_decode ($podaci_json);
	if ($podaci == null){
	$odgovor["poruka"] = "Niste prosledili podatke";
	$json_odgovor = json_encode ($odgovor);
	echo $json_odgovor;
	return false;
	} else {
	if (!property_exists($podaci,'naziv')||!property_exists($podaci,'cena')||!property_exists($podaci,'kategorija')||!property_exists($podaci,'idkorisnik')){
			$odgovor["poruka"] = "Niste prosledili korektne podatke";
			$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;

			return false;
	
	} else {
			$podaci_query = array();
			foreach ($podaci as $k=>$v){
				$v = "'".$v."'";
				$podaci_query[$k] = $v;
			}
			if ($db->insert("proizvod", "kategorija,cena,naziv, idkorisnik", array($podaci_query["kategorija"], $podaci_query["cena"], $podaci_query["naziv"],  $podaci_query["idkorisnik"]))){
				$odgovor["poruka"] = "Proizvod je uspešno ubačen";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			} else {
				$odgovor["poruka"] = "Došlo je do greške pri ubacivanju proizvoda";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;

				return false;
			}
	}
	}	
	}
);


Flight::route('PUT /proizvodi/@id', function($id){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$podaci_json = Flight::get("json_podaci");
	$podaci = json_decode ($podaci_json);
	if ($podaci == null){
	$odgovor["poruka"] = "Niste prosledili podatke";
	$json_odgovor = json_encode ($odgovor);
	echo $json_odgovor;
	} else {
	if (!property_exists($podaci,'naziv')||!property_exists($podaci,'cena')||!property_exists($podaci,'kategorija')){
			$odgovor["poruka"] = "Niste prosledili korektne podatke";
			$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
	
	} else {
			$podaci_query = array();
			foreach ($podaci as $k=>$v){
				$v = "'".$v."'";
				$podaci_query[$k] = $v;
			}
			if ($db->update("proizvod", $id, array('kategorija','cena','naziv'),array($podaci->kategorija, $podaci->cena,$podaci->naziv))){
				$odgovor["poruka"] = "Proizvod je uspešno izmenjen";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			} else {
				$odgovor["poruka"] = "Došlo je do greške pri izmeni proizvoda";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
	}
	}	
});

Flight::route('DELETE /proizvodi/@id', function($id){
		header ("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		if ($db->delete("proizvod",array("idproizvod"),array($id))){
				$odgovor["poruka"] = "Proizvod vise nije u bazi podataka";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				
				return false;
		} else {
				$odgovor["poruka"] = "Došlo je do greške prilikom brisanja proizvoda";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				
				return false;
		
		}		
				
});


Flight::route('POST|GET /korisnici.json', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	
    $podaci_json = Flight::get("json_podaci");
	$podaci = json_decode ($podaci_json);
	if ($podaci != null){
		$db->selectkorisnik("korisnik","korisnik.idkorisnik,korisnik.username,korisnik.idStatus,korisnik.idzasluge",null);
	$niz=array();
	while ($red=$db->getResult()->fetch_object()){
		$niz[] = $red;
		
	}
	
	$json_niz = json_encode ($niz,JSON_UNESCAPED_UNICODE);
	$jsonniz=indent($json_niz);
	$korisnici='{"korisnici":';
	$zagrada='}';
	echo $korisnici.$jsonniz.$zagrada;
	
	return false;
} else {
	$db->selectkorisnik("korisnik","korisnik.idkorisnik,korisnik.username,korisnik.idStatus,korisnik.idzasluge","korisnik.idStatus=2");
$niz=array();
	while ($red=$db->getResult()->fetch_object()){
		$niz[] = $red;
		
	}
	
	$json_niz = json_encode ($niz,JSON_UNESCAPED_UNICODE);
	$jsonniz=indent($json_niz);
	$korisnici='{"korisnici":';
	$zagrada='}';
	echo $korisnici.$jsonniz.$zagrada;

	
	return false;


}
});

Flight::route('GET /statuskorisnika.json', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->selectkorisnik("statuskorisnika","statuskorisnika.idStatus,statuskorisnika.opis",null);
	$niz=array();
	while ($red=$db->getResult()->fetch_object()){
		$niz[] = $red;
		
	}
	
	$json_niz = json_encode ($niz,JSON_UNESCAPED_UNICODE);
	$jsonniz=indent($json_niz);
	$statusi='{"statusi":';
	$zagrada='}';
	echo $statusi.$jsonniz.$zagrada;
	
	return false;
});

Flight::start();
?>

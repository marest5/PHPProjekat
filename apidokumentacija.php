<!DOCTYPE>
<html>
<head>

	<script type="text/javascript">

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



	</script>
	<script type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/api.css">
<script type="text/javascript" src="js/api.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<style type="text/css">
	body{

	background-color: plum !important;
}
td{
	border-color: lightblue !important;
}
.table{
	border-top: solid 7px lightblue !important;
}
	</style>
	<title>API Dokumentacija</title>
	


  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

</head>
<body>

	<div class="container">
   
		<div class="page-header"><h2>API Dokumentacija</h2>
    <form>
<button class="btn btn-default" id="submit1" formaction="admin.php">Nazad</button>
</form> 
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Skoči na</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#getproizvodi">GET proizvodi json</a>
    <a href="#getproizvod">GET proizvod json</a>
    <a href="#getproizvodixml">GET proizvodi xml</a>
    <a href="#getproizvodxml">GET proizvod xml</a>
    <a href="#getkorisnici">GET korisnici json</a>
    <a href="#getstatuskorisnika">GET status korisnika json</a>
    <a href="#postproizvod">POST proizvod</a>
    <a href="#postkorisnici">POST korisnici</a>
    <a href="#putproizvod">PUT proizvod</a>
    <a href="#deleteproizvod">DELETE proizvod</a>
  </div>
</div>
</div>
			
<table id="getproizvodi" class="table">
<tbody>
<tr>
<td>Opis funkcije</td>
<td>Pregled svih proizvoda</td>
</tr>
<tr>
<td>HTTP metoda</td>
<td>GET</td>
</tr>
<tr>
<td>URL</td>
<td>http://localhost/projekat/proizvodi.json</td>
</tr>
<tr>
<td>URL parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>HTTP body parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>Izlazni parametri</td>
<td>JSON objekat "proizvodi";<br>Primer:<a href="http://localhost/projekat/proizvodi.json">http://localhost/projekat/proizvodi.json</a></td>
</tr>
<tr>
<td>Format izlaznih parametara</td>
<td>application/json</td>
</tr>
</tbody>
</table><br><br>
<table id="getproizvod" class="table">
<tbody>
<tr>
<td>Opis funkcije</td>
<td>Pregled odredjenog proizvoda</td>
</tr>
<tr>
<td>HTTP metoda</td>
<td>GET</td>
</tr>
<tr>
<td>URL</td>
<td>http://localhost/projekat/proizvodi/:id.json</td>
</tr>
<tr>
<td>URL parametri</td>
<td>id[int]-Identifikacioni broj proizvoda</td>
</tr>
<tr>
<td>HTTP body parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>Izlazni parametri</td>
<td>JSON objekat "proizvod";<br>Primer:<a href="http://localhost/projekat/proizvodi/46.json">http://localhost/projekat/proizvodi/46.json</a></td>
</tr>
<tr>
<td>Format izlaznih parametara</td>
<td>application/json</td>
</tr>
</tbody>
</table><br><br>


<table id="getproizvodixml"class="table">
<tbody>
<tr>
<td>Opis funkcije</td>
<td>Pregled svih proizvoda</td>
</tr>
<tr>
<td>HTTP metoda</td>
<td>GET</td>
</tr>
<tr>
<td>URL</td>
<td>http://localhost/projekat/proizvodi.xml</td>
</tr>
<tr>
<td>URL parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>HTTP body parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>Izlazni parametri</td>
<td>XML sa korenim cvorom "proizvodi";<br>Primer:<a href="http://localhost/projekat/proizvodi.xml">http://localhost/projekat/proizvodi.xml</a></td>
</tr>
<tr>
<td>Format izlaznih parametara</td>
<td>application/xml</td>
</tr>
</tbody>
</table><br><br>

<table id="getproizvodxml" class="table">
<tbody>
<tr>
<td>Opis funkcije</td>
<td>Pregled odredjenog proizvoda</td>
</tr>
<tr>
<td>HTTP metoda</td>
<td>GET</td>
</tr>
<tr>
<td>URL</td>
<td>http://localhost/projekat/proizvodi/:id.xml</td>
</tr>
<tr>
<td>URL parametri</td>
<td>id[int]-Identifikacioni broj proizvoda</td>
</tr>
<tr>
<td>HTTP body parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>Izlazni parametri</td>
<td>XML objekat "proizvod";<br>Primer:<a href="http://localhost/projekat/proizvodi/46.xml">http://localhost/projekat/proizvodi/46.xml</a></td>
</tr>
<tr>
<td>Format izlaznih parametara</td>
<td>application/xml</td>
</tr>
</tbody>
</table><br><br>

<table id="getkorisnici"class="table">
<tbody>
<tr>
<td>Opis funkcije</td>
<td>Pregled svih korisnika</td>
</tr>
<tr>
<td>HTTP metoda</td>
<td>GET</td>
</tr>
<tr>
<td>URL</td>
<td>http://localhost/projekat/korisnici.json</td>
</tr>
<tr>
<td>URL parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>HTTP body parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>Izlazni parametri</td>
<td>JSON objekat "korisnisi";<br>Primer:<a href="http://localhost/projekat/korisnici.json">http://localhost/projekat/korisnici.json</a></td>
</tr>
<tr>
<td>Format izlaznih parametara</td>
<td>application/json</td>
</tr>
</tbody>
</table><br><br>


<table class="table" id="getstatuskorisnika">
<tbody>
<tr>
<td>Opis funkcije</td>
<td>Pregled statusa korisnika</td>
</tr>
<tr>
<td>HTTP metoda</td>
<td>GET</td>
</tr>
<tr>
<td>URL</td>
<td>http://localhost/projekat/statuskorisnika.json</td>
</tr>
<tr>
<td>URL parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>HTTP body parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>Izlazni parametri</td>
<td>JSON objekat "statusi";<br>Primer:<a href="http://localhost/projekat/statuskorisnika.json">http://localhost/projekat/statuskorisnika.json</a></td>
</tr>
<tr>
<td>Format izlaznih parametara</td>
<td>application/json</td>
</tr>
</tbody>
</table><br><br>


<table id="postproizvod"class="table">
<tbody>
<tr>
<td>Opis funkcije</td>
<td>Dodavanje proizvoda</td>
</tr>
<tr>
<td>HTTP metoda</td>
<td>POST</td>
</tr>
<tr>
<td>URL</td>
<td>http://localhost/projekat/proizvodi</td>
</tr>
<tr>
<td>URL parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>HTTP body parametri</td>
<td>JSON objekat sa atributima kategorija[string], naziv[string], cena[int], idkorisnik[int]<br>Primer{"kategorija":"Neka kategorija","naziv":"Neki naziv","cena":"50"}</td>
</tr>
<tr>
<td>Format HTTP body parametra</td>
<td>application/json</td>
</tr>
<tr>
<td>Izlazni parametri</td>
<td>Kratak JSON objekat sa jednim atributom, poruka[string];<br>Primer: {"poruka":Proizvod je uspešno ubačen"}</td>
</tr>
<tr>
<td>Format izlaznih parametara</td>
<td>application/json</td>
</tr>
</tbody>
</table><br><br>


<table id="postkorisnici"class="table">
<tbody>
<tr>
<td>Opis funkcije</td>
<td>Pregled korisnika</td>
</tr>
<tr>
<td>HTTP metoda</td>
<td>POST</td>
</tr>
<tr>
<td>URL</td>
<td>http://localhost/projekat/korisnisi</td>
</tr>
<tr>
<td>URL parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>HTTP body parametri</td>
<td>JSON objekat <br>Primer{"kategorija":"Neka kategorija"}</td>
</tr>
<tr>
<td>Format HTTP body parametra</td>
<td>application/json</td>
</tr>
<tr>
<td>Izlazni parametri</td>
<td>JSON objekat<br>Primer: {"korisnici":[{"idkorisnik":"1","username":"mare","idStatus":"1"}]}</td>
</tr>
<tr>
<td>Format izlaznih parametara</td>
<td>application/json</td>
</tr>
</tbody>
</table><br><br>

<table id="putproizvod"class="table">
<tbody>
<tr>
<td>Opis funkcije</td>
<td>Izmena odredjenog proizvoda</td>
</tr>
<tr>
<td>HTTP metoda</td>
<td>PUT</td>
</tr>
<tr>
<td>URL</td>
<td>http://localhost/projekat/proizvodi/:id</td>
</tr>
<tr>
<td>URL parametri</td>
<td>id[int]-Identifikacioni broj proizvoda</td>
</tr>
<tr>
<td>HTTP body parametri</td>
<td>JSON objekat sa atributima kategorija[string], naziv[string],cena[int]; Primer:<br>{"kategorija":"Neka kategorija","naziv":"Neki naziv","cena":"250"}</td>
</tr>
<tr>
<td>Format HTTP body parametra</td>
<td>application/json</td>
</tr>
<tr>
<td>Izlazni parametri</td>
<td>Kratak JSON objekat sa jednim atributom, poruka[string];<br>Primer: {"poruka":"Proizvod je uspešno izmenjen"}</td>
</tr>
<tr>
<td>Format izlaznih parametara</td>
<td>application/json</td>
</tr>
</tbody>
</table><br><br>

<table id="deleteproizvod"class="table">
<tbody>
<tr>
<td>Opis funkcije</td>
<td>Brisanje odredjenog proizvoda</td>
</tr>
<tr>
<td>HTTP metoda</td>
<td>DELETE</td>
</tr>
<tr>
<td>URL</td>
<td>http://localhost/projekat/proizvodi/:id</td>
</tr>
<tr>
<td>URL parametri</td>
<td>id[int]-Identifikacioni broj proizvoda</td>
</tr>
<tr>
<td>HTTP body parametri</td>
<td>(nema)</td>
</tr>
<tr>
<td>Format HTTP body parametra</td>
<td>(nema)</td>
</tr>
<tr>
<td>Izlazni parametri</td>
<td>Kratak JSON objekat sa jednim atributom, poruka[string];<br>Primer: {"poruka":"Proizvod vise nije u bazi podataka"}</td>
</tr>
<tr>
<td>Format izlaznih parametara</td>
<td>application/json</td>
</tr>
</tbody>
</table><br><br>


</body>
</html>
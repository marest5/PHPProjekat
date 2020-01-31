<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Godina', 'Muski pol', 'Zenski pol'],
          ['2013', 7, 3],
          ['2014', 15,13],
          ['2015', 26, 24],
          ['2016', 50, 38],
          ['2017', 84, 55]
        ]);

        var options = {
   
     
          width: 900,
          chart: {
            title: 'Kontakt telefoni nekih kolekcionara',
            subtitle: 'Aktivni kolekcionari u proteklih nekoliko godina----->'
          },
         
          axes: {
            y: {
              distance: {label: 'broj'}, // Left y-axis.
             
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('dual_y_div'));
      chart.draw(data, options);
    };
    </script>

<style type="text/css">
 #jedan {
    width: 900px;
    height: 700px;
    margin-left: 250px;
    margin-top: 50px;
    border: 3px solid black;    
    background-color: #ffff;
 }
</style>

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<script src="DataTables-1.10.4/media/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables-1.10.4/media/css/jquery.dataTables.min.css" />
<script src="DataTables-1.10.4/media/js/jquery.dataTables.min.js"></script>
<script src="DataTables-1.10.4/extensions/plugins/integration/jqueryui/dataTables.jqueryui.js"></script>
<link rel="stylesheet" type="text/css" href=
	"DataTables-1.10.4/extensions/plugins/integration/jqueryui/dataTables.jqueryui.css">
<link rel="stylesheet" type="text/css" href="jquery-ui-themes-1.12.1/themes/flick/jquery-ui.css">
<style type="text/css">
.tabela{
	border: solid 5px #f5c9f1;
	font-style: oblique;    
    color: solid black;
}

</style>

<script>
$(document).ready(function(){
	var table=$(".tabela").DataTable({
		"columns": [
            { "title": "Id" },
            { "title": "Skor" },
            { "title": "Aktivan od" },
            { "title": "Ime" },
            { "title": "Prezime" },
            { "title": "Telefon" }
        ],
	 "ajax": "json/korisnicitel.json",
		 "language": {
                "url": "DataTables-1.10.4/i18n/serbian.json"
            }
	});

});
</script>
</head>
<div class="page-header" style="background-color:plum">  
<form>
<button class="btn btn-default" id="submit1" formaction="pocetna.php">Nazad</button>
</form>
</div>
<div id='jedan'>
<body>
<table class="tabela" contenteditable="true">
…
</table>



  <div id="dual_y_div" style="width: 900px; height: 300px; "></div>


  </div>
</body>

<style>
.page-header{
	position: top;
	height: 30px;
	text-align: center;  
}

body{
  background: #FFEFFD;
}
</style>

</html>

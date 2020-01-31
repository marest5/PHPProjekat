<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript"src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="jquery.dataTables.editable.js"></script>
<script src="DataTables-1.10.4/media/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables-1.10.4/media/css/jquery.dataTables.min.css" />
<script src="DataTables-1.10.4/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="DataTables-1.10.4/extensions/plugins/integration/jqueryui/dataTables.jqueryui.js"></script>
<script src="DataTables-1.10.4/extensions/editable/jquery.dataTables.editable.js"></script>

<script type="text/javascript" src="jquery.dataTables.editable.js"></script>
<script type="text/javascript" src="jjquery.dataTables.editable.js"></script>
<script src="media/js/jquery.jeditable.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href=
	"DataTables-1.10.4/extensions/plugins/integration/jqueryui/dataTables.jqueryui.css">
<link rel="stylesheet" type="text/css" href="jquery-ui-themes-1.12.1/themes/pepper-grinder/jquery-ui.css"/>
<style type="text/css"src="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"></style>



<style>
.row_selected td {
    background-color: #d3d3d3 !important; /* Add !important to make sure override datables base styles */
 }
</style>

<script>
$(document).ready(function(){
	var table=$('#example').dataTable({
	 
	 "columns": [
            { "title": "Id" },
            { "title": "Kategorija" },
            { "title": "Cena" },
			{ "title": "Naziv" },
			{ "title": "Oglasivac" },
			{ "title": "Email" },
			{ "title": "Status" }
			
        ],
	 "ajax": "server_obrada.php",
	 "processing": true,
       "serverSide": true,
        "language": {
                "url": "DataTables-1.10.4/i18n/serbian.json"
            },
            "scrollY":        "200px",

	}).makeEditable({
							sDeleteURL: "deletetable.php",
                            sDeleteHttpMethod: "GET",      
});
});
</script>

</script>
</head>
<body>	
<table class="display" id="example" width="80%">
</table>
</body>
</html>

<?php
        include "konekcija2.php";

        $table="proizvod";
        $sjoin="inner join korisnik ON proizvod.idkorisnik=korisnik.idkorisnik inner join statuskorisnika ON korisnik.idStatus=statuskorisnika.idStatus";
        $primaryKey='idproizvod';
        $columns = array(
array(
        'db' => 'idproizvod',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
            return $d;
        }
      ),
    array( 'db' => 'idproizvod', 'dt' => 0 ),
    array( 'db' => 'kategorija',  'dt' => 1 ),
    array( 'db' => 'cena',   'dt' => 2 ),
    array( 'db' => 'naziv',     'dt' => 3 ),
    array( 'db' => 'username',     'dt' => 4 ),
    array( 'db' => 'email',     'dt' => 5 ),
    array( 'db' => 'opis',     'dt' => 6 ),
    

);
$sql_details = array(
    'user' => $db_user,
    'pass' => $db_pass,
    'db'   => $db_db,
    'host' => $db_server
);


require( 'class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,$sjoin )
);
        
?>





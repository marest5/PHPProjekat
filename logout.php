<?php
 session_start();

  echo "Uspesno ste se izlogovali ";
  session_destroy();   // function that Destroys Session 
  header("Location: index.php");
?>
<?php
   $datos = array(
   "nombre" => $_POST['nombre'],
   );

   include "../../modelo/config.php";
   $Pais = new Config();
   echo $Pais->agregarpais($datos);
?>
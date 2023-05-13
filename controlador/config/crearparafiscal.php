<?php
   $datos = array(
   "nombre" => $_POST['nombre'],
   );

   include "../../modelo/config.php";
   $Parafiscal = new Config();
   echo $Parafiscal->agregarparafiscal($datos);
?>
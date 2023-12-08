<?php
   $datos = array(
      "codigo" => $_POST['codigo'],
      "nit" => $_POST['nit'],
      "nombre" => $_POST['nombre'],
      "regimen" => $_POST['regimen'],
      "idtip" => $_POST['idtip'],
   );

   include "../../modelo/config.php";
   $Parafiscal = new Config();
   echo $Parafiscal->agregarparafiscal($datos);
?>
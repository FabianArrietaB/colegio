<?php
   $datos = array(
      "nit" => $_POST['nit'],
      "nombre" => $_POST['nombre'],
      "idtip" => $_POST['idtip'],
   );

   include "../../modelo/config.php";
   $Parafiscal = new Config();
   echo $Parafiscal->agregarparafiscal($datos);
?>
<?php
   session_start();
   $datos = array(
   'idoperador' => $_SESSION['usuario']['id'],
   "nombre" => $_POST['nombre'],
   "canalu" => $_POST['canalu'],
   "iddir" => $_POST['iddir'],
   "matric" => $_POST['matric'],
   "pensio" => $_POST['pensio'],
   );

   include "../../modelo/grados.php";
   $Grados = new Grados();
   echo $Grados->agregargrado($datos);
?>
<?php
   session_start();
   $datos = array(
   'idoperador' => $_SESSION['usuario']['id'],
   "nombre" => $_POST['nombre'],
   "idcat"  => $_POST['idcat'],
   "precio" => $_POST['precio'],
   );

   include "../../modelo/productos.php";
   $Productos = new Productos();
   echo $Productos->agregarproducto($datos);
?>
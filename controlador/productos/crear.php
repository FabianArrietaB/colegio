<?php
   $datos = array(
   "nombre" => $_POST['nombre'],
   "idcat"  => $_POST['idcat'],
   "precio" => $_POST['precio'],
   );

   include "../../modelo/productos.php";
   $Productos = new Productos();
   echo $Productos->agregarproducto($datos);
?>
<?php
   $datos = array( 
   "nombre" => $_POST['nombre'],
   "fecha" => $_POST['fecha'], 
   "telefono" => $_POST['telefono'], 
   "correo" => $_POST['correo'], 
   "usuario" => $_POST['usuario'], 
   "password" => sha1($_POST['password']), 
   "idRol" => $_POST['idRol'], 
   "ubicacion" => $_POST['ubicacion']
  );
   
  include "../../modelo/productos.php";
  $Usuarios = new Usuarios();

  echo $Usuarios->agregarproducto($datos);
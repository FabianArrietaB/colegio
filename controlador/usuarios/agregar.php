<?php
   $datos = array(
   "nombre"     => $_POST['nombre'],
   "fecha"      => $_POST['fecha'],
   "correo"     => $_POST['correo'],
   "usuario"    => $_POST['usuario'],
   "password"   => md5($_POST['password']),
   "idRol"      => $_POST['idRol'],
   );

   include "../../modelo/usuarios.php";
   $Usuarios = new Usuarios();
   echo $Usuarios->agregarusuario($datos);
?>
<?php
   $datos = array(
   "usuario"    => $_POST['usuario'],
   "nombre"     => $_POST['nombre'],
   "password"   => md5($_POST['password']),
   "idRol"      => $_POST['idRol'],
   "correo"     => $_POST['correo'],
   "fecha"      => $_POST['fecha'],
   );

   include "../../modelo/usuarios.php";
   $Usuarios = new Usuarios();
   echo $Usuarios->agregarusuario($datos);
?>
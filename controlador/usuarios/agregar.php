<?php
   $datos = array(
   "usuario"    => $_POST['usuario'],
   "nombre"     => $_POST['nombre'],
   "password"   => md5($_POST['password']),
   "correo"     => $_POST['correo'],
   "idRol"      => $_POST['idRol'],
   );

   include "../../modelo/usuarios.php";
   $Usuarios = new Usuarios();
   echo $Usuarios->agregarusuario($datos);
?>
<?php
   session_start();
   $datos = array(
   "usuario"    => $_POST['usuario'],
   'idoperador' => $_SESSION['usuario']['id'],
   "nombre"     => $_POST['nombre'],
   "password"   => md5($_POST['password']),
   "correo"     => $_POST['correo'],
   "idRol"      => $_POST['idRol'],
   );

   include "../../modelo/usuarios.php";
   $Usuarios = new Usuarios();
   echo $Usuarios->agregarusuario($datos);
?>
<?php
    session_start();
    include "../../modelo/usuarios.php";
    $usuario = $_POST['usuario'];
    $password = md5($_POST['password']);
    $Usuarios = new Usuarios();
    echo $Usuarios->IngresoUsuario($usuario, $password);

?>
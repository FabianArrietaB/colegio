<?php
    session_start();

    $usuario = $_POST['usuario'];
    $password = md5($_POST['password']);

    include "../../modelo/usuario.php";
    $Usuarios = new Usuarios();

    echo $Usuarios->IngresoUsuario($usuario, $password);

?>
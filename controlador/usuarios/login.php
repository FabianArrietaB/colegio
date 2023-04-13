<?php
    session_start();

    include "../../modelo/usuario.php";
    $usuario = $_POST['usuario'];
    $password = sha1($_POST['password']);
    $usuario = new usuarios();

    

?>
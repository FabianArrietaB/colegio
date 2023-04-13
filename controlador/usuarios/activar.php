<?php
    include "../../modelo/usuarios.php";
    $Usuarios = new Usuarios();
    $idUsuario = $_POST['id_usuario'];
    $estado = $_POST['user_estado'];
    echo $Usuarios->activarUsuario($idUsuario, $estado);
?>
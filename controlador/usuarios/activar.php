<?php
    include "../../modelo/usuario.php";
    $Usuarios = new Usuarios();
    $idUsuario = $_POST['idUsuarios'];
    $estado = $_POST['estado'];
    echo $Usuarios->activarUsuario($idUsuario, $estado);
?>
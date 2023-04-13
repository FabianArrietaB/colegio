<?php
    include "../../modelo/usuarios.php";
    $Usuarios = new Usuarios();
    $idusuario = $_POST['idusuario'];
    $estado = $_POST['estado'];
    echo $Usuarios->activarusuario($idusuario, $estado);
?>
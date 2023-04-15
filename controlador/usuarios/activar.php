<?php
    include "../../modelo/usuarios.php";
    $Usuario   = new Usuarios();
    $idusuario  = $_POST['idusuario'];
    $estado     = $_POST['estado'];
    echo $Usuario->activarusuario($idusuario, $estado);
?>
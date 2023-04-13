<?php
    $idusuario = $_POST['idusuario'];
    include "../../modelo/usuarios.php";
    $Usuarios = new Usuarios();
    echo $idusuario->eliminarusuario($idusuario);
?>
<?php
    include "../../modelo/usuarios.php";
    $idusuario = $_POST['idusuario'];
    $Usuarios = new Usuarios();
    echo $idusuario->eliminarusuario($idusuario);
?>
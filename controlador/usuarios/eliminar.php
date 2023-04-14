<?php
    $idusuario = $_POST['idusuario'];
    include "../../modelo/usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->eliminarusuario($idusuario);
?>
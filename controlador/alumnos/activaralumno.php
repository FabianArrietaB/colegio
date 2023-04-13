<?php
    include "../../modelo/alumnos.php";
    $Alumno = new Alumnos();
    $idUsuario = $_POST['idUsuarios'];
    $estado = $_POST['estado'];
    echo $Usuarios->activarUsuario($idUsuario, $estado);
?>
<?php
    include "../../modelo/usuarios.php";
    $Alumnos   = new Alumnos();
    $idalumno  = $_POST['idalumno'];
    $estado     = $_POST['estado'];
    echo $Alumnos->activarusuario($idalumno, $estado);
?>
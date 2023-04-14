<?php
    include "../../modelo/alumnos.php";
    $Alumnos   = new Alumnos();
    $idalumno  = $_POST['idalumno'];
    $estado     = $_POST['estado'];
    echo $Alumnos->activaralumno($idalumno, $estado);
?>
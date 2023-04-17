<?php
    include "../../modelo/alumnos.php";
    $Alumnos   = new Alumnos();
    $idalumno  = $_POST['idalumno'];
    echo $Alumnos->eliminaralumno($idalumno);
?>
<?php
    $idalumno = $_GET['idalumno'];
    include "../../modelo/alumnos.php";
    $Alumnos = new Alumnos();
    echo json_encode($Alumnos->tablapadres($idalumno));
?>
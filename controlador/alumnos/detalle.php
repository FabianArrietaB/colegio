<?php
    $idalumno = $_POST['idalumno'];
    include "../../modelo/alumnos.php";
    $Alumnos = new Alumnos();
    echo json_encode($Alumnos->detallealumno($idalumno));
?>
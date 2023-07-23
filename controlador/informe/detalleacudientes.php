<?php
    include "../../modelo/alumnos.php";
    $idalumno = $_POST['idalumno'];
    $Alumnos = new Alumnos();
    echo json_encode($Alumnos->detalleacudiente($idacudiente));
?>
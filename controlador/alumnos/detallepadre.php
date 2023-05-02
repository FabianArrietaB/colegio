<?php
    $idacudiente = $_POST['idacudiente'];
    include "../../modelo/alumnos.php";
    $Alumnos = new Alumnos();
    echo json_encode($Alumnos->detalleacudiente($idacudiente));
?>
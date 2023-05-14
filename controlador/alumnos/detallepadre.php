<?php
    include "../../modelo/alumnos.php";
    $idacudiente = $_POST['idacudiente'];
    $Alumnos = new Alumnos();
    echo json_encode($Alumnos->detalleacudiente($idacudiente));
?>
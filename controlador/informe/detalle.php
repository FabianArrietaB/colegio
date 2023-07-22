<?php
    include "../../modelo/informes.php";
    $docume = $_POST['docume'];
    $Informes = new Informes();
    echo json_encode($Informes->detalleEstudiante($docume));
?>
<?php
    include "../../modelo/reportes.php";
    $Reportes = new Reportes();
    $idsolicitud = $_POST['idsolicitud'];
    echo json_encode($Reportes->detallesolicitud($idsolicitud));
?>
<?php
    include "../../modelo/solicitudes.php";
    $Solicitudes = new Solicitudes();
    $idsolicitud = $_POST['idsolicitud'];
    echo json_encode($Solicitudes->detalleventa($idsolicitud));
?>
<?php
    session_start();
    $datos = Array(
        'idsolicitud'   => $_POST['idsolicitud'],
        'idempleado'    => $_SESSION['usuario']['id'],
        'tiposolicitud' => $_POST['tiposolicitudu'],
        'detalle'       => $_POST['detalleu'],
        'estado'        => $_POST['estadou'],
        'solucion'      => $_POST['solucionu'],
    );
    include "../../modelo/reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->solucion($datos);
?>
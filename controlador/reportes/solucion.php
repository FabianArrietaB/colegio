<?php
    session_start();
    $datos = Array(
        'idsolicitud'   => $_POST['idsolicitud'],
        'idoperador'    => $_SESSION['usuario']['id'],
        'estado'        => $_POST['estadou'],
        'solucion'      => $_POST['solucionu'],
    );
    include "../../modelo/reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->solucion($datos);
?>
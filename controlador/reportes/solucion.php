<?php
    $datos = Array(
        'idsolicitud'   => $_POST['idsolicitud'],
        'idusuario'     => $_POST['idusuario'],
        'idgrado'       => $_POST['idgradou'],
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
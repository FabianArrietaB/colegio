<?php
    $datos = Array(
        'idsolicitud' => $_POST['idsolicitud'],
        'idusuario'  => $_POST['idusuario'],
        'idgrado'  => $_POST['idgrado'],
        'idempleado'   => $_SESSION['usuario']['id'],
        'tiposolicitud'  => $_POST['tiposolicitudu'],
        'detalle'  => $_POST['detalleu'],
        'estado'  => $_POST['estadoo'],
        'solucion'  => $_POST['solucionu'],
    );
    include "../../modelo/reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->solucion($datos);
?>
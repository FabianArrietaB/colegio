<?php
    session_start();
    $datos = Array(
        'idsolicitud'   => $_POST['idsolicitud'],
        'idalumno'      => $_POST['idalumno'],
        'idproducto'    => $_POST['idproducto'],
        'precio'        => $_POST['precio'],
        'idoperador'    => $_SESSION['usuario']['id'],
        'estado'        => $_POST['estadou'],
        'solucion'      => $_POST['solucionu'],
    );
    include "../../modelo/solicitudes.php";
    $Solicitudes = new Solicitudes();
    echo $Solicitudes->solucion($datos);
?>
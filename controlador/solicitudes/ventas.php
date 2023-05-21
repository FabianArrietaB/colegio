<?php
    session_start();
    $datos = Array(
        'idsolicitudu' => $_POST['idsolicitudu'],
        'idoperador'   => $_SESSION['usuario']['id'],
        'idalumno'     => $_POST['idalumno'],
        'idproducto'   => $_POST['idproducto'],
        'precio'       => $_POST['precio'],
        'estado'      => $_POST['estado'],
        'solucion'    => $_POST['solucion'],
    );
    include "../../modelo/solicitudes.php";
    $Solicitudes = new Solicitudes();
    echo $Solicitudes->ventas($datos);
?>
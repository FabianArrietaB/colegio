<?php
    session_start();
    $datos = Array(
        'idoperador'   => $_SESSION['usuario']['id'],
        'idsolicitudu' => $_POST['idsolicitudu'],
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
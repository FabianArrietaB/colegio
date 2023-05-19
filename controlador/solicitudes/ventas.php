<?php
    session_start();
    $datos = Array(
        'idsolicitud'   => $_POST['idsolicitud'],
        'idoperador'    => $_SESSION['usuario']['id'],
        'idalumno'      => $_POST['idalumnou'],
        'idproducto'    => $_POST['idproducto'],
        'precio'        => $_POST['precio'],
        'estado'        => $_POST['estadou'],
        'solucion'      => $_POST['solucionu'],
    );
    include "../../modelo/solicitudes.php";
    $Solicitudes = new Solicitudes();
    echo $Solicitudes->ventas($datos);
?>
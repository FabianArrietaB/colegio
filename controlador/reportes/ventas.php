<?php
    session_start();
    $datos = Array(
        'idalumno'   => $_POST['idalumno'],
        'idoperador' => $_SESSION['usuario']['id'],
        'idproducto' => $_POST['idproductou'],
        'precio'    => $_POST['preciou'],
    );
    include "../../modelo/reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->ventas($datos);
?>
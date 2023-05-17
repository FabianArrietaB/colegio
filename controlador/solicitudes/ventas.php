<?php
    session_start();
    $datos = Array(
        'idalumno'   => $_POST['idalumno'],
        'idoperador' => $_SESSION['usuario']['id'],
        'idproducto' => $_POST['idproducto'],
        'precio'    => $_POST['precio'],
    );
    include "../../modelo/solicitudes.php";
    $Solicitudes = new Solicitudes();
    echo $Solicitudes->ventas($datos);
?>
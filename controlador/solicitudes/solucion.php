<?php
    session_start();
    $datos = Array(
        'idoperador'    => $_SESSION['usuario']['id'],
        'estado'        => $_POST['estadou'],
        'solucion'      => $_POST['solucion'],
    );
    include "../../modelo/solicitudes.php";
    $Solicitudes = new Solicitudes();
    echo $Solicitudes->solucion($datos);
?>
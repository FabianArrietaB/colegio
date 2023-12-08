<?php
    session_start();
    $datos = array(
        'idoperador' => $_SESSION['usuario']['id'],
        "detalle" => $_POST['predetall'],
        "nombre" => $_POST['prenombre'],
    );

    include "../../modelo/config.php";
    $Pais = new Config();
    echo $Pais->agregarmovimiento($datos);
?>
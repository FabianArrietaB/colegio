<?php
    session_start();
    $datos = array(
        'idoperador' => $_SESSION['usuario']['id'],
        "idprefijo"  => $_POST['idprefijo'],
        "idtipmov" => $_POST['idpretipmovu'],
        "prefij" => $_POST['prefiju'],
        "nombre" => $_POST['prenombreu'],
        "consecutivo" => $_POST['preconsecu'],
        "numinicial" => $_POST['prenuminiu'],
        "numfinal" => $_POST['prenumfinu'],
        "fecinicial" => $_POST['prefeciniu'],
        "fecfinal" => $_POST['prefecfinu'],
        "resolucion" => $_POST['preresoluu'],
        "estado" => $_POST['estado'],
    );
    include "../../modelo/config.php";
    $Prefijo = new Config();
    echo $Prefijo->editarprefijo($datos);
?>
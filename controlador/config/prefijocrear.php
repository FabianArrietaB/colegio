<?php
    session_start();
    $datos = array(
        'idoperador' => $_SESSION['usuario']['id'],
        "idtipmov" => $_POST['idpretipmov'],
        "prefij" => $_POST['prefij'],
        "nombre" => $_POST['prenombre'],
        "consecutivo" => $_POST['preconsec'],
        "numinicial" => $_POST['prenumini'],
        "numfinal" => $_POST['prenumfin'],
        "fecinicial" => $_POST['prefecini'],
        "fecfinal" => $_POST['prefecfin'],
        "resolucion" => $_POST['preresolu'],
    );
    include "../../modelo/config.php";
    $Prefijo = new Config();
    echo $Prefijo->agregarprefijo($datos);
?>
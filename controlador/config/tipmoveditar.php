<?php
    session_start();
    $datos = array(
        'idoperador' => $_SESSION['usuario']['id'],
        'idmovimiento' => $_POST['idmovimiento'],
        'datalle'   => $_POST['predetallu'],
        'nombre'          => $_POST['prenombreu'],
        'estado'       => $_POST['estado'],
    );
    include "../../modelo/config.php";
    $Parafiscal = new Config();
    echo $Parafiscal->editarmovimiento($datos);
?>
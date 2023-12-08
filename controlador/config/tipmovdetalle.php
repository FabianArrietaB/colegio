<?php
    include "../../modelo/config.php";
    $Movimiento = new Config();
    $idmovimiento = $_POST['codigo'];
    echo json_encode($Movimiento->detallemovimiento($idmovimiento));
?>
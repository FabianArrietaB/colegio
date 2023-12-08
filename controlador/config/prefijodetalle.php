<?php
    include "../../modelo/config.php";
    $Prefijo = new Config();
    $idprefijo = $_POST['codigo'];
    echo json_encode($Prefijo->detalleprefijo($idprefijo));
?>
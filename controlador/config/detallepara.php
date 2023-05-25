<?php
    include "../../modelo/config.php";
    $Parafiscal = new Config();
    $idparafiscal = $_POST['idparafiscal'];
    echo json_encode($Parafiscal->detalleparafiscal($idparafiscal));
?>
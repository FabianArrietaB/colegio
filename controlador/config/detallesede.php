<?php
    include "../../modelo/config.php";
    $Sede = new Config();
    $idusuario = $_POST['idusuario'];
    echo json_encode($Sede->detalleempresa($idusuario));
?>
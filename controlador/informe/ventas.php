<?php
    include "../../modelo/informes.php";
    $Informes = new Informes();
    $idalumno = $_GET['idalumno'];
    echo json_encode($Informes->detalleventa($idalumno));
?>
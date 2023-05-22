<?php
    include "../../modelo/informes.php";
    $Informes = new Informes();
    $idalumno = $_POST['idalumno'];
    echo json_encode($Informes->detalleventa($idalumno));
?>
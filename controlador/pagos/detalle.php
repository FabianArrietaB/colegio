<?php
    include "../../modelo/pagos.php";
    $Pagos = new Pagos();
    $idalumno = $_POST['idalumno'];
    echo json_encode($Pagos->detallematricula($idalumno));
?>
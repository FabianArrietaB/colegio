<?php
    include "../../modelo/pagos.php";
    $idmatricula = $_POST['idmatricula'];
    $Pagos = new Pagos();
    echo json_encode($Pagos->detallematricula($idmatricula));
?>
<?php
    include "../../modelo/pagos.php";
    $Pagos = new Pagos();
    $idmatricula = $_POST['idmatricula'];
    echo json_encode($Pagos->detallematricula($idmatricula));
?>
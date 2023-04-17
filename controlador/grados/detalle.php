<?php
    include "../../modelo/grados.php";
    $Grados = new Grados();
    $idgrado = $_POST['idgrado'];
    echo json_encode($Grados->detallegrado($idgrado));
?>
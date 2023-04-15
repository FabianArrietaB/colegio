<?php
    include "../../modelo/grados.php";
    $Grados   = new Grados();
    $idgrado  = $_POST['idgrado'];
    $estado     = $_POST['estado'];
    echo $Grados->activargrado($idgrado, $estado);
?>
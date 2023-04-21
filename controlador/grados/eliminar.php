<?php
    include "../../modelo/grados.php";
    $Grados   = new Grados();
    $idgrados  = $_POST['idgrado'];
    echo $Grados->eliminargrado($idgrados);
?>
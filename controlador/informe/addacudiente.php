<?php
    include "../../modelo/informes.php";
    $Informes   = new Informes();
    $idacudiente  = $_POST['idacudiente'];
    $idfacturas     = $_POST['idfacturas'];
    echo $Informes->agregaracudiente($idacudiente, $idfacturas);
?>
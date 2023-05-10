<?php
    include "../../modelo/reportes.php";
    $Reportes   = new Reportes();
    $idsolicitud  = $_POST['idsolicitud'];
    echo $Reportes->eliminarsolicitud($idsolicitud);
?>
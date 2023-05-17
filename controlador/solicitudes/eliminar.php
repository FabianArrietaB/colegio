<?php
    include "../../modelo/solicitudes.php";
    $Solicitudes   = new Solicitudes();
    $idsolicitud  = $_POST['idsolicitud'];
    echo $Solicitudes->eliminarsolicitud($idsolicitud);
?>
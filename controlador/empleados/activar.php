<?php
    include "../../modelo/empleados.php";
    $Empleados   = new Empleados();
    $idempleado  = $_POST['idempleado'];
    $estado     = $_POST['estado'];
    echo $Empleados->activarempleado($idempleado, $estado);
?>
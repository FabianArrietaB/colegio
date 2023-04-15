<?php
    include "../../modelo/empleado.php";
    $Empleados   = new Empleados();
    $idempleado  = $_POST['idempleado'];
    $estado     = $_POST['estado'];
    echo $Empleados->activarempleado($idempleado, $estado);
?>
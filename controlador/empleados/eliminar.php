<?php
    include "../../modelo/empleados.php";
    $Empleados   = new Empleados();
    $idempleado  = $_POST['idempleado'];
    echo $Empleados->eliminarempleado($idempleado);
?>
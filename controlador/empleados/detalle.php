<?php
    include "../../modelo/empleados.php";
    $Empleados   = new Empleados();
    $idempleado = $_POST['idempleado'];
    echo json_encode($Empleados->detalleempleado($idempleado));
?>
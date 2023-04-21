<?php
    include "../../modelo/empleados.php";
    $Empleado   = new Empleados();
    $idempleado = $_POST['idempleado'];
    echo json_encode($Empleado->detalleempleado($idempleado));
?>
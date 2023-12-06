<?php
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    // Do Prepared Query
    $query = "SELECT * FROM alumnos AS a INNER JOIN grados AS g ON g.id_grado = a.id_grado LIMIT 10";
    $respuesta = mysqli_query($conexion, $query);
    $datos = mysqli_fetch_array($respuesta);
    // return the result in json
    echo json_encode($datos);
?>
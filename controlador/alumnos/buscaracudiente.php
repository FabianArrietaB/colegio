<?php
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $search = strip_tags(trim($_GET['persona']));
    // Do Prepared Query
    $query = "SELECT * FROM acudientes AS ac INNER JOIN alumnos AS a ON a.id_alumno = ac.id_alumno WHERE alu_nombre LIKE '%$search%' || alu_docume LIKE '%$search%' LIMIT 40";
    // Do a quick fetchall on the results
    $respuesta = mysqli_query($conexion, $query);
    $list = array();
    while ($list=mysqli_fetch_array($respuesta)){
        $data[] = array(
            'id' => $list['id_acudiente'],
            'text' => $list['acu_nombre'],
            'nomacu' => $list['acu_nombre'],
            'nomalu' => $list['alu_nombre']
        );
    }
    // return the result in json
    echo json_encode($data);
    ?>
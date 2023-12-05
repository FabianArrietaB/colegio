<?php
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $search = strip_tags(trim($_GET['filtro']));
    // Do Prepared Query
    if($search == ''){
        $query = "SELECT * FROM alumnos AS a INNER JOIN grados AS g ON g.id_grado = a.id_grado LIMIT 40";
        $respuesta = mysqli_query($conexion, $query);
        $datos = array();
        
    }else{
        $query = "SELECT * FROM alumnos AS a INNER JOIN grados AS g ON g.id_grado = a.id_grado WHERE alu_nombre  LIKE '%$search%' || alu_docume LIKE '%$search%' LIMIT 40";
        $respuesta = mysqli_query($conexion, $query);
        while ($list=mysqli_fetch_array($respuesta)){
            $data[] = array(
                'nombre' => $list['alu_nombre'],
                'docume' => $list['alu_docume'],
                'grado' => $list['gra_nombre'],
            );
        }
    }
    // return the result in json
    echo json_encode($datos);
    ?>
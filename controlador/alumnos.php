<?php
    header('Content-Type: application/json');

    require("../modelo/conexion.php");

    switch ($_GET['accion']) {
        case 'listar':
            $datos = mysqli_query($conexion, "select * from alumnnos");
            $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
            echo json_encode($resultado);
        break;

        case 'agregar':
            $respuesta = mysqli_query($conexion, "insert into articulos(descripcion,precio) values ('$_POST[descripcion]',$_POST[precio])");
            echo json_encode($respuesta);
        break;

        case 'borrar':
            $respuesta = mysqli_query($conexion, "delete from articulos where codigo=$_GET[codigo]");
            echo json_encode($respuesta);
        break;

        case 'consultar':
            $datos = mysqli_query($conexion, "select codigo,descripcion,precio from articulos where codigo=$_GET[codigo]");
            $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
            echo json_encode($resultado);
        break;

        case 'modificar':
            $respuesta = mysqli_query($conexion, "update articulos set
                                                    descripcion='$_POST[descripcion]',
                                                    precio=$_POST[precio]
                                                where codigo=$_GET[codigo]");
            echo json_encode($respuesta);
        break;
    }
?>
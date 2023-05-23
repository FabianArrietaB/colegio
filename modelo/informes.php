<?php
    include "conexion.php";
    class Informes extends Conexion {

        public function detalleventa($idalumno){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                v.id_alumno as idalumno,
                v.id_producto as idproducto,
                a.id_grado   as idgrado,
                v.ven_precio as precio,
                v.ven_fecope as fecope,
                a.alu_nombre as nomalu,
                a.alu_telcel as telcel,
                a.alu_correo as correo,
                a.alu_direcc as direcc,
                a.alu_fecope as fecmat,
                p.pro_nombre as producto
                FROM ventas AS v
                INNER JOIN alumnos as a ON v.id_alumno = a.id_alumno
                INNER JOIN productos as p ON v.id_producto = p.id_producto
                WHERE v.id_alumno ='$idalumno'";
            $respuesta = mysqli_query($conexion,$sql);
            $ventas = mysqli_fetch_array($respuesta);
            $datos = array(
            'idalumno'  => $ventas['idalumno'],
            'idproducto' => $ventas['idproducto'],
            'idgrado'    => $ventas['idgrado'],
            'precio'     => $ventas['precio'],
            'fecope'     => $ventas['fecope'],
            'nomalu'     => $ventas['nomalu'],
            'telcel'     => $ventas['telcel'],
            'correo'     => $ventas['correo'],
            'direcc'     => $ventas['direcc'],
            'fecmat'     => $ventas['fecmat'],
            'producto'   => $ventas['producto'],
            'lista'       => array()
            );
            return $datos;
        }
    }
?>
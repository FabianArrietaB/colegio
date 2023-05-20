<?php
    include "conexion.php";
    class Informes extends Conexion {

        public function detallematriculas($idalumno){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                au.id_alumno as idalumno,
                au.id_grado  as idgrado,
                au.id_tipopago as tippag,
                au.aud_valor as matricula,
                au.aud_abono as abono,
                au.aud_fecope as fecha,
                a.alu_nombre as alumno,
                g.gra_nombre as grado
                FROM auditorias AS au
                INNER JOIN alumnos as a ON au.id_alumno = a.id_alumno
                INNER JOIN grados as g ON au.id_grado = g.id_grado
                WHERE m.id_matricula ='$idalumno'";
            $respuesta = mysqli_query($conexion,$sql);
            $matricula = mysqli_fetch_array($respuesta);
            $datos = array(
            'idalumno'   => $matricula['idalumno'],
            'idgrado'      => $matricula['idgrado'],
            'tippag'        => $matricula['tippag'],
            'matricula'       => $matricula['matricula'],
            'abono'         => $matricula['abono'],
            'fecha'     => $matricula['fecha'],
            'alumno'         => $matricula['alumno'],
            'grado'         => $matricula['grado'],
            );
            return $datos;
        }

        public function detalleventas($idalumno){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                v.id_alumno as idalumno,
                v.id_producto as idproducto,
                v.ven_precio as precio,
                v.ven_fecope as fecha,
                a.alu_nombre as alumno,
                p.pro_nombre as producto,
                FROM ventas AS v
                INNER JOIN alumnos as a ON v.id_alumno = a.id_alumno
                INNER JOIN productos as p ON v.id_producto = v.id_producto
                WHERE v.id_alumno ='$idalumno'";
            $respuesta = mysqli_query($conexion,$sql);
            $ventas = mysqli_fetch_array($respuesta);
            $datos = array(
            'idalumno'   => $ventas['idalumno'],
            'idproducto' => $ventas['idproducto'],
            'precio'     => $ventas['precio'],
            'fecha'      => $ventas['fecha'],
            'alumno'     => $ventas['alumno'],
            'producto'   => $ventas['producto'],
            );
            return $datos;
        }
    }
?>
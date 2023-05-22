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
                WHERE au.id_alumno ='$idalumno'";
            $respuesta = mysqli_query($conexion,$sql);
            $matricula = mysqli_fetch_array($respuesta);
            $datos = array(
            'idalumno'  => $matricula['idalumno'],
            'idgrado'   => $matricula['idgrado'],
            'tippag'    => $matricula['tippag'],
            'matricula' => $matricula['matricula'],
            'abono'     => $matricula['abono'],
            'fecha'     => $matricula['fecha'],
            'alumno'    => $matricula['alumno'],
            'grado'     => $matricula['grado'],
            );
            return $datos;
        }

        public function detalleventas($idalumno){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                v.id_alumno as idalumnou,
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
            'idalumnou'  => $ventas['idalumnou'],
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
            );
            return $datos;
        }
    }
?>
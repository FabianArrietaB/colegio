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
            // 'lista'      => $this->detalleEstudiante()
            );
            return $datos;
        }

        public function detalleEstudiante($docume) {
            $conexion = Conexion::conectar();
            $sql ="SELECT
                a.alu_docume  AS docume,
                a.id_alumno   AS idalumno,
                a.alu_nombre  AS nombre,
                a.alu_direcc  AS direcc,
                a.alu_telcel  AS telcel,
                a.alu_correo  AS correo,
                a.alu_fecope  AS fecing,
                g.gra_nombre  AS grado
                FROM alumnos AS a
                INNER JOIN grados AS g ON g.id_grado = a.id_grado
                WHERE a.alu_docume = '$docume'";
            $respuesta = mysqli_query($conexion,$sql);
            $alumno = mysqli_fetch_array($respuesta);
            $datos = array(
                'docume' => $alumno['docume'],
                'idalumno' => $alumno['idalumno'],
                'nombre' => $alumno['nombre'],
                'direcc' => $alumno['direcc'],
                'telcel' => $alumno['telcel'],
                'correo' => $alumno['correo'],
                'fecing' => $alumno['fecing'],
                'grado' => $alumno['grado'],
            );
            return $datos;
        }
    }
?>
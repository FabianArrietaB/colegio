<?php
    include "conexion.php";
    class Pagos extends Conexion {

        public function detallematricula($idmatricula){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                m.id_matricula as idmatricula,
                m.id_alumno as idalumno,
                a.alu_nombre as nomalu,
                m.id_grado as idgrado,
                m.mat_valmat as matricula,
                m.mat_saldo as saldo
                FROM matriculas AS m
                INNER JOIN alumnos as a ON m.id_alumno = a.id_alumno
                WHERE m.id_matricula ='$idmatricula'";
            $respuesta = mysqli_query($conexion,$sql);
            $matricula = mysqli_fetch_array($respuesta);
            $datos = array(
            'idmatricula'   => $matricula['idmatricula'],
            'idalumno'      => $matricula['idalumno'],
            'nomalu'        => $matricula['nomalu'],
            'idgrado'       => $matricula['idgrado'],
            'matricula'     => $matricula['matricula'],
            'saldo'         => $matricula['saldo'],
            );
            return $datos;
        }

        public function pagomatricula($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE matriculas SET mat_saldo = ?, mat_detalle = ? WHERE id_matricula = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssi', $datos['balance'], $datos['detall'], $datos['idmatricula']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>
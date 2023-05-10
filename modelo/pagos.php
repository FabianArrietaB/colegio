<?php
    include "conexion.php";
    class Pagos extends Conexion {

        public function detallematricula($idalumno){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                m.id_alumno as idalumno,
                m.id_grado as idgrado,
                m.mat_valmat as matricula,
                m.mat_saldo as abono,
                a.alu_nombre as nomalu,
                g.gra_nombre as grado
                FROM matriculas AS mat
                INNER JOIN alumnos as a ON m.id_alumno = a.id_alumno
                INNER JOIN grados as g ON m.id_grado = g.id_grado
                WHERE empleados.id_empleado='$idalumno'";
            $respuesta = mysqli_query($conexion,$sql);
            $empleado = mysqli_fetch_array($respuesta);
            $datos = array(
            'idalumno' => $empleado['idalumno'],
            'idgrado' => $empleado['idgrado'],
            'matricula' => $empleado['matricula'],
            'abono' => $empleado['abono'],
            'grado' => $empleado['grado'],
            );
            return $datos;
        }

        public function pagomatricula($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE matriculas SET
                    id_grado = ?,
                    mat_valmat = ?,
                    mat_saldo = ?,
                    mat_detall   = ?,
                    WHERE id_alumno = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('iisssi',
                                $datos['idgrado'],
                                $datos['matricula'],
                                $datos['abono'],
                                $datos['detall'],
                                $datos['idalumno']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>
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
                    emp_nombre = ?,
                    emp_cladoc = ?,
                    emp_docume = ?,
                    emp_fecnac = ?,
                    emp_sexo   = ?,
                    emp_gposan = ?,
                    emp_factrh = ?,
                    emp_estciv = ?,
                    emp_escola = ?,
                    emp_hijos  = ?,
                    emp_telcel = ?,
                    emp_ciudad = ?,
                    emp_direcc = ?,
                    emp_estrat = ?,
                    emp_correo = ?,
                    emp_cargo  = ?,
                    emp_tipcon = ?,
                    emp_salari = ?,
                    emp_codeps = ?,
                    emp_codarl = ?,
                    emp_codpen = ?,
                    emp_codces = ?
                    WHERE id_empleado = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssssssssssssssssssi',
                                $datos['nombre'],
                                $datos['cladoc'],
                                $datos['docume'],
                                $datos['fecnac'],
                                $datos['sexo'],
                                $datos['gposan'],
                                $datos['factrh'],
                                $datos['estciv'],
                                $datos['escola'],
                                $datos['hijos'],
                                $datos['telcel'],
                                $datos['ciudad'],
                                $datos['direcc'],
                                $datos['estrat'],
                                $datos['correo'],
                                $datos['cargo'],
                                $datos['tipcon'],
                                $datos['salari'],
                                $datos['codeps'],
                                $datos['codarl'],
                                $datos['codpen'],
                                $datos['codces'],
                                $datos['idempleado']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>
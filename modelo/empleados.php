<?php
    include 'conexion.php';

    class Empleados extends Conexion {

        public function activarempleado($idempleado, $estado){
            $conexion = Conexion::conectar();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = 'UPDATE empleados SET emp_estado = ? WHERE id_empleado = ?';
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estado, $idempleado);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function eliminarempleado($idempleado){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM empleados WHERE id_empleado=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idempleado);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function agregarempleado($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO empleados (
                    emp_nombre,
                    emp_cladoc,
                    emp_docume,
                    emp_fecnac,
                    emp_sexo,
                    emp_gposan,
                    emp_factrh,
                    emp_estciv,
                    emp_escola,
                    emp_hijos,
                    emp_telcel,
                    emp_ciudad,
                    emp_direcc,
                    emp_estrat,
                    emp_correo,
                    emp_cargo,
                    emp_tipcon,
                    emp_salari,
                    emp_codeps,
                    emp_codarl,
                    emp_codpen,
                    emp_codces)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("ssssssssssssssssssssss",
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
                    );
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detalleempleado($idempleado){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                empleados.id_empleado AS idempleado,
                empleados.emp_nombre    AS nombre,
                empleados.emp_cladoc    AS cladoc,
                empleados.emp_docume    AS docume,
                empleados.emp_cargo     AS cargo,
                empleados.emp_telcel    AS telcel,
                empleados.emp_ciudad    AS ciudad,
                empleados.emp_direcc    AS direcc,
                empleados.emp_estrat    AS estrat,
                empleados.emp_correo    AS correo,
                empleados.emp_tipcon    AS tipcon,
                empleados.emp_salari    AS salari,
                empleados.emp_codces    AS codces,
                empleados.emp_codeps    AS codeps,
                empleados.emp_codpen    AS codpen,
                empleados.emp_codarl    AS codarl,
                empleados.emp_sexo      AS sexo,
                empleados.emp_estciv    AS estciv,
                empleados.emp_escola    AS escola,
                empleados.emp_gposan    AS gposan,
                empleados.emp_factrh    AS factrh,
                empleados.emp_hijos     AS hijos,
                empleados.emp_fecnac    AS fecnac
                FROM empleados AS empleados
                WHERE empleados.id_empleado='$idempleado'";
            $respuesta = mysqli_query($conexion,$sql);
            $empleado = mysqli_fetch_array($respuesta);
            $datos = array(
            'idempleado' => $empleado['idempleado'],
            'nombre' => $empleado['nombre'],
            'cladoc' => $empleado['cladoc'],
            'docume' => $empleado['docume'],
            'cargo' => $empleado['cargo'],
            'telcel' => $empleado['telcel'],
            'ciudad' => $empleado['ciudad'],
            'direcc' => $empleado['direcc'],
            'estrat' => $empleado['estrat'],
            'correo' => $empleado['correo'],
            'tipcon' => $empleado['tipcon'],
            'salari' => $empleado['salari'],
            'codces' => $empleado['codces'],
            'codeps' => $empleado['codeps'],
            'codpen' => $empleado['codpen'],
            'codarl' => $empleado['codarl'],
            'sexo' => $empleado['sexo'],
            'estciv' => $empleado['estciv'],
            'escola' => $empleado['escola'],
            'gposan' => $empleado['gposan'],
            'factrh' => $empleado['factrh'],
            'hijos' => $empleado['hijos'],
            'fecnac' => $empleado['fecnac'],
            );
            return $datos;
        }

        public function editarempleado($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE empleados SET
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
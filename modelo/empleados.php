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

        public function agregarempleado($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO empleados (emp_nombre, emp_cladoc, emp_docume, emp_cargo, emp_telcel, emp_ciudad,
            emp_direcc, emp_estrat, emp_correo, emp_tipcon, emp_salari, emp_codces, emp_codeps, emp_codpen, emp_codarl,
            emp_sexo, emp_estciv, emp_escola, emp_gposan, emp_factrh, emp_hijos, emp_fecnac)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("sssssssssssssssssssssss", $datos['nombre'], $datos['cladoc'], $datos['docume'], $datos['cargo'], $datos['telcel']
            , $datos['ciudad'], $datos['direcc'], $datos['estrat'], $datos['correo'], $datos['tipcon'], $datos['salari'], $datos['codces'], $datos['codeps']
            , $datos['conpen'], $datos['codarl'], $datos['sexo'], $datos['estciv'], $datos['escola'], $datos['gposan'], $datos['factrh'], $datos['hijos'], $datos['fecnac']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detalleempleado($idempleado){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                empleados.id_empleado AS idempleado,
                empleados.emp_nombre AS nombre,
                empleados.emp_cladoc AS cladoc,
                empleados.emp_docume AS docume,
                empleados.emp_cargo  AS  cargo,
                empleados.emp_telcel AS telcel,
                empleados.emp_ciudad AS ciudad,
                empleados.emp_direcc AS direcc,
                empleados.emp_estrat AS estrat,
                empleados.emp_correo AS correo,
                empleados.emp_tipcon AS tipcon,
                empleados.emp_salari AS salari,
                empleados.emp_codces AS codces,
                empleados.emp_codeps AS codeps,
                empleados.emp_codpen AS conpen,
                empleados.emp_codarl AS codarl,
                empleados.emp_sexo   AS   sexo,
                empleados.emp_estciv AS estciv,
                empleados.emp_escola AS escola,
                empleados.emp_gposan AS gposan,
                empleados.emp_factrh AS factrh,
                empleados.emp_hijos  AS hijos,
                empleados.emp_estado AS estado,
                empleados.emp_fecnac AS fecnac,
                empleados.emp_fecope AS fecope
                FROM empleados AS empleados
                WHERE empleados.id_empleado ='$idempleado'";
            $respuesta = mysqli_query($conexion,$sql);
            $empleados = mysqli_fetch_array($respuesta);
            $datos = array(
            'idempleado' => $empleados['idempleado'],
            'nombre' => $empleados['nombre'],
            'cladoc' => $empleados['cladoc'],
            'docume' => $empleados['docume'],
            'cargo'  => $empleados['cargo'],
            'telcel'  => $empleados['telcel'],
            'ciudad' => $empleados['ciudad'],
            'direcc' => $empleados['direcc'],
            'estrat' => $empleados['estrat'],
            'correo' => $empleados['correo'],
            'tipcon' => $empleados['tipcon'],
            'salari' => $empleados['salari'],
            'codces' => $empleados['codces'],
            'codeps' => $empleados['codeps'],
            'conpen' => $empleados['conpen'],
            'codarl' => $empleados['codarl'],
            'sexo' => $empleados['sexo'],
            'estciv' => $empleados['estciv'],
            'escola' => $empleados['escola'],
            'gposan' => $empleados['gposan'],
            'factrh' => $empleados['factrh'],
            'hijos' => $empleados['hijos'],
            'fecnac' => $empleados['fecnac'],
            );
            return $datos;
        }

        public function editarempleado($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE empleados SET emp_nombre = ?, emp_cladoc = ?, emp_docume = ?, emp_cargo = ?, emp_telcel = ?, emp_ciudad = ?,
            emp_direcc = ?, emp_estrat = ?, emp_correo = ?, emp_tipcon = ?, emp_salari = ?, emp_codces = ?, emp_codeps = ?, emp_codpen = ?, emp_codarl = ?,
            emp_sexo = ?, emp_estciv = ?, emp_escola = ?, emp_gposan = ?, emp_factrh = ?, emp_hijos = ?, emp_fecnac = ?, emo_fechup = ? WHERE id_empleado = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssssssssssssssssssssi', $datos['nombre'], $datos['cladoc'], $datos['docume'], $datos['cargo'], $datos['telcel']
            , $datos['ciudad'], $datos['direcc'], $datos['estrat'], $datos['correo'], $datos['tipcon'], $datos['salari'], $datos['codces'], $datos['codeps']
            , $datos['conpen'], $datos['codarl'], $datos['sexo'], $datos['estciv'], $datos['escola'], $datos['gposan'], $datos['factrh'], $datos['hijos'], $datos['fecnac'], $datos['idempleado']);
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
    }
?>
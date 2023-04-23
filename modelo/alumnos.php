<?php
    include "conexion.php";

    class Alumnos extends Conexion {

        public function activaralumno($idalumno, $estado){
            $conexion = Conexion::conectar();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = "UPDATE alumnos SET alu_estado = ? WHERE id_alumno = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estado, $idalumno);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function eliminaralumno($idalumno){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM alumnos WHERE id_alumno=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idalumno);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function agregaralumnos($datos){
            $conexion = Conexion::conectar();
            $sql1 = "INSERT INTO empleados (id_grado, alu_nombre, alu_cladoc, alu_docume, alu_sexo, alu_gposan, alu_factrh, alu_ciudad, alu_direcc, alu_estrat, alu_telcel, alu_correo, alu_fecnac) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
            $query = $conexion->prepare($sql1);
            $query->bind_param("isssssssssssss", $datos['idgrado'], $datos['nombre'], $datos['cladoc'], $datos['docume'], $datos['sexo'], $datos['gposan'], $datos['factrh'], $datos['ciudad'], $datos['direcc'], $datos['estrat'], $datos['telcel'], $datos['correo'], $datos['fecnac']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function agregarpadre($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO acudientes( id_alumno, acu_nombre, acu_cladoc, acu_docume, acu_ciudad, acu_direcc, acu_telcel, acu_correo, acu_parent) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("issssssss", $datos['idalumno'], $datos['nompad'], $datos['cldopa'], $datos['docpad'], $datos['telpad'], $datos['ciupad'], $datos['dirpad'], $datos['estpad'], $datos['corpad'], $datos['parpad'],);
            $respuesta = $query->execute();
            $idacudiente = mysqli_insert_id($conexion);
            $query->close();
            return $idacudiente;
        }

        public function agregarmadre($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO acudientes( id_alumno, acu_nombre, acu_cladoc, acu_docume, acu_ciudad, acu_direcc, acu_telcel, acu_correo, acu_parent) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("issssssss", $datos['idalumno'], $datos['nommad'], $datos['cldoma'], $datos['docmad'], $datos['ciumad'], $datos['dirmad'], $datos['telmad'], $datos['estmad'], $datos['cormad'], $datos['parmad'],);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function agregarmatricula($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO matriculas( id_alumno, id_grado, mat_valmat, mat_saldo, mat_detalle) VALUES(?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iisss", $datos['idalumno'], $datos['idgrado'], $datos['matric'], $datos['pensio'], $datos['abono'],);
            $respuesta = $query->execute();
            return $respuesta;
        }
    }
?>
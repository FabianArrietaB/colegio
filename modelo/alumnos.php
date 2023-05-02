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
            $activaralumno = "UPDATE alumnos SET alu_estado = ? WHERE id_alumno = ?";
            $query = $conexion->prepare($activaralumno);
            $query->bind_param('ii', $estado, $idalumno);
            $respuesta = $query->execute();
            $activaracudiente = "UPDATE acudientes SET acu_estado = ? WHERE id_alumno = ?";
            $query = $conexion->prepare($activaracudiente);
            $query->bind_param('ii', $estado, $idalumno);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function eliminaralumno($idalumno){
            $conexion = Conexion::conectar();
            $eliminaralumno = "DELETE FROM alumnos WHERE id_alumno=?";
            $query = $conexion->prepare($eliminaralumno);
            $query->bind_param('i', $idalumno);
            $respuesta = $query->execute();
            $eliminaracudiente = "DELETE FROM acudientes WHERE id_alumno=?";
            $query = $conexion->prepare($eliminaracudiente);
            $query->bind_param('i', $idalumno);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function agregaralumno($datos){
            $conexion = Conexion::conectar();
            $insertalumno = "INSERT INTO alumnos (id_grado, alu_nombre, alu_cladoc, alu_docume, alu_sexo, alu_gposan, alu_factrh, alu_ciudad, alu_direcc, alu_estrat, alu_telcel, alu_correo, alu_fecnac)
                                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($insertalumno);
            $query->bind_param("issssssssssss", $datos['idgrado'], $datos['nombre'], $datos['cladoc'], $datos['docume'], $datos['sexo'], $datos['gposan'], $datos['factrh'], $datos['ciudad'], $datos['direcc'], $datos['estrat'], $datos['telcel'], $datos['correo'], $datos['fecnac'],);
            $respuesta = $query->execute();
            $idalumno = mysqli_insert_id($conexion);
            $insertmadre = "INSERT INTO acudientes( id_alumno, acu_nombre, acu_cladoc, acu_docume, acu_ciudad, acu_direcc, acu_estrat, acu_telcel, acu_correo, acu_parent)
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($insertmadre);
            $query->bind_param("issssssss", $idalumno, $datos['nommad'], $datos['cldoma'], $datos['docmad'], $datos['ciumad'], $datos['estmad'], $datos['telmad'], $datos['cormad'], $datos['parmad'],);
            $respuesta = $query->execute();
            $insertpadre = "INSERT INTO acudientes( id_alumno, acu_nombre, acu_cladoc, acu_docume, acu_ciudad, acu_direcc, acu_estrat, acu_telcel, acu_correo, acu_parent)
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($insertpadre);
            $query->bind_param("issssssss", $idalumno, $datos['nompad'], $datos['cldopa'], $datos['docpad'], $datos['ciupad'], $datos['estpad'], $datos['dirpad'], $datos['telpad'], $datos['corpad'], $datos['parpad'],);
            $respuesta = $query->execute();
                if ($respuesta > 0) {
                    $idacudiente = mysqli_insert_id($conexion);
                    $insertparentezco = "INSERT INTO parentezcos( id_alumno, id_acudiente, id_grado)
                                VALUES(?, ?, ?)";
                    $query = $conexion->prepare($insertparentezco);
                    $query->bind_param("iii",$idalumno, $idacudiente, $datos['idgrado'],);
                    $respuesta = $query->execute();
                    $insertmatricula = "INSERT INTO matriculas( id_alumno, id_grado, mat_valmat, mat_pensio, mat_saldo, mat_detalle)
                                VALUES(?, ?, ?, ?, ?, ?)";
                    $query = $conexion->prepare($insertmatricula);
                    $query->bind_param("iissss",$idalumno, $datos['idgrado'], $datos['matric'], $datos['pensio'], $datos['abono'],$datos['detall'],);
                    $respuesta = $query->execute();
                }
            return $respuesta;
        }

        public function detallealumno($idalumno){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                alumnos.id_alumno   AS idalumno,
                alumnos.alu_nombre  AS nombre,
                alumnos.alu_cladoc  AS cladoc,
                alumnos.alu_docume  AS docume,
                alumnos.alu_sexo    AS sexo,
                alumnos.alu_fecnac  AS fecnac,
                alumnos.alu_gposan  AS gposan,
                alumnos.alu_factrh  AS factrh,
                alumnos.alu_ciudad  AS ciudad,
                alumnos.alu_direcc  AS direcc,
                alumnos.alu_estrat  AS estrat,
                alumnos.alu_telcel  AS telcel,
                alumnos.alu_correo  AS correo,
                alumnos.id_grado    AS idgrado
                FROM alumnos AS alumnos
                WHERE alumnos.id_alumno = '$idalumno'";
            $respuesta = mysqli_query($conexion,$sql);
            $alumno = mysqli_fetch_array($respuesta);
            $datos = array(
                'idalumno' => $alumno['idalumno'],
                'nombre' => $alumno['nombre'],
                'cladoc' => $alumno['cladoc'],
                'docume' => $alumno['docume'],
                'sexo' => $alumno['sexo'],
                'gposan' => $alumno['gposan'],
                'factrh' => $alumno['factrh'],
                'ciudad' => $alumno['ciudad'],
                'direcc' => $alumno['direcc'],
                'estrat' => $alumno['estrat'],
                'telcel' => $alumno['telcel'],
                'correo' => $alumno['correo'],
                'fecnac' => $alumno['fecnac'],
                'idgrado' => $alumno['idgrado'],
            );
            return $datos;
        }

        public function editaralumno($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE alumnos SET
                    id_grado = ?,
                    alu_nombre = ?,
                    alu_cladoc = ?,
                    alu_docume = ?,
                    alu_sexo   = ?,
                    alu_gposan = ?,
                    alu_factrh = ?,
                    alu_ciudad = ?,
                    alu_direcc = ?,
                    alu_estrat = ?,
                    alu_telcel = ?,
                    alu_correo = ?,
                    alu_fecnac = ?
                    WHERE id_alumno = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issssssssssssi',
                                $datos['idgrado'],
                                $datos['nombre'],
                                $datos['cladoc'],
                                $datos['docume'],
                                $datos['sexo'],
                                $datos['gposan'],
                                $datos['factrh'],
                                $datos['ciudad'],
                                $datos['direcc'],
                                $datos['estrat'],
                                $datos['telcel'],
                                $datos['correo'],
                                $datos['fecnac'],
                                $datos['idalumno']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function detalleacudiente($idacudiente){
            $conexion = Conexion::conectar();
            $sql ="SELECT
            acudientes.id_acudiente AS idacudiente,
            acudientes.acu_nombre  AS nombre,
            acudientes.acu_cladoc  AS cladoc,
            acudientes.acu_docume  AS docume,
            acudientes.acu_ciudad  AS ciudad,
            acudientes.acu_direcc  AS direcc,
            acudientes.acu_estrat  AS estrat,
            acudientes.acu_telcel  AS telcel,
            acudientes.acu_correo  AS correo,
            acudientes.acu_estado  AS estado,
            acudientes.acu_fecope  AS fecha,
            alumnos.id_alumno      AS idalumno,
            alumnos.alu_nombre     AS nomalu,
            grados.id_grado        AS idgrado,
            grados.gra_nombre      AS grado
            FROM acudientes AS acudientes
            INNER JOIN alumnos AS alumnos ON acudientes.id_alumno = alumnos.id_alumno
            INNER JOIN grados AS grados ON grados.id_grado = alumnos.id_grado
            WHERE alumnos.id_alumno = '$idacudiente'";
            $respuesta = mysqli_query($conexion,$sql);
            $alumno = mysqli_fetch_array($respuesta);
            $datos = array(
                'idacudiente' => $alumno['idacudiente'],
                'nombre' => $alumno['nombre'],
                'cladoc' => $alumno['cladoc'],
                'docume' => $alumno['docume'],
                'sexo' => $alumno['sexo'],
                'gposan' => $alumno['gposan'],
                'factrh' => $alumno['factrh'],
                'ciudad' => $alumno['ciudad'],
                'direcc' => $alumno['direcc'],
                'estrat' => $alumno['estrat'],
                'telcel' => $alumno['telcel'],
                'correo' => $alumno['correo'],
                'nomalu' => $alumno['nomalu'],
                'grado' => $alumno['grado'],
            );
            return $datos;
        }
    }
?>
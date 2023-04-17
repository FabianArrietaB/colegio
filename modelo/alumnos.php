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

        public function detallealumno($idalumno){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                alumnos.id_alumno   AS idalumno,
                alumnos.alu_nombre  AS nombre,
                alumnos.alu_cladoc  AS cladoc,
                alumnos.alu_docume  AS docume,
                alumnos.alu_sexo    AS sexo,
                alumnos.alu_gposan  AS gposan,
                alumnos.alu_factrh  AS factrh,
                alumnos.alu_ciudad  AS ciudad,
                alumnos.alu_direcc  AS direcc,
                alumnos.alu_estrat  AS estrat,
                alumnos.alu_telcel  AS celula,
                alumnos.alu_correo  AS correo,
                alumnos.alu_estado  AS estado,
                alumnos.alu_fecope  AS fecha,
                grados.id_grado     AS idgrado,
                grados.gra_nombre   AS grado,
                acudientes.id_acudiente  AS idacudiente,
                acudientes.acu_nombre AS nombreacu,
                acudientes.acu_cladoc AS cladocacu,
                acudientes.acu_docume AS documeacu,
                acudientes.acu_ciudad AS ciudadacu,
                acudientes.acu_direcc AS direccacu,
                acudientes.acu_telcel AS celulaacu,
                acudientes.acu_correo AS correoacu,
                acudientes.acu_parent AS parentezc
                FROM alumnos AS alumnos
                INNER JOIN acudientes AS acudientes
                ON alumnos.id_alumno = acudientes.id_alumno
                INNER JOIN grados AS grados
                ON grados.id_grado = alumnos.id_grado
                WHERE alumnos.id_alumno  ='$idalumno'";
            $respuesta = mysqli_query($conexion,$sql);
            $alumno = mysqli_fetch_array($respuesta);
            $datos = array(
                'idalumno' => $alumno['idalumno'],
                'nombre'   => $alumno['nombre'],
                'cladoc'   => $alumno['cladoc'],
                'docume'   => $alumno['docume'],
                'sexo'     => $alumno['sexo'],
                'gposan'   => $alumno['gposan'],
                'factrh'   => $alumno['factrh'],
                'ciudad'   => $alumno['ciudad'],
                'estrat'   => $alumno['estrat'],
                'celula'   => $alumno['celula'],
                'correo'   => $alumno['correo'],
                'estado'   => $alumno['estado'],
                'fecha'    => $alumno['fecha'],
                'idgrado'  => $alumno['idgrado'],
                'grado'       => $alumno['grado'],
                'idacudiente' => $alumno['idacudiente'],
                'nombreacu'   => $alumno['nombreacu'],
                'cladocacu'   => $alumno['cladocacu'],
                'documeacu'   => $alumno['documeacu'],
                'ciudadacu'   => $alumno['ciudadacu'],
                'direccacu'   => $alumno['direccacu'],
                'celulaacu'   => $alumno['celulaacu'],
                'correoacu'   => $alumno['correoacu'],
                'parentezc'   => $alumno['parentezc'],
            );
            return $datos;
        }

        public function agregaralumno($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO alumnos (id_rol, user_usuario, user_nombre, user_contra, user_correo, user_fecop) VALUES(?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("isssss", $datos['idRol'], $datos['usuario'], $datos['nombre'], $datos['password'], $datos['correo'], $datos['fecha']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function editaralumno($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE alumnos SET id_grado=' ? ,alu_nombre= ? ,alu_cladoc= ? ,alu_docum e =,`alu_sexo= ? ,
                    alu_gposan= ? ,alu_factrh= ? ,alu_ciudad= ? ,alu_direcc= ? ,alu_estrat= ? ,alu_telcel= ? ,
                    alu_correo= ? ,alu_estado= ? ,alu_fecnac=?, alu_fecupd=? WHERE id_alumno = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issssssssssssssi', $datos['idgradou'], $datos['nombreu'], $datos['claddocu'], $datos['correo'], $datos['fecha'], $datos['idusuario']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

    }
?>
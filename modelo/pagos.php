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
                g.gra_nombre as grado,
                m.mat_valmat as matricula,
                m.mat_saldo as saldo
                FROM matriculas AS m
                INNER JOIN alumnos as a ON m.id_alumno = a.id_alumno
                INNER JOIN grados as g ON m.id_grado = g.id_grado
                WHERE m.id_matricula ='$idmatricula'";
            $respuesta = mysqli_query($conexion,$sql);
            $matricula = mysqli_fetch_array($respuesta);
            $datos = array(
            'idmatricula'   => $matricula['idmatricula'],
            'idalumno'      => $matricula['idalumno'],
            'nomalu'        => $matricula['nomalu'],
            'idgrado'       => $matricula['idgrado'],
            'grado'         => $matricula['grado'],
            'matricula'     => $matricula['matricula'],
            'saldo'         => $matricula['saldo'],
            );
            return $datos;
        }

        public function detallepension($idmatricula){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                m.id_matricula as idmatriculau,
                m.id_alumno as idalumnou,
                a.alu_nombre as nomaluu,
                m.id_grado as idgradou,
                g.gra_nombre as gradou,
                m.mat_pensio as pensionu
                FROM matriculas AS m
                INNER JOIN alumnos as a ON m.id_alumno = a.id_alumno
                INNER JOIN grados as g ON m.id_grado = g.id_grado
                WHERE m.id_matricula ='$idmatricula'";
            $respuesta = mysqli_query($conexion,$sql);
            $matricula = mysqli_fetch_array($respuesta);
            $datos = array(
            'idmatriculau' => $matricula['idmatriculau'],
            'idalumnou'    => $matricula['idalumnou'],
            'nomaluu'      => $matricula['nomaluu'],
            'idgradou'     => $matricula['idgradou'],
            'gradou'       => $matricula['gradou'],
            'pensionu'     => $matricula['pensionu'],
            );
            return $datos;
        }

        public function pagomatricula($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE matriculas SET mat_saldo = ?, mat_fecmat = ?, id_tipopago = ? WHERE id_matricula = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssii', $datos['balance'], $datos['fecmat'], $datos['idtippago'], $datos['idmatricula']);
            $respuesta = $query->execute();
            if ($respuesta > 0) {
                $insertauditoria = "INSERT INTO auditorias(id_operador, id_alumno, id_grado, aud_valor, aud_abono, id_tipopago)
                            VALUES(?, ?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertauditoria);
                $query->bind_param("iiissi", $datos['idoperador'], $datos['idalumno'], $datos['idgrado'],  $datos['matricula'], $datos['abono'],$datos['idtippago'],);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

        public function pagopension($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE matriculas SET mat_fecpen = ?, id_tipopago = ? WHERE id_matricula = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('sii', $datos['fecpen'], $datos['idtippago'], $datos['matriculaid']);
            $respuesta = $query->execute();
            if ($respuesta > 0) {
                $insertauditoria = "INSERT INTO auditorias(id_operador, id_alumno, id_grado, aud_valor, aud_abono, id_tipopago)
                            VALUES(?, ?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertauditoria);
                $query->bind_param("iiissi", $datos['idoperador'], $datos['alumnoid'], $datos['gradoid'],  $datos['pension'], $datos['avance'],$datos['idtippago'],);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }
    }
?>
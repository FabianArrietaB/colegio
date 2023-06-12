<?php
    include "conexion.php";
    class Pagos extends Conexion {

        public function detallematricula($idmatricula){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                m.id_matricula as idmatricula,
                m.id_alumno as idalumno,
                m.id_grado as idgrado,
                m.mat_valmat as matricula,
                m.mat_saldo as saldo,
                a.alu_nombre as nomalu,
                g.gra_nombre as grado
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
                m.id_grado as idgradou,
                m.mat_pensio as pension,
                m.mat_salpen as salpen,
                a.alu_nombre as nomaluu,
                g.gra_nombre as gradou
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
            'pension'      => $matricula['pension'],
            'salpen'       => $matricula['salpen'],
            );
            return $datos;
        }

        public function pagomatricula($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE matriculas SET mat_saldo = ?, mat_fecmat = ?, mat_fecpropag = ?, id_tipopago = ? WHERE id_matricula = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssii', $datos['balance'], $datos['fecmat'], $datos['fecpro'], $datos['idtippago'], $datos['idmatricula']);
            $respuesta = $query->execute();
            if ($respuesta > 0){
                $fecha = date("Y-m-d");
                $crearfactura = "INSERT INTO facturas (id_operador, id_alumno, id_tippag, fac_valor, fac_fecope) VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($crearfactura);
                $query->bind_param("iiiss", $datos['idoperador'], $datos['idalumno'], $datos['idtippago'], $datos['abono'], $fecha);
                $respuesta = $query->execute();
                $idfactura = $conexion->insert_id;
                $insertauditoria = "INSERT INTO auditorias( id_operador, id_alumno, id_grado, aud_valor, aud_abono, id_tipopago, aud_numdoc) VALUES(?, ?, ?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertauditoria);
                $query->bind_param("iiissis", $datos['idoperador'], $datos['idalumno'], $datos['idgrado'], $datos['matricula'], $datos['abono'],  $datos['idtippago'], $idfactura);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

        public function pagopension($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE matriculas SET mat_salpen = ?, mat_fecpen = ?, mat_fecpropag = ?, id_tippagpen = ? WHERE id_matricula = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssii', $datos['diferencia'], $datos['fecpen'], $datos['fecpro'], $datos['idtippagou'], $datos['idmatriculau']);
            $respuesta = $query->execute();
            if ($respuesta > 0) {
                $fecha = date("Y-m-d");
                $crearfactura = "INSERT INTO facturas (id_operador, id_alumno, id_tippag, fac_valor, fac_fecope) VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($crearfactura);
                $query->bind_param("iiiss", $datos['idoperador'], $datos['idalumnou'], $datos['idtippagou'], $datos['avance'], $fecha);
                $respuesta = $query->execute();
                $idfactura = $conexion->insert_id;
                $insertauditoria = "INSERT INTO auditorias( id_operador, id_alumno, id_grado, aud_valor, aud_abono, id_tipopago, aud_numdoc) VALUES(?, ?, ?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertauditoria);
                $query->bind_param("iiissis",  $datos['idoperador'],  $datos['idalumnou'],  $datos['idgradou'],  $datos['pension'],  $datos['avance'],  $datos['idtippagou'], $idfactura);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }
    }
?>
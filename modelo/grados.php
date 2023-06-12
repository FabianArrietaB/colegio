<?php
    include "conexion.php";

    class Grados extends Conexion {

        public function activargrado($idgrado, $estado){
            $conexion = Conexion::conectar();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = "UPDATE grados SET gra_estado = ? WHERE id_grado = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estado, $idgrado);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function agregargrado($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO grados (id_empleado, id_operador, gra_nombre, gra_matric, gra_pensio, gra_canalu)
                    VALUES(?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iissss", $datos['iddir'] ,$datos['idoperador'], $datos['nombre'], $datos['matric'], $datos['pensio'], $datos['canalu']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detallegrado($idgrado){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                g.id_grado    AS idgrado,
                g.id_empleado AS iddir,
                g.gra_nombre  AS nombre,
                g.gra_matric  AS matric,
                g.gra_pensio  AS pensio,
                g.gra_canalu  AS canalu,
                g.gra_estado  AS estado,
                g.gra_fecope  AS fecha,
                e.emp_nombre  AS nompro
                FROM grados AS g
                LEFT JOIN empleados AS e ON g.id_empleado = e.id_empleado
                WHERE g.id_grado ='$idgrado'";
            $respuesta = mysqli_query($conexion,$sql);
            $grados = mysqli_fetch_array($respuesta);
            $datos = array(
            'idgrado'=> $grados['idgrado'],
            'iddir'  => $grados['iddir'],
            'nombre' => $grados['nombre'],
            'matric' => $grados['matric'],
            'pensio' => $grados['pensio'],
            'canalu' => $grados['canalu'],
            'nompro' => $grados['nompro'],
            'fecha'  => $grados['fecha']
            );
            return $datos;
        }

        public function editargrado($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE grados SET id_operador = ?, gra_nombre = ?, gra_matric = ?, gra_pensio = ?, gra_canalu = ?, id_empleado = ? WHERE id_grado = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issssii', $datos['idoperador'], $datos['nombre'], $datos['matric'], $datos['pensio'], $datos['canalu'], $datos['iddir'], $datos['idgrado']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function eliminargrado($idgrado){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM grados WHERE id_grado=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idgrado);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

    }
?>
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
            $sql = "INSERT INTO grados (id_empleado, gra_nombre, gra_matric, gra_pensio, gra_canalu) VALUES(?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("issss", $datos['iddir'], $datos['nombre'], $datos['matric'], $datos['pensio'], $datos['canalu']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detallegrado($idgrado){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                grados.id_grado   AS idgrado,
                grados.gra_nombre    AS nombre,
                grados.gra_matric    AS matric,
                grados.gra_pensio    AS pensio,
                grados.gra_canalu    AS canalu,
                grados.gra_estado    AS estado,
                grados.gra_fecope    AS fecha,
                empleados.id_empleado   AS idempleado,
                empleados.emp_nombre    AS nompro
                FROM grados AS grados
                INNER JOIN empleados AS empleados ON grados.id_empleado = empleados.id_empleado
                WHERE grados.id_grado ='$idgrado'";
            $respuesta = mysqli_query($conexion,$sql);
            $grados = mysqli_fetch_array($respuesta);
            $datos = array(
            'idgrado' => $grados['idgrado'],
            'nombre' => $grados['nombre'],
            'matric' => $grados['matric'],
            'pensio' => $grados['pensio'],
            'canalu' => $grados['canalu'],
            'idempleado' => $grados['idempleado'],
            'nompro' => $grados['nompro'],
            'fecha' => $grados['fecha']
            );
            return $datos;
        }

        public function editargrado($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE grados SET id_empleado = ?, gra_nombre = ?, gra_matric = ?, gra_pensio = ?, gra_canalu = ?, gra_fecope = ? WHERE id_grado = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('isssssi', $datos['iddiru'], $datos['nombre'], $datos['matric'], $datos['pensio'],  $datos['canalu'], $datos['fecha'], $datos['idgrado']);
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
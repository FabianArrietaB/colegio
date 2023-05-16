<?php
    include "conexion.php";

    class Reportes extends Conexion {

        public function crearsolicitud($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO solicitudes (id_usuario, id_grado, rep_tipo, rep_detalle) VALUES(?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iiss", $datos['idusuario'], $datos['idgrado'], $datos['tiposolicitud'], $datos['detalle']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function eliminarsolicitud($idsolicitud){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM solicitudes WHERE id_solicitud=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idsolicitud);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function detallesolicitud($idsolicitud){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                    s.id_solicitud      AS idsolicitud,
                    s.id_usuario        AS idusuario,
                    s.id_grado          AS idgrado,
                    s.id_empleado       AS idempleado,
                    s.rep_tipo          AS tiposolicitud,
                    s.rep_detalle       AS detalle,
                    s.rep_estado        AS estado,
                    u.user_nombre       AS usuario
                FROM solicitudes AS s
                INNER JOIN usuarios AS u ON s.id_usuario = u.id_usuario
                WHERE s.id_solicitud ='$idsolicitud'";
            $respuesta = mysqli_query($conexion,$sql);
            $solicitud = mysqli_fetch_array($respuesta);
            $datos = array(
            'idsolicitud' => $solicitud['idsolicitud'],
            'idusuario' => $solicitud['idusuario'],
            'idgrado' => $solicitud['idgrado'],
            'idempleado' => $solicitud['idempleado'],
            'tiposolicitud' => $solicitud['tiposolicitud'],
            'detalle' => $solicitud['detalle'],
            'estado' => $solicitud['estado'],
            'usuario' => $solicitud['usuario'],
            );
            return $datos;
        }

        public function ventas($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO ventas (id_alumno, id_producto, id_operador, ven_precio) VALUES(?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iiis',
                                $datos['idalumno'],
                                $datos['idproducto'],
                                $datos['idoperador'],
                                $datos['precio']);
            $respuesta = $query->execute();
            if ($respuesta > 0) {
                $idventa = mysqli_insert_id($conexion);
                $insertventa = "INSERT INTO solicitudes(id_venta)
                            VALUES(?)";
                $query = $conexion->prepare($insertventa);
                $query->bind_param("i",$idventa);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

        public function solucion($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE solicitudes SET
                                id_empleado = ?,
                                rep_estado = ?,
                                rep_solucion = ?
                                WHERE id_solicitud = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issi',
                                $datos['idempleado'],
                                $datos['estado'],
                                $datos['solucion'],
                                $datos['idsolicitud']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>
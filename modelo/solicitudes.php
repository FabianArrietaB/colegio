<?php
    include "conexion.php";

    class Solicitudes extends Conexion {

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
                s.id_operador       AS idoperador,
                s.rep_tipo          AS reptipo,
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
            'reptipo' => $solicitud['reptipo'],
            'detalle' => $solicitud['detalle'],
            'estado' => $solicitud['estado'],
            'usuario' => $solicitud['usuario'],
            );
            return $datos;
        }

        public function solucion($datos){
            $conexion = Conexion::conectar();
            $idventa = self::ventas($datos);

            if($idventa > 0){
                $sql = "UPDATE  solicitudes SET
                            id_operador = ?,
                            id_venta = ?,
                            rep_estado = ?,
                            rep_solucion = ?
                            WHERE id_solicitud = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('iissi',
                                    $datos['idoperador'],
                                    $idventa,
                                    $datos['estado'],
                                    $datos['solucion'],
                                    $datos['idsolicitud']);
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            }else {
                return 0;
            }
        }

        public function ventas($datos){
            if (!$datos) {
                return 0;
            }else{
                $conexion = Conexion::conectar();
                $insertventa = "INSERT INTO ventas (id_alumno, id_producto, id_operador, ven_precio) VALUES(?, ?, ?, ?)";
                $query = $conexion->prepare($insertventa);
                $query->bind_param('iiis',
                                $datos['idalumno'],
                                $datos['idproducto'],
                                $datos['idoperador'],
                                $datos['precio']);
                $respuesta = $query->execute();
                $idventa = mysqli_insert_id($conexion);
                $query->close();
                return $idventa;
            }
        }
    }
?>
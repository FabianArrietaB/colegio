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
                    s.id_venta          AS idventa,
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
            'idusuario' => $solicitud['idusuario'],
            'idgrado' => $solicitud['idgrado'],
            'idoperador' => $solicitud['idoperador'],
            'idventa' => $solicitud['idventa'],
            'reptipo' => $solicitud['reptipo'],
            'detalle' => $solicitud['detalle'],
            'estado' => $solicitud['estado'],
            'usuario' => $solicitud['usuario'],
            );
            return $datos;
        }

        // public function solucion($datos){
        //     $conexion = Conexion::conectar();
        //     $idventa = self::ventas($datos);

        //     if ($idventa > 0) {
        //         $sql = "UPDATE solicitudes SET id_venta = ? WHERE id_solicitud = ?";
        //         $query = $conexion->prepare($sql);
        //         $query->bind_param('ii', $idventa, $datos['idsolicitud']);
        //         $respuesta = $query->execute();
        //         return $respuesta;
        //     } else {
        //         $sql = "UPDATE solicitudes SET
        //                         id_operador = ?,
        //                         id_venta = ?,
        //                         rep_estado = ?,
        //                         rep_solucion = ?
        //                         WHERE id_solicitud = ?";
        //         $query = $conexion->prepare($sql);
        //         $query->bind_param('issi',
        //                             $datos['idoperador'],
        //                             $datos['estado'],
        //                             $datos['solucion'],
        //                             $datos['idsolicitud']);
        //         $respuesta = $query->execute();
        //         return $respuesta;
        //     }
        // }

        // public function ventas($datos){
        //     $conexion = Conexion::conectar();
        //     $sql = "INSERT INTO ventas (id_alumno, id_producto, id_operador, ven_precio) VALUES(?, ?, ?, ?)";
        //     $query = $conexion->prepare($sql);
        //     $query->bind_param('iiis',
        //                         $datos['idalumno'],
        //                         $datos['idproducto'],
        //                         $datos['idoperador'],
        //                         $datos['precio']);
        //     $respuesta = $query->execute();
        //     $idventa = mysqli_insert_id($conexion);
        //     $query->close();
        //     return $idventa;
        // }

        public function solucion($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE solicitudes SET rep_estado = ?, rep_solucion = ? WHERE id_solicitud = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssi', $datos['estado'], $datos['solucion'], $datos['idsolicitud']);
            $respuesta = $query->execute();
            if ($datos['reptipo'] = 1) {
                $idsolicitud = mysqli_insert_id($conexion);
                $insertventa = "INSERT INTO ventas (id_alumno, id_producto, id_operador, id_solicitud, ven_precio) VALUES(?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertventa);
                $query->bind_param("iiiis",$datos['idalumno'], $datos['idproducto'],  $datos['idoperador'], $idsolicitud, $datos['precio'],);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }
    }
?>
<?php
    include "conexion.php";

    class Solicitudes extends Conexion {

        public function crearsolicitud($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO solicitudes (id_usuario, id_grado, rep_tipo, rep_detalle) VALUES(?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iiss", $datos['idusuario'], $datos['idgrado'], $datos['reptipo'], $datos['detalle']);
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

        public function detalleventa($idsolicitud){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                s.id_solicitud      AS idsolicitudu,
                s.id_usuario        AS idusuariou,
                s.id_grado          AS idgradou,
                s.id_operador       AS idoperadoru,
                s.rep_tipo          AS reptipou,
                s.rep_detalle       AS detalleu,
                s.rep_estado        AS estadou,
                u.user_nombre       AS usuariou
                FROM solicitudes AS s
                INNER JOIN usuarios AS u ON s.id_usuario = u.id_usuario
                WHERE s.id_solicitud ='$idsolicitud'";
            $respuesta = mysqli_query($conexion,$sql);
            $solicitud = mysqli_fetch_array($respuesta);
            $datos = array(
            'idsolicitudu' => $solicitud['idsolicitudu'],
            'idgradou' => $solicitud['idgradou'],
            'reptipou' => $solicitud['reptipou'],
            'detalleu' => $solicitud['detalleu'],
            'estadou' => $solicitud['estadou'],
            'usuariou' => $solicitud['usuariou'],
            );
            return $datos;
        }

        public function solucion($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE  solicitudes SET id_operador = ?, rep_estado = ?, rep_solucion = ? WHERE id_solicitud = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issi', $datos['idoperador'], $datos['estado'], $datos['solucion'], $datos['idsolicitud']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function ventas($datos){
            $conexion = Conexion::conectar();
            $insertventa = "INSERT INTO ventas (id_alumno, id_producto, id_operador, ven_precio) VALUES(?, ?, ?, ?)";
            $query = $conexion->prepare($insertventa);
            $query->bind_param('iiis', $datos['idalumno'], $datos['idproducto'], $datos['idoperador'], $datos['precio']);
            $respuesta = $query->execute();
            if ($$respuesta = 1) {
                $idventa = mysqli_insert_id($conexion);
                $insertarauditoria = "UPDATE solicitudes SET id_operador = ?, id_venta = ?, rep_estado = ?, rep_solucion = ? WHERE id_solicitud = ?";
                $query = $conexion->prepare($insertarauditoria);
                $query->bind_param('iissi', $datos['idoperador'], $idventa, $datos['estado'], $datos['solucion'], $datos['idsolicitudu']);
                $respuesta = $query->execute();
                if ($respuesta > 0) {
                    $fecha = date("Y-m-d");
                    $crearfactura = "INSERT INTO facturas (id_operador, id_alumno, id_producto, fac_valor, fac_fecope) VALUES (?, ?, ?, ?, ?)";
                    $query = $conexion->prepare($crearfactura);
                    $query->bind_param("iiiss", $datos['idoperador'], $datos['idalumno'], $datos['idproducto'], $datos['precio'], $fecha);
                    $respuesta = $query->execute();
                    $idfactura = $conexion->insert_id;
                    $insertauditoria = "INSERT INTO auditorias( id_operador, id_alumno, id_grado, id_producto, aud_valor, aud_abono, aud_numdoc) VALUES(?, ?, ?, ?, ?, ?, ?)";
                    $query = $conexion->prepare($insertauditoria);
                    $query->bind_param("iiissis",  $datos['idoperador'],  $datos['idalumno'],  $datos['idgradou'],  $datos['idproducto'],  $datos['precio'], $datos['precio'], $idfactura);
                    $respuesta = $query->execute();
                }
            }
            return $respuesta;
        }
    }
?>
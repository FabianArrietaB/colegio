<?php
    include "conexion.php";

    class Config extends Conexion {

        public function agregarparafiscal($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO parafiscales (id_tipo, par_nit, par_nombre) VALUES(?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iss", $datos['idtip'], $datos['nit'], $datos['nombre']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function agregarpais($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO pais (pais_nombre) VALUES(?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("s", $datos['nombre']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detalleparafiscal($idparafiscal){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                p.id_parafiscal AS idparafiscal,
                p.id_tipo       AS idtip,
                p.par_nit       AS nit,
                p.par_nombre    AS nombre
                FROM parafiscales AS p
                WHERE p.id_parafiscal ='$idparafiscal'";
            $respuesta = mysqli_query($conexion,$sql);
            $grados = mysqli_fetch_array($respuesta);
            $datos = array(
            'idparafiscal' => $grados['idparafiscal'],
            'nombre' => $grados['nombre'],
            'nit' => $grados['nit'],
            'idtip' => $grados['idtip']
            );
            return $datos;
        }

        public function editarparafiscal($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE parafiscales SET id_tipo = ?, par_nit = ?, par_nombre = ? WHERE id_parafiscal = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issi', $datos['idtip'], $datos['nombreu'], $datos['nitu'], $datos['idparafiscal']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

    }
?>
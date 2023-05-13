<?php
    include "conexion.php";

    class Config extends Conexion {

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

        public function agregarparafiscal($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO parafiscales (par_nombre) VALUES(?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("s", $datos['nombre']);
            $respuesta = $query->execute();
            return $respuesta;
        }

    }
?>
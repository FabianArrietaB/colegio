<?php
    include "conexion.php";

    class Productos extends Conexion {

        public function activarproducto($idproducto, $estado){
            $conexion = Conexion::conectar();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = "UPDATE productos SET pro_estado = ? WHERE id_producto = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estado, $idproducto);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

    }
?>
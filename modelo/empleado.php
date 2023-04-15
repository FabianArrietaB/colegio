<?php
    include "conexion.php";

    class Empleados extends Conexion {

        public function activarempleado($idempleado, $estado){
            $conexion = Conexion::conectar();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = "UPDATE empleados SET emp_estado = ? WHERE id_empleado = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estado, $idempleado);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>
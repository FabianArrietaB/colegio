<?php
    include "conexion.php";

    class usuarios extends Conexion {
        public function ingresar ($usuario, $password){
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM usuarios WHERE user_usuario = '$usuario' AND user_contra = '$password'";
            $respuesta = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($respuesta) > 0) {
                $datos = mysqli_fetch_array($respuesta);
                if ($datos['user_estado'] == 1) {
                    $_SESSION['usuario'] ['nombre'] = $datos['user_nombre'];
                    $_SESSION['usuario'] ['id']     = $datos['id_usuario'];
                    $_SESSION['usuario'] ['rol']    = $datos['id_rol'];
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        }
    }
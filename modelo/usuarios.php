<?php
    include "conexion.php";

    class usuarios extends Conexion {

        public function IngresoUsuario($usuario, $password){
            $conexion = Conexion::conectar();
             $sql =  "SELECT * FROM usuarios
                        WHERE user_usuario = '$usuario' AND user_contra = '$password'";
            $respuesta = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($respuesta) > 0){
                $datosUsuario = mysqli_fetch_array($respuesta);
                if($datosUsuario['user_estado'] == 1){
                    $_SESSION['usuario'] ['nombre'] = $datosUsuario['user_nombre'];
                    $_SESSION['usuario'] ['id'] = $datosUsuario['id_usuario'];
                    $_SESSION['usuario'] ['rol'] = $datosUsuario['id_rol'];
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function activarUsuario($idUsuario, $estado){
            $conexion = Conexion::conectar();
    
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
    
            $sql = "UPDATE usuarios 
                    SET activo = ?
                    WHERE id_usuarios = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estado, $idUsuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
    
    
        }

    }
<?php
    include "conexion.php";

    class Usuarios extends Conexion {

        public function ingresousuario($usuario, $password){
            $conexion = Conexion::conectar();
            $sql =  "SELECT * FROM usuarios WHERE user_usuario = '$usuario' AND user_contra = '$password'";
            $respuesta = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($respuesta) > 0){
                $datosUsuario = mysqli_fetch_array($respuesta);
                if($datosUsuario['user_estado'] == 1){
                    $_SESSION['usuario']['nombre'] = $datosUsuario['user_nombre'];
                    $_SESSION['usuario']['id'] = $datosUsuario['id_usuario'];
                    $_SESSION['usuario']['rol'] = $datosUsuario['id_rol'];
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function activarusuario($idusuario, $estado){
            $conexion = Conexion::conectar();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = "UPDATE usuarios SET user_estado = ? WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estado, $idusuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function agregarusuario($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO usuarios (id_rol, id_operador, user_usuario, user_nombre, user_contra, user_correo) VALUES( ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iissss", $datos['idRol'], $datos['idoperador'], $datos['usuario'], $datos['nombre'], $datos['password'], $datos['correo']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detalleusuario($idusuario){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                usuarios.id_usuario     AS idusuario,
                usuarios.user_usuario   AS usuario,
                usuarios.user_nombre    AS nombre,
                usuarios.user_correo    AS correo,
                usuarios.user_contra    AS password,
                usuarios.id_rol         AS idrol,
                roles.rol_nombre        AS rol
                FROM usuarios AS usuarios
                INNER JOIN roles AS roles ON usuarios.id_rol = roles.id_rol
                WHERE usuarios.id_usuario ='$idusuario'";
            $respuesta = mysqli_query($conexion,$sql);
            $usuario = mysqli_fetch_array($respuesta);
            $datos = array(
                'idusuario' => $usuario['idusuario'],
                'usuario'   => $usuario['usuario'],
                'nombre'    => $usuario['nombre'],
                'correo'    => $usuario['correo'],
                'idrol'     => $usuario['idrol'],
                'rol'       => $usuario['rol'],
            );
            return $datos;
        }

        public function editarusuario($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE usuarios SET id_rol = ?, user_usuario = ?, user_nombre = ?, user_correo = ?, user_contra = ? WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issssi', $datos['idrol'], $datos['usuario'], $datos['nombre'], $datos['correo'], $datos['password'], $datos['idusuario']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function eliminarusuario($idusuario){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM usuarios WHERE id_usuario=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idusuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>
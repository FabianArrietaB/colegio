<?php
    include "conexion.php";

    class Usuarios extends Conexion {

        public function ingresousuario($usuario, $password){
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
            $sql = "INSERT INTO usuarios (id_rol, user_usuario, user_nombre, user_contra, user_correo) VALUES(?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("issss", $datos['idRol'],
                                        $datos['usuario'],
                                        $datos['nombre'],
                                        $datos['password'],
                                        $datos['correo']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detalleusuario($idUsuario){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                    usuarios.id_usuarios AS idUsuarios,
                    usuarios.usuario AS nombreUsuario,
                    roles.nombre AS rol,
                    usuarios.id_rol AS idRol,
                    usuarios.ubicacion AS ubicacion,
                    usuarios.activo AS estado,
                    usuarios.id_persona AS idPersona,
                    persona.nombre AS nombrePersona,
                    persona.correo AS correo,
                    persona.telefono AS telefono,
                    persona.fecha_creacion AS fecha FROM
                usuarios AS usuarios
            INNER JOIN
                roles AS roles ON usuarios.id_rol = roles.id_rol 
            INNER JOIN
                persona AS persona ON usuarios.id_persona = persona.id_persona
            AND usuarios.id_usuarios ='$idUsuario'";
        
            $respuesta = mysqli_query($conexion,$sql);
            $usuario = mysqli_fetch_array($respuesta);

            $datos = array(
            'idUsuarios' => $usuario['idUsuarios'],
            'nombreUsuario' => $usuario['nombreUsuario'],
            'rol' => $usuario['rol'],
            'idRol' => $usuario['idRol'],
            'ubicacion' => $usuario['ubicacion'],
            'estado' => $usuario['estado'],
            'idPersona' => $usuario['idPersona'],
            'nombrePersona' => $usuario['nombrePersona'],
            'fecha' => $usuario['fecha'],
            'correo' => $usuario['correo'],
            'telefono' => $usuario['telefono'] 
            );
            return $datos;
        }
    
        public function editarusuario($datos){
            $conexion = Conexion::conectar();
            $exitoPersona = self::actualizarPersona($datos);

            if($exitoPersona){
                $sql = "UPDATE usuarios SET id_rol = ?,
                                                usuario = ?,
                                                ubicacion = ?
                        WHERE id_usuarios = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('issi', $datos['idRol'],
                                            $datos['usuario'],
                                            $datos['ubicacion'],
                                            $datos['idUsuarios']);  
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            }else{
                return 0;
            }
        }
    }
?>
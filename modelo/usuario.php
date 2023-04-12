<?php
    include "conexion.php";

    class usuarios extends Conexion {
        public function ingresar ($usuario, $password){
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM usuarios WHERE user_usuario = 'usuario' AND user_contra = 'password'";
        }
    }
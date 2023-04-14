<?php
    include "../../modelo/usuarios.php";
    $Usuarios = new Usuarios();
    $datos = array(
        "password" => md5($_POST['newpassword']),
        "idusuario" =>$_POST['idusuario']
    );
    echo $Usuarios->cambiocontraseña($datos);
?>
<?php
    include "../../modelo/usuarios.php";
    $Usuarios = new Usuarios();
    $datos = array(
        "password" => md5($_POST['newpassword']),
        "idusuario" =>$_POST['idusuariou']
    );
    echo $Usuarios->cambiocontraseña($datos);
?>
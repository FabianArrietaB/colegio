<?php
    $datos = Array(
        'idusuario' => $_POST['idusuario'],
        'usuario'   => $_POST['usuariou'],
        'nombre'    => $_POST['nombreu'],
        'correo'    => $_POST['correou'],
        'fecha'     => $_POST['fechau'],
        'idRol'     => $_POST['idRolu'],
    );
    include "../../modelo/usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->editarusuario($datos);
?>
<?php
    $datos = Array(
        'idusuario' => $_POST['idusuario'],
        'nombre'    => $_POST['nombreu'],
        'fecha'     => $_POST['fechau'],
        'telefono'  => $_POST['telefonou'],
        'correo'    => $_POST['correou'],
        'usuario'   => $_POST['usuariou'],
        'idRol'     => $_POST['idRolu'],
        'ubicacion' => $_POST['ubicacionu']
    );

    include "../../modelo/usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->editarusuario($datos);
?>
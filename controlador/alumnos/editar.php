<?php
    $datos = Array(
        'idalumno' => $_POST['idalumno'],
        'nombre'    => $_POST['nombreu'],
        'correo'    => $_POST['correou'],
        'fecha'     => $_POST['fechau'],
        'idRol'     => $_POST['idRolu'],
    );
    include "../../modelo/usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->editarusuario($datos);
?>
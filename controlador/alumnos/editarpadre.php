<?php
    session_start();
    $datos = array(
        'idacudiente' => $_POST['idacudiente'],
        'idoperador' => $_SESSION['usuario']['id'],
        'idalumno' => $_POST['idalumno'],
        "nombre" => $_POST['nombreu'],
        "cladoc" => $_POST['cladocu'],
        "docume" => $_POST['documeu'],
        "ciudad" => $_POST['ciudadu'],
        "direcc" => $_POST['direccu'],
        "estrat" => $_POST['estratu'],
        "telcel" => $_POST['telcelu'],
        "correo" => $_POST['correou'],
    );
    include "../../modelo/alumnos.php";
    $Alumnos   = new Alumnos();
    echo $Alumnos->editaracudiente($datos);
?>
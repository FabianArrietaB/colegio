<?php
    session_start();
    $datos = array(
        'idacudiente' => $_POST['idacudiente'],
        'idoperador' => $_SESSION['usuario']['id'],
        'alumnoid' => $_POST['alumnoid'],
        "nombre" => $_POST['padnombreu'],
        "cladoc" => $_POST['padcladocu'],
        "docume" => $_POST['paddocumeu'],
        "ciudad" => $_POST['padciudadu'],
        "direcc" => $_POST['paddireccu'],
        "estrat" => $_POST['padestratu'],
        "telcel" => $_POST['padtelcelu'],
        "correo" => $_POST['padcorreou'],
    );
    include "../../modelo/alumnos.php";
    $Alumnos   = new Alumnos();
    echo $Alumnos->editaracudiente($datos);
?>
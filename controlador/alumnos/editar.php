<?php
    session_start();
    $datos = array(
        'idoperador' => $_SESSION['usuario']['id'],
        'idalumno' => $_POST['idalumno'],
        "nombre" => $_POST['alunombreu'],
        "cladoc" => $_POST['alucladocu'],
        "docume" => $_POST['aludocumeu'],
        "fecnac" => $_POST['alufecnacu'],
        "sexo"   => $_POST['alusexou'],
        "gposan" => $_POST['alugposanu'],
        "factrh" => $_POST['alufactrhu'],
        "telcel" => $_POST['alutelcelu'],
        "ciudad" => $_POST['aluciudadu'],
        "direcc" => $_POST['aludireccu'],
        "estrat" => $_POST['aluestratu'],
        "correo" => $_POST['alucorreou'],
        "idgrado" => $_POST['idgradou'],
    );
    include "../../modelo/alumnos.php";
    $Alumnos   = new Alumnos();
    echo $Alumnos->editaralumno($datos);
?>
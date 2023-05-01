<?php
    $datos = array(
        'idalumno' => $_POST['idalumno'],
        "nombre" => $_POST['nombreu'],
        "cladoc" => $_POST['cladocu'],
        "docume" => $_POST['documeu'],
        "fecnac" => $_POST['fecnacu'],
        "sexo"   => $_POST['sexou'],
        "gposan" => $_POST['gposanu'],
        "factrh" => $_POST['factrhu'],
        "telcel" => $_POST['telcelu'],
        "ciudad" => $_POST['ciudadu'],
        "direcc" => $_POST['direccu'],
        "estrat" => $_POST['estratu'],
        "correo" => $_POST['correou'],
        "idgrado" => $_POST['idgradou'],
    );
    include "../../modelo/alumnos.php";
    $Alumnos   = new Alumnos();
    echo $Alumnos->editaralumno($datos);
?>
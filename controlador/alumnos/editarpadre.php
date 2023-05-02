<?php
    $datos = array(
        'idacudiente' => $_POST['idacudiente'],
        "nombre" => $_POST['nombreu'],
        "cladoc" => $_POST['cladocu'],
        "docume" => $_POST['documeu'],
        "ciudad" => $_POST['ciudadu'],
        "direcc" => $_POST['direccu'],
        "estrat" => $_POST['estratu'],
        "telcel" => $_POST['telcelu'],
        "correo" => $_POST['correou'],
        "idgrado" => $_POST['idgradou'],
        "nomalu" => $_POST['nomalu'],
    );
    include "../../modelo/alumnos.php";
    $Alumnos   = new Alumnos();
    echo $Alumnos->editaralumno($datos);
?>
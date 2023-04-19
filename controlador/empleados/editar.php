<?php
    $datos = Array(
        'idempleado' => $_POST['idempleado'],
        "nombre" => $_POST['nombreu'],
        "cladoc" => $_POST['cladocu'],
        "docume" => $_POST['documeu'],
        "fecnac" => $_POST['fecnacu'],
        "sexo"   => $_POST['sexou'],
        "factrh" => $_POST['factrhu'],
        "gposan" => $_POST['gposanu'],
        "estciv" => $_POST['estcivu'],
        "escola" => $_POST['escolau'],
        "hijos"  => $_POST['hijosu'],
        "telcel" => $_POST['telcelu'],
        "ciudad" => $_POST['ciudadu'],
        "direcc" => $_POST['direccu'],
        "estrat" => $_POST['estratu'],
        "correo" => $_POST['correou'],
        "cargo"  => $_POST['cargou'],
        "tipcon" => $_POST['tipconu'],
        "salari" => $_POST['salariu'],
        "codeps" => $_POST['codepsu'],
        "codarl" => $_POST['codarlu'],
        "conpen" => $_POST['conpenu'],
        "codces" => $_POST['codcesu'],
    );
    include "../../modelo/empleados.php";
    $Empleados   = new Empleados();
    echo $Empleados->editarempleado($datos);
?>
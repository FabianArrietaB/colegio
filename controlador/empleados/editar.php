<?php
    $datos = Array(
        'idempleado' => $_POST['idempleado'],
        "nombre" => $_POST['nombreu'],
        "cladoc" => $_POST['cladocu'],
        "docume" => $_POST['documeu'],
        "cargo"  => $_POST['cargou'],
        "ciudad" => $_POST['ciudadu'],
        "direcc" => $_POST['direccu'],
        "estrat" => $_POST['estratu'],
        "correo" => $_POST['correou'],
        "tipcon" => $_POST['tipconu'],
        "salari" => $_POST['salariu'],
        "codces" => $_POST['codcesu'],
        "codeps" => $_POST['codepsu'],
        "conpen" => $_POST['conpenu'],
        "codarl" => $_POST['codarlu'],
        "sexo"   => $_POST['sexou'],
        "estciv" => $_POST['estcivu'],
        "escola" => $_POST['escolau'],
        "gposan" => $_POST['gposanu'],
        "factrh" => $_POST['factrhu'],
        "hijos"  => $_POST['hijosu'],
        "fecha"  => $_POST['fechau'],
        );
    include "../../modelo/empleados.php";
    $Empleados   = new Empleados();
    echo $Empleados->editarempleado($datos);
?>
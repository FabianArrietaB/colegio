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
        "nommad" => $_POST['nommadu'],
        "cldoma" => $_POST['cldomau'],
        "docmad" => $_POST['docmadu'],
        "telmad" => $_POST['telmadu'],
        "ciumad" => $_POST['ciumadu'],
        "dirmad" => $_POST['dirmadu'],
        "cormad" => $_POST['cormadu'],
        "nompad" => $_POST['nompadu'],
        "cldopa" => $_POST['cldopau'],
        "docpad" => $_POST['docpadu'],
        "telpad" => $_POST['telpadu'],
        "ciupad" => $_POST['ciupadu'],
        "dirpad" => $_POST['dirpadu'],
        "corpad" => $_POST['corpadu'],
        "idgrado" => $_POST['idgradou'],
    );
    include "../../modelo/alumnos.php";
    $Alumnos   = new Alumnos();
    echo $Alumnos->editaralumno($datos);
?>
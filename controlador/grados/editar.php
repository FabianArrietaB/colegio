<?php
    $datos = Array(
        'idgrado' => $_POST['idgrado'],
        'nombre'  => $_POST['nombreu'],
        'canalu'  => $_POST['canaluu'],
        'iddir'   => $_POST['iddiru'],
        'matric'  => $_POST['matricu'],
        'pensio'  => $_POST['pensiou'],
        'fecha'   => $_POST['fechau'],
    );
    include "../../modelo/grados.php";
    $Grados = new Grados();
    echo $Grados->editargrado($datos);
?>
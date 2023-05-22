<?php
    session_start();
    $datos = array(
        'idoperador' => $_SESSION['usuario']['id'],
        'idgrado' => $_POST['idgrado'],
        'nombre'  => $_POST['nombreu'],
        'canalu'  => $_POST['canaluu'],
        'iddir'   => $_POST['iddiru'],
        'matric'  => $_POST['matricu'],
        'pensio'  => $_POST['pensiou'],
    );
    include "../../modelo/grados.php";
    $Grados = new Grados();
    echo $Grados->editargrado($datos);
?>
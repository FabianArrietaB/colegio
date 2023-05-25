<?php
    $datos = array(
        'idparafiscal' => $_POST['idparafiscal'],
        'nombre'       => $_POST['nombreu'],
        'nit'          => $_POST['nitu'],
        'idtip'        => $_POST['idtipu'],
    );
    include "../../modelo/config.php";
    $Parafiscal = new Config();
    echo $Parafiscal->editarparafiscal($datos);
?>
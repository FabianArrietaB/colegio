<?php
    $datos = array(
        'idparafiscal' => $_POST['idparafiscal'],
        'idtip'        => $_POST['idtipu'],
        'nit'          => $_POST['nitu'],
        'codigo'       => $_POST['codigou'],
        'nombre'       => $_POST['nombreu'],
        'regimen'      => $_POST['regimenu'],
    );
    include "../../modelo/config.php";
    $Parafiscal = new Config();
    echo $Parafiscal->editarparafiscal($datos);
?>
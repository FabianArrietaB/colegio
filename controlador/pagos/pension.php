<?php
    session_start();
    $datos = Array(
        'idoperador'  => $_SESSION['usuario']['id'],
        'idmatriculau'=> $_POST['idmatriculau'],
        'idalumnou'   => $_POST['idalumnou'],
        "idgradou"    => $_POST['idgradou'],
        'mes'         => $_POST['mesu'],
        'pension'     => $_POST['pensionu'],
        'fecpen'      => $_POST['fecpenu'],
        'fecpro'      => $_POST['fecpro'],
    );
    include "../../modelo/pagos.php";
    $Pagos = new Pagos();
    echo $Pagos->pagopension($datos);
?>
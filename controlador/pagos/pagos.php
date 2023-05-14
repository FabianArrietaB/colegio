<?php
    $datos = Array(
        'idmatricula'  => $_POST['idmatricula'],
        'idalumno'  => $_POST['idalumno'],
        'nomalu'    => $_POST['nomaluu'],
        'idgrado'   => $_POST['idgradou'],
        'matricula' => $_POST['matriculau'],
        'saldo'     => $_POST['saldou'],
    );
    include "../../modelo/pagos.php";
    $Pagos = new Pagos();
    echo $Pagos->pagomatricula($datos);
?>
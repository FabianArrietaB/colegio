<?php
    $datos = Array(
        'idmatricula'=> $_POST['idmatricula'],
        'idalumno'   => $_POST['idalumno'],
        'abono'      => $_POST['abonou'],
        'saldo'      => $_POST['saldou'],
        'detall'     => $_POST['detallu'],
    );
    include "../../modelo/pagos.php";
    $Pagos = new Pagos();
    echo $Pagos->pagomatricula($datos);
?>
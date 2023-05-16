<?php
    $datos = Array(
        'idmatricula'=> $_POST['idmatricula'],
        'idalumno'   => $_POST['idalumno'],
        "idgrado"    => $_POST['idgrado'],
        'detall'     => $_POST['detallu'],
        'abono'      => $_POST['abonou'],
        'matricula'  => $_POST['matriculau'],
        'balance'    => $_POST['balanceu'],
    );
    include "../../modelo/pagos.php";
    $Pagos = new Pagos();
    echo $Pagos->pagomatricula($datos);
?>
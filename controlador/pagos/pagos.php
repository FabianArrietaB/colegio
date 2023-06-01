<?php
    session_start();
    $datos = Array(
        'idoperador' => $_SESSION['usuario']['id'],
        'idmatricula'=> $_POST['idmatricula'],
        'idalumno'   => $_POST['idalumno'],
        "idgrado"    => $_POST['idgrado'],
        'idtippago'  => $_POST['idtippagou'],
        'abono'      => $_POST['abonou'],
        'matricula'  => $_POST['matriculau'],
        'balance'    => $_POST['balanceu'],
        'fecmat'    => $_POST['fecmatu'],
        'fecpro'      => $_POST['fecpro'],
    );
    include "../../modelo/pagos.php";
    $Pagos = new Pagos();
    echo $Pagos->pagomatricula($datos);
?>
<?php
    session_start();
    $datos = Array(
        'idoperador' => $_SESSION['usuario']['id'],
        'matriculaid'=> $_POST['matriculaid'],
        'alumnoid'   => $_POST['alumnoid'],
        "gradoid"    => $_POST['gradoid'],
        'idtippago'  => $_POST['idtippagou'],
        'avance'      => $_POST['avanceu'],
        'pension'  => $_POST['pensionu'],
        'diferencia'    => $_POST['diferenciau'],
        'fecpen'    => $_POST['fecpenu'],
    );
    include "../../modelo/pagos.php";
    $Pagos = new Pagos();
    echo $Pagos->pagopension($datos);
?>
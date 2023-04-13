<?php
    include "../../modelo/usuarios.php";
    $idusuario = $_POST['idusuario'];
    $Usuarios = new Usuarios();
    echo json_encode($Usuarios->detalleusuario($idusuario));
?>
<?php
    include "../../modelo/usuarios.php";
    $Usuarios = new Usuarios();
    $idusuario = $_POST['idusuario'];
    echo json_encode($Usuarios->detalleusuario($idusuario));
?>
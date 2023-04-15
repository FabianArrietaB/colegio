<?php
    include "../../modelo/productos.php";
    $Productos   = new Productos();
    $idproducto  = $_POST['idproducto'];
    $estado     = $_POST['estado'];
    echo $Productos->activarproducto($idproducto, $estado);
?>
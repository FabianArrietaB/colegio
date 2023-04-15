<?php
    include "../../modelo/productos.php";
    $Productos = new Productos();
    $idproducto = $_POST['idproducto'];
    echo json_encode($Productos->detalleproducto($idproducto));
?>
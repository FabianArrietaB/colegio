<?php
    $idproducto = $_POST['idproducto'];
    include "../../modelo/productos.php";
    $Productos = new Productos();
    echo json_encode($Productos->llenarProducto($idproducto));
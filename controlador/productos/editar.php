<?php
    $datos = Array(
        'idproducto' => $_POST['idproducto'],
        'nombre'     => $_POST['nombreu'],
        'idcat'      => $_POST['idcatu'],
        'precio'     => $_POST['preciou'],
    );
    include "../../modelo/productos.php";
    $Productos = new Productos();
    echo $Productos->editarproducto($datos);
?>
<?php
    $datos = Array(
        'idproducto' => $_POST['idproducto'],
        'nombre'    => $_POST['nombreu'],
        'idcat'    => $_POST['idcatu'],
        'precio'     => $_POST['preciou'],
        'fecha'     => $_POST['fechau'],
    );
    include "../../modelo/productos.php";
    $Productos = new Productos();
    echo $Productos->editarproducto($datos);
?>
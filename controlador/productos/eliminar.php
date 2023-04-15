<?php
    include "../../modelo/productos.php";
    $Productos   = new Productos();
    $idproducto  = $_POST['idproducto'];
    echo $Productos->eliminarproducto($idproducto);
?>
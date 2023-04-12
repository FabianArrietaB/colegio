<?php
    include "Conexion.php";

    public function agregarproducto{
        $sql = "INSERT INTO productos (pro_nombre, pro_catego, pro_precio) VALUES (?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(sss)
    }
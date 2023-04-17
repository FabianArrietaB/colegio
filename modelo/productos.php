<?php
    include "conexion.php";

    class Productos extends Conexion {

        public function activarproducto($idproducto, $estado){
            $conexion = Conexion::conectar();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = "UPDATE productos SET pro_estado = ? WHERE id_producto = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estado, $idproducto);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function agregarproducto($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO productos (id_categoria, pro_nombre, pro_precio ) VALUES(?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iss", $datos['idcat'], $datos['nombre'], $datos['precio']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detalleproducto($idproducto){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                productos.id_producto   AS idproducto,
                productos.pro_nombre    AS nombre,
                productos.pro_precio    AS precio,
                productos.pro_estado    AS estado,
                productos.pro_fecope    AS fecha,
                categorias.id_categoria AS idcat,
                categorias.cat_nombre   AS catego
                FROM productos AS productos
                INNER JOIN categorias AS categorias ON productos.id_categoria = categorias.id_categoria
                WHERE productos.id_producto ='$idproducto'";
            $respuesta = mysqli_query($conexion,$sql);
            $productos = mysqli_fetch_array($respuesta);
            $datos = array(
            'idproducto' => $productos['idproducto'],
            'nombre' => $productos['nombre'],
            'precio' => $productos['precio'],
            'precio' => $productos['precio'],
            'idcat' => $productos['idcat'],
            'catego' => $productos['catego'],
            'fecha' => $productos['fecha']
            );
            return $datos;
        }

        public function editarproducto($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE productos SET id_categoria = ?, pro_nombre = ?, pro_precio = ?, pro_fecupd = ? WHERE id_producto = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('isssi', $datos['idcat'], $datos['nombre'], $datos['precio'], $datos['fecha'], $datos['idproducto']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function eliminarproducto($idproducto){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM productos WHERE id_producto=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idproducto);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

    }
?>
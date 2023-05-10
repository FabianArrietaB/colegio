<?php
    session_start();
    //Consulta//
    if ($_SESSION['usuario']['rol'] == 4) {
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT
        productos.id_producto   AS idproducto,
        productos.pro_nombre    AS nombre,
        productos.pro_precio    AS precio,
        productos.pro_estado    AS estado,
        productos.pro_fecope    AS fecha,
        categorias.id_categoria AS idcat,
        categorias.cat_nombre   AS catego
        FROM productos AS productos
        INNER JOIN categorias AS categorias ON productos.id_categoria = categorias.id_categoria
        ORDER BY productos.id_producto ASC";
    $query = mysqli_query($conexion, $sql);
} else {
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT
        productos.id_producto   AS idproducto,
        productos.pro_nombre    AS nombre,
        productos.pro_precio    AS precio,
        productos.pro_estado    AS estado,
        productos.pro_fecope    AS fecha,
        categorias.id_categoria AS idcat,
        categorias.cat_nombre   AS catego
        FROM productos AS productos
        INNER JOIN categorias AS categorias ON productos.id_categoria = categorias.id_categoria
        WHERE productos.id_producto = 1
        ORDER BY productos.id_producto ASC";
    $query = mysqli_query($conexion, $sql);
}
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light  text-center">
    <thead>
        <tr>
            <th scope="col" >Nombres</th>
            <th scope="col" >Categoria</th>
            <th scope="col" >Precio</th>
            <th>Estado</th>
            <th>
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php
        while ($productos = mysqli_fetch_array($query)){
    ?>
        <tr>
            <td> <?php echo $productos['nombre']; ?> </td>
            <td> <?php echo $productos['catego']; ?></td>
            <td> <?php echo $productos['precio']; ?></td>
            <td>
                <?php
                    if ($productos['estado'] == 0) {
                ?>
                    <button class="btn btn-danger btn-sm" onclick="activarproducto(
                        <?php echo $productos['idproducto'] ?>,
                        <?php echo $productos['estado'] ?>)">
                            INACTIVO
                        </button>
                    <?php
                    } else if ($productos['estado'] == 1) {
                    ?>
                        <button class="btn btn-success btn-sm" onclick="activarproducto(
                            <?php echo $productos['idproducto'] ?>,
                            <?php echo $productos['estado'] ?>)">
                            ACTIVO
                        </button>
                    <?php
                    }
                    ?>
            </td>
            <td>
                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#editar" onclick="detalleproducto('<?php echo $productos['idproducto']?>')"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                <?php if($_SESSION['usuario']['rol'] == 4) {?> <button type="button" class="btn btn-danger"  onclick="eliminarproducto('<?php echo $productos['idproducto']?>')"><i class="fa-regular fa-trash-can fa-beat fa-xl"></i></button>  <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- fin de la tabla -->
<!-- carga ficheros -->

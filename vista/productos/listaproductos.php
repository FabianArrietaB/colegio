<?php
    session_start();
    //Consulta//
    if ($_SESSION['usuario']['rol'] == 4) {
    $filtro = '';
    if(isset($_GET['filtro'])){
        $filtro = $_GET['filtro'];
    }
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        p.id_producto   AS idproducto,
        p.pro_nombre    AS nombre,
        p.pro_precio    AS precio,
        p.pro_estado    AS estado,
        p.pro_fecope    AS fecha,
        c.id_categoria AS idcat,
        c.cat_nombre   AS catego
        FROM productos AS p
        LEFT JOIN categorias AS c ON p.id_categoria = c.id_categoria
        WHERE p.pro_nombre LIKE '%$filtro%'|| c.cat_nombre LIKE '%$filtro%'
        ORDER BY p.id_producto ASC";
    $query = mysqli_query($conexion, $sql);
} else {
    $filtro = '';
    if(isset($_GET['filtro'])){
        $filtro = $_GET['filtro'];
    }
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT
        p.id_producto   AS idproducto,
        p.pro_nombre    AS nombre,
        p.pro_precio    AS precio,
        p.pro_estado    AS estado,
        p.pro_fecope    AS fecha,
        c.id_categoria AS idcat,
        c.cat_nombre   AS catego
        FROM productos AS p
        LEFT JOIN categorias AS c ON p.id_categoria = c.id_categoria
        WHERE p.id_producto = 1
        AND WHERE p.pro_nombre LIKE '%$filtro%'|| c.cat_nombre LIKE '%$filtro%'
        ORDER BY p.id_producto ASC";
    $query = mysqli_query($conexion, $sql);
}
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center" id="Recargar">
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
</div>
<!-- fin de la tabla -->
<!-- carga ficheros -->

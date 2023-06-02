<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        f.id_facturas  as idfactura,
        f.id_alumno    as idalumno,
        a.alu_nombre   as alumno,
        f.id_producto  as idproducto,
        p.pro_nombre   as producto,
        f.id_tippag    as idtipago,
        f.fac_precio   as precio,
        f.fac_detalle  as detalle,
        f.fac_fecha    as fecha
        FROM facturas AS f
        LEFT JOIN alumnos as a ON f.id_alumno = a.id_alumno
        LEFT JOIN productos as p ON f.id_producto = p.id_producto";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="card border-primary">
    <div class="card-header text-center">
        <div class="row">
            <div class="col-9">
                <div class="title">
                    <h2>INFORME Facturas</h2>
                </div>
            </div>
            <div class="col-3">
                <div class="card border-danger text-white bg-primary mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="fa-solid fa-sack-dollar fa-3x"></i>
                            </div>
                            <div class="col-sm-8">
                                <div class="float-sm-right">&nbsp;
                                    <span style="font-size: 20px">
                                    <?php
                                        $sql=$conexion->query("SELECT SUM(fac_precio) as 'precio' from facturas");
                                        $data = mysqli_fetch_array($sql);
                                        $precio = $data['precio'];
                                        echo '$'. $precio;
                                    ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" ># Factura</th>
                <th scope="col" >Alumno</th>
                <th scope="col" >Producto</th>
                <th scope="col" >Precio</th>
                <th scope="col" >Detalle</th>
                <th scope="col" >Fecha</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($facturas = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $facturas['idfactura']; ?> </td>
                <td> <?php echo $facturas['alumno']; ?> </td>
                <td>
                    <?php if ($facturas['idproducto'] > 0) {
                            echo $facturas['producto'];
                    } else {  ?>
                    <?php if ($facturas['idtipago'] == 1) { ?>
                        <span class="badge text-bg-info">ABONO MATRICULA</span>
                    <?php } else if ($facturas['idtipago'] == 2) { ?>
                        <span class="badge text-bg-success">PAGO TOTAL MATRICULA</span>
                    <?php } else if ($facturas['idtipago'] == 3) { ?>
                        <span class="badge text-bg-warning">ABONO PENSION</span>
                    <?php } else if ($facturas['idtipago'] == 4) { ?>
                        <span class="badge text-bg-danger">PAGO TOTAL PENSION</span>
                    <?php }
                    }
                    ?>
                </td>
                <td> <?php echo $facturas['precio']; ?> </td>
                <td> <?php echo $facturas['detalle']; ?> </td>
                <td> <?php echo $facturas['fecha']; ?> </td>
                <td>
                <div class="d-grid gap-2">
                    <input type="button" class="btn btn-info" value="Vista" onclick="detallefactura('<?php echo $ventas['idalumno']?>')"></input>
                </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
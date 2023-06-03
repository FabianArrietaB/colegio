<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        f.id_facturas as idfacturas,
        f.id_operador as idoperador,
        CONCAT(f.fac_prefijo, ' ' ,f.id_facturas) as factura,
        f.id_alumno   as idalumno,
        f.id_acudiente as idacudiente,
        f.id_producto  as idproducto,
        f.fac_valor as precio,
        f.fac_detalle as detalle,
        f.fac_fecope as fecha
        FROM facturas AS f
        ORDER BY f.id_facturas ASC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="card border-primary">
    <div class="card-header text-center">
        <div class="row">
            <div class="col-9">
                <div class="title">
                    <h2>INFORME VENTAS</h2>
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
                                        $sql=$conexion->query("SELECT SUM(fac_valor) as 'precio' from facturas");
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
                <th scope="col" >#Factura</th>
                <th scope="col" >Producto</th>
                <th scope="col" >Valor</th>
                <th scope="col" >Vendedor</th>
                <th scope="col" >fecha</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($facturas = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $facturas['factura']; ?> </td>
                <td> <?php echo $facturas['idproducto']; ?> </td>
                <td> <?php echo $facturas['precio']; ?> </td>
                <td> <?php echo $facturas['idoperador']; ?> </td>
                <td> <?php echo $facturas['fecha']; ?> </td>
                <td>
                <div class="d-grid gap-2">
                    <input type="button" class="btn btn-info" value="Reporte" onclick="detallefactura('<?php echo $facturas['idalumno']?>')"></input>
                </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $idalumno = '';
    $desde = '';
    $hasta = '';
    $modulo = '';
    if(isset($_GET['idalumno']) && $_GET['modulo'] && $_GET['desde'] && $_GET['hasta']){
        $idalumno = $_GET['idalumno'];
        $modulo = $_GET['modulo'];
        $desde = $_GET['desde'];
        $hasta = $_GET['hasta'];
    }
    $sql = "SELECT
        f.id_operador as idoperador,
        u.user_nombre as vendedor,
        f.fac_prefijo as prefijo,
        f.id_facturas as factura,
        f.id_producto  as idproducto,
        p.pro_nombre as producto,
        f.id_tippag as tippag,
        f.fac_detalle as detalle,
        f.fac_valor as precio,
        f.fac_fecope as fecha
        FROM facturas AS f
        LEFT JOIN alumnos as a ON a.id_alumno = f.id_alumno
        LEFT JOIN productos as p ON p.id_producto = f.id_producto
        LEFT JOIN usuarios as u ON u.id_usuario = f.id_operador
        WHERE f.id_alumno = '$idalumno'";
        if ($modulo != 'Todos') {
            $sql .= " AND f.id_tippag = '$modulo'";
        }
        if ($desde != '' && $hasta != '') {
            $sql .= " AND f.fac_fecope BETWEEN '$desde' AND '$hasta'";
        }
        $sql ." ORDER BY f.id_facturas ASC";
        $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center">
        <thead>
            <tr>
            <th scope="col" >Factura</th>
            <th scope="col" >Fecha Documento</th>
            <th scope="col" >Tipo Producto</th>
            <th scope="col" >Detalle</th>
            <th scope="col" >Valor</th>
            <th scope="col" >Operador</th>
            </tr>
        </thead>
        <tbody >
        <?php
            while ($facturas = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $facturas['prefijo'] . ' - ' .str_pad($facturas['factura'], 6, "0", STR_PAD_LEFT); ?> </td>
                <td> <?php echo $facturas['fecha']; ?> </td>
                <td>
                    <?php if ($facturas['producto'] <> 0) {
                        echo $facturas['producto'];
                    } else {
                        if ($facturas['tippag'] == 1) { ?>
                            <span>PAGO MATRICULA</span>
                        <?php } else if ($facturas['tippag'] == 2) { ?>
                            <span>PAGO PENSION</span>
                        <?php } ?>
                    <?php } ?>
                </td>
                <td> <?php echo $facturas['detalle']; ?> </td>
                <td> <?php echo '$ '. number_format($facturas['precio']); ?> </td>
                <td> <?php echo $facturas['vendedor']; ?> </td>
                
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
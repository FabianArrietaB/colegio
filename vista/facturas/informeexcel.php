<?php
/* Connect To Database*/
require_once ("../../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
$con = new Conexion();
$conexion = $con->conectar();
//Valores Consulta
$modulo = ($_GET['modulo']);
$idalumno =  ($_GET['idalumno']);
$desde = ($_GET['desde']);
$hasta = ($_GET['hasta']);
//Consulta Modulo
if ($modulo == 'Todos'){
    $detalle = 'general';
} else if ($modulo =='0'){
    $detalle = 'ventas';
} else if ($modulo =='1'){
    $detalle = 'matricula';
} else if ($modulo =='2'){
    $detalle = 'pension';
}
$sql = "SELECT
    f.id_operador as idoperador,
    u.user_nombre as vendedor,
    f.fac_prefijo as prefijo,
    f.id_facturas as factura,
    a.alu_nombre  as nomalu,
    f.id_producto  as idproducto,
    p.pro_nombre as producto,
    f.fac_cantidad as cantidad,
    f.id_tippag as tippag,
    f.fac_forpag as forpag,
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
    $query = mysqli_query($conexion, $sql);
    $sqlalumno = "SELECT
    a.alu_nombre  as nomalu
    FROM alumnos AS a
    WHERE a.id_alumno = '$idalumno'";
    $rwalumno = mysqli_query($conexion, $sqlalumno);
    $alumno = mysqli_fetch_array($rwalumno);

    $dataTable = '';
    $dataTable .='<table class="table">
                    <thead>
                        <tr>
                            <th>ITEM</th>
                            <th>FACTURA</th>
                            <th>CANTIDAD</th>
                            <th>VALOR</th>
                            <th>DETALLE</th>
                            <th>FECHA</th>
                            <th>TIPO PAGO</th>
                            <th>VENDEDOR</th>
                        </tr>
                    </thead>
                    <tbody>';
                    $i = 0;
                    while ($facturas = mysqli_fetch_array($query)){
                            $i++;
                            $factura =  $facturas['prefijo'] . ' - ' .str_pad($facturas['factura'], 6, "0", STR_PAD_LEFT) ;
                            $cantidad = $facturas['cantidad'];
                            $valor =    number_format($facturas['precio'], 2);
                            $detalle =  $facturas['detalle'];
                            $fecha   =  $facturas['fecha'];
                            $forpag  =  $facturas['forpag'];
                            $vendedor =  $facturas['vendedor'];
                            $dataTable .='
                            <tr>
                                <td>'.$i.'</td>
                                <td>'.$factura.'</td>
                                <td>'.$cantidad.'</td>
                                <td>'.$valor.'</td>
                                <td>'.$detalle.'</td>
                                <td>'.$fecha.'</td>
                                <td>'.$forpag.'</td>
                                <td>'.$vendedor.'</td>
                            </tr>';
                        }
    $dataTable .= '  </tbody>
                </table>';
    $filename = "exported-data-".date('d-m-Y H:i:s').".xls";
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename='.$filename);
    echo $dataTable;
?>
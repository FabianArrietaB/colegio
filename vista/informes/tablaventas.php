<?php
    session_start();
    $filtro = '';
    if(isset($_GET['filtro'])){
        $filtro = $_GET['filtro'];
    }
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        v.id_venta    as idventa,
        v.id_alumno   as idalumno,
        a.alu_nombre  as alumno,
        v.id_producto as idproducto,
        p.pro_nombre  as producto,
        g.gra_nombre  as grado,
        v.ven_precio  as precio,
        SUM(ven_precio) as vtventas,
        v.ven_fecope  as fecope
        FROM ventas AS v
        LEFT JOIN alumnos AS a ON v.id_alumno = a.id_alumno
        LEFT JOIN productos AS p ON v.id_producto = p.id_producto
        LEFT JOIN grados AS g ON a.id_grado = g.id_grado
        WHERE a.alu_nombre LIKE '%$filtro%'|| a.alu_docume LIKE '%$filtro%'
        GROUP BY v.id_alumno
        ORDER BY v.id_venta ASC";
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
                                        $sql=$conexion->query("SELECT SUM(ven_precio) as 'precio' from ventas");
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
                <th scope="col" >Alumno</th>
                <th scope="col" >Grado</th>
                <th scope="col" >Grado</th>
                <th scope="col" >Precio</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($ventas = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $ventas['alumno']; ?> </td>
                <td> <?php echo $ventas['grado']; ?> </td>
                <td> <?php echo $ventas['vtventas']; ?> </td>
                <td>
                <div class="d-grid gap-2">
                    <input type="button" class="btn btn-info" value="Reporte" onclick="detalleventa('<?php echo $ventas['idalumno']?>')"></input>
                </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div id="conte-modal-venta"></div>
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
        au.id_auditoria as idpension,
        au.id_alumno  as idalumno,
        au.id_grado  as idgrado,
        au.id_tipopago as tippag,
        au.aud_numdoc as idfacturas,
        au.aud_abono  as valor,
        au.aud_fecope  as fecope
        FROM auditorias AS au
        -- WHERE a.alu_nombre LIKE '%$filtro%'|| a.alu_docume LIKE '%$filtro%' || g.gra_nombre LIKE '%$filtro%'
        ORDER BY au.id_auditoria ASC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="card border-primary">
    <div class="card-header text-center">
        <div class="row">
            <div class="col-9">
                <div class="title">
                    <h2>INFORME GENERAL</h2>
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
                <th scope="col" >Factura</th>
                <th scope="col" >Precio</th>
                <th scope="col" >Fecha</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($ventas = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $ventas['idalumno']; ?> </td>
                <td> <?php echo $ventas['idgrado']; ?> </td>
                <td> <?php echo "GVA". ' - ' . $ventas['idfacturas']; ?> </td>
                <td> <?php echo $ventas['valor']; ?> </td>
                <td> <?php echo $ventas['fecope']; ?> </td>
                <td>
                    <div class="d-grid gap-2">
                        <input type="button" class="btn btn-info" value="ver factura" onclick="detallefactura('<?php echo $ventas['idfacturas']?>')"></input>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div id="conte-modal-matricula"></div>
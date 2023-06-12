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
        au.id_tipopago as tippag,
        a.alu_nombre  as alumno,
        g.gra_nombre  as grado,
        au.aud_valor  as valor,
        SUM(if(au.id_tipopago = 3 || au.id_tipopago = 4, au.aud_abono, 0)) as vtpension,
        au.aud_fecope  as fecope
        FROM auditorias AS au
        LEFT JOIN alumnos AS a ON au.id_alumno = a.id_alumno
        LEFT JOIN grados AS g ON au.id_grado = g.id_grado
        WHERE au.id_tipopago = 3 || au.id_tipopago = 4
        AND a.alu_nombre LIKE '%$filtro%'|| a.alu_docume LIKE '%$filtro%'|| g.gra_nombre LIKE '%$filtro%'
        GROUP BY au.id_alumno
        ORDER BY au.id_auditoria ASC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="card border-primary">
    <div class="card-header text-center">
        <div class="row">
            <div class="col-9">
                <div class="title">
                    <h2>INFORME PENSION</h2>
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
                                            $sql=$conexion->query("SELECT SUM(aud_valor) as 'pension' from auditorias WHERE id_tipopago = 4 || id_tipopago = 3");
                                            $data = mysqli_fetch_array($sql);
                                            $pension = $data['pension'];
                                            echo '$'. $pension;
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
                <td> <?php echo $ventas['vtpension']; ?> </td>
                <td>
                <div class="d-grid gap-2">
                    <input type="button" class="btn btn-info" value="Reporte" onclick="detallepension('<?php echo $ventas['idalumno']?>')"></input>
                </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div id="conte-modal-pension"></div>
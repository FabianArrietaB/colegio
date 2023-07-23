<?php
$idfacturas = $_GET['idfacturas'];
include "../../modelo/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql_alumno = "SELECT
        f.id_facturas AS idfactura,
        f.id_alumno AS idalumno
        FROM facturas AS f
        WHERE f.id_facturas = '$idfacturas'";
$queryalu = mysqli_query($conexion, $sql_alumno);
$rw_alumno = mysqli_fetch_array($queryalu);
$idalumno = $rw_alumno['idalumno'];
$sql = "SELECT
    ac.id_alumno AS idalumno,
    ac.id_acudiente AS idacudiente,
    ac.acu_docume AS docume,
    ac.acu_nombre AS nombre
    FROM acudientes AS ac
    WHERE ac.id_alumno = '$idalumno'";
$query = mysqli_query($conexion, $sql);
$arrayDetalle = array();
foreach ($query as $row) {
    $arrayDetalle[] = $row;
}
?>
<!-- Formulario (Agregar) -->
<form id="frmpacudientes" method="post" action="">
    <div class="modal fade" id="acudientes" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Acudientes</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border"></legend>
                        <div class="table-responsive justify-content-center">
                            <table class="table table-light text-center" id="tablainfoventas">
                                <thead>
                                    <tr>
                                        <th scope="col" >#</th>
                                        <th scope="col" >Nombre</th>
                                        <th scope="col" >Documento</th>
                                    </tr>
                                </thead>
                                <tbody">
                                <?php
                                    if (count($arrayDetalle) > 0) {
                                        foreach ($arrayDetalle as $c => $value) {
                                            ?>
                                        <tr>
                                            <td><?php echo $value['idacudiente']; ?></td>
                                            <td><?php echo $value['docume']; ?></td>
                                            <td onclick="datosacudientes(<?php echo $value['idacudiente']?>, '<?php echo $idfacturas?>')"><?php echo $value['nombre']; ?></td>
                                        </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4" style="text-align: center">
                                                <div class="alert alert-danger" role="alert">
                                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                                    <span class="sr-only">Error:</span>
                                                    No existen Datos
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                    <div class="card-footer">
                        <button class="btn btn-success" data-bs-dismiss="modal">Imprimir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->

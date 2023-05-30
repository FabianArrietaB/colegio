<?php
$idalumno = $_GET['idalumno'];
include "../../modelo/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT
au.id_auditoria as idpension,
au.id_alumno  as idalumno,
a.alu_nombre  as alumno,
a.alu_correo  as correo,
a.alu_direcc  as direcc,
a.alu_telcel  as telcel,
a.alu_fecope  as fecmat,
au.id_tipopago as tippag,
a.alu_nombre  as alumno,
g.gra_nombre  as grado,
au.aud_abono  as abono,
au.aud_fecope  as fecope
FROM auditorias AS au
LEFT JOIN alumnos AS a ON au.id_alumno = a.id_alumno
LEFT JOIN grados AS g ON au.id_grado = g.id_grado
WHERE au.id_tipopago IN (3 , 4) AND au.id_alumno = '$idalumno'";
$arrayDetalle = array();
$query = mysqli_query($conexion, $sql);
foreach ($query as $row) {
    $arrayDetalle[] = $row;
}
?>
<!-- Formulario (Agregar) -->
<form id="frmpensiones" method="post" action="" onsubmit="return imprimir()">
    <div class="modal fade" id="reppensiones" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reporte Ventas</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Alumno</legend>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre Estudiante</label>
                                    <input type="text" id="nomalu" name="nomalu"  class="form-control input-sm" disabled value="<?php echo $row['alumno']; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Correo</label>
                                    <input type="text" id="correo" name="correo" class="form-control input-sm" disabled value="<?php echo $row['correo']; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Direccion</label>
                                    <input type="text" id="direcc" name="direcc" class="form-control input-sm" disabled value="<?php echo $row['direcc']; ?>">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Telefono</label>
                                    <input type="text" id="telcel" name="telcel" class="form-control input-sm" disabled value="<?php echo $row['telcel']; ?>">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Fecha Ingreso</label>
                                    <input type="text" id="fecmat" name="fecmat" class="form-control input-sm" disabled value="<?php echo $row['fecmat']; ?>">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Pagos</legend>
                        <div class="table-responsive justify-content-center">
                            <table class="table table-light text-center" id="tablainfoventas">
                                <thead>
                                    <tr>
                                        <th scope="col" >Producto</th>
                                        <th scope="col" >Precio</th>
                                        <th scope="col" >Fecha</th>
                                    </tr>
                                </thead>
                                <tbody">
                                <?php
                                   
                                    if (count($arrayDetalle) > 0) {
                                        foreach ($arrayDetalle as $c => $value) {
                                            ?>
                                            <tr>
                                                <td>
                                                <?php if ($value['tippag'] == 3) { ?>
                                                    <span>ABONO PENSION</span>
                                                <?php } else { ?>
                                                    <span>PAGO TOTAL PENSION</span>
                                                <?php }
                                                ?>
                                                </td>
                                                <td><?php echo $value['abono']; ?></td>
                                                <td><?php echo $value['fecope']; ?></td>
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

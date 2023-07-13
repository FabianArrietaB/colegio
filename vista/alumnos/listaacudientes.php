<?php
$idalumno = $_GET['idalumno'];
include "../../modelo/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT
    ac.id_acudiente as idacudiente,
    ac.id_alumno as idalumno,
    a.alu_nombre as alumno,
    a.alu_correo as coralu,
    ac.acu_nombre as nombre,
    ac.acu_cladoc as cladoc,
    ac.acu_docume as docume,
    ac.acu_telcel as telcel,
    ac.acu_correo as correo,
    g.gra_nombre as grado
    FROM acudientes as ac
    INNER JOIN alumnos AS a ON a.id_alumno = ac.id_alumno
    INNER JOIN grados AS g ON g.id_grado = a.id_grado
WHERE ac.id_alumno = '$idalumno'";
$arrayDetalle = array();
$query = mysqli_query($conexion, $sql);
foreach ($query as $row) {
    $arrayDetalle[] = $row;
}
?>
<!-- Formulario (Agregar) -->
<form id="frmacudiente" method="post" action="" onsubmit="return imprimir()">
    <div class="modal fade" id="acudientes" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
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
                                    <label class="form-label">Grado</label>
                                    <input type="text" id="correo" name="correo" class="form-control input-sm" disabled value="<?php echo $row['grado']; ?>">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Acudientes</legend>
                        <div class="table-responsive justify-content-center">
                            <table class="table table-light text-center" id="tablainfoventas">
                                <thead>
                                    <tr>
                                        <th scope="col" >Nombre</th>
                                        <th scope="col" >Telefono</th>
                                        <th scope="col" >Correo</th>
                                        <th scope="col" >Fecha</th>
                                    </tr>
                                </thead>
                                <tbody">
                                <?php
                                    if (count($arrayDetalle) > 0) {
                                        foreach ($arrayDetalle as $c => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value['nombre']; ?></td>
                                                <td><?php echo $value['telcel']; ?></td>
                                                <td><?php echo $value['correo']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#padre" onclick="detalleacudiente('<?php echo $value['idacudiente']?>')"><i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                                                </td>
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
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->

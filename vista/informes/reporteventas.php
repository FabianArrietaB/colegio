<?php

include "../../modelo/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
?>
<!-- Formulario (Agregar) -->
<form id="frmrepventa" method="post" action="" onsubmit="return imprepventa()">
    <div class="modal fade" id="repventa" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
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
                            <input type="text" id="idalumno" name="idalumno" class="form-control input-sm" hidden>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre Estudiante</label>
                                    <input type="text" id="nomalu" name="nomalu" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Correo</label>
                                    <input type="text" id="correo" name="correo" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Direccion</label>
                                    <input type="text" id="direcc" name="direcc" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Telefono</label>
                                    <input type="text" id="telcel" name="telcel" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Fecha Ingreso</label>
                                    <input type="text" id="fecmat" name="fecmat" class="form-control input-sm" disabled>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Compras</legend>
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
                                    $id_check = 
                                    $PHPvariable = "<script> document.write(id)</script>";
                                    $sql = "CALL ventas_alumno('$id_check');";
                                    $arrayDetalle = array();
                                    $query = mysqli_query($conexion, $sql);
                                    foreach ($query as $row) {
                                        $arrayDetalle[] = $row;
                                    }
                                    if (count($arrayDetalle) > 0) {
                                        foreach ($arrayDetalle as $c => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value['producto']; ?></td>
                                                <td><?php echo $value['precio']; ?></td>
                                                <td><?php echo $value['fecope']; ?></td>
                                                <td><?php echo "PHPvariable = ".$PHPvariable; ?></td>
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

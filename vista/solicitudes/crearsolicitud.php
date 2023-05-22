<!-- Formulario (Agregar) -->
<form id="frmsolicitud" method="post" onsubmit="return crearsolicitud()">
    <div class="modal fade" id="reporte" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Solicitud</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Alumno) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Usuario</legend>
                        <div class="row">
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <input disabled type="text" class="form-control input-sm" value="<?php echo $_SESSION['usuario']['nombre'];?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <select name="idgrado" id="idgrado" class="form-control input-sm">
                                        <option selected >GRADO</option
                                        <?php
                                            $sql="SELECT g.id_grado as idgrado, g.gra_nombre as grado FROM grados as g WHERE g.gra_estado = 1";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($grado = mysqli_fetch_array($respuesta)) {
                                        ?>
                                            <option value="<?php echo $grado['idgrado']?>"><?php echo $grado['grado'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Formulario (Solicitud) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Solicitud</legend>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="reptipo" id="reptipo" class="form-control input-sm">
                                        <option selected >TIPO SOLICITUD</option>
                                        <option value="1">SOLICITUD</option>
                                        <option value="2">REPORTE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="input-group mb-3">
                                    <input type="text" id="detalle" name="detalle" class="form-control input-sm" placeholder="Ingrese Su Solictud">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="card-footer text-center">
                        <button class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar) -->

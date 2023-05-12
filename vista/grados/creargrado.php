<!-- Formulario (Agregar) -->
<form id="frmagregargrado" method="post" onsubmit="return agregargrado()">
    <div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Grado</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Grado</legend>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombre" name="nombre" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="canalu" name="canalu" class="form-control input-sm" placeholder="Ingrese Numeros Estudiantes">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <select name="iddir" id="iddir" class="form-control input-sm">
                                        <option selected >Selecione Director Grupo</option>
                                        <?php
                                        $sql="SELECT e.id_empleado as idempleado, e.emp_nombre as empleado FROM empleados as e WHERE e.emp_estado = 1";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($empleado = mysqli_fetch_array($respuesta)) {
                                        ?>
                                        <option value="<?php echo $empleado['idempleado']?>"><?php echo $empleado['empleado'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="matric" name="matric" class="form-control input-sm" placeholder="Ingrese Valor Matricula">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="pensio" name="pensio" class="form-control input-sm" placeholder="Ingrese Valor Pension">
                                </div>
                            </div>
                    </fieldset>
                    <div class="card-footer">
                        <button class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->

<!-- Formulario (Agregar) -->
<form id="frmeditargrado" method="post" onsubmit="return editargrado()">
    <div class="modal fade" id="editar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <d class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Grado</legend>
                            <input type="text" id="idgrado" name="idgrado" hidden>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="nomalu" name="nombreu" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="canaluu" name="canaluu" class="form-control input-sm" placeholder="Ingrese Precio">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <select name="iddiru" id="iddiru" class="form-control input-sm">
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
                                    <input type="text" id="matricu" name="matricu" class="form-control input-sm" placeholder="Ingrese Precio">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="pensiou" name="pensiou" class="form-control input-sm" placeholder="Ingrese Precio">
                                </div>
                            </div>
                    </fieldset>
                        <div class="card-footer">
                        <button class="btn btn-success" data-bs-dismiss="modal">Actualizar</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->
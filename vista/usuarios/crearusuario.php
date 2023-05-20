<!-- Formulario (Agregar) -->
<form id="frmagregarusuario" method="POST" onsubmit="return agregarusuario()">
    <div class="modal fade" id="create" tabindex="-1" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Usuario</legend>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <select name="nombre" id="nombre" class="form-control input-sm">
                                        <option selected >Selecione Persona</option>
                                        <?php
                                            $sql="SELECT nombre FROM (SELECT a.alu_nombre as nombre FROM alumnos AS a UNION ALL SELECT e.emp_nombre as nombre FROM empleados AS e) persona";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($persona = mysqli_fetch_array($respuesta)) {
                                        ?>
                                            <option value="<?php echo $persona['nombre']?>"><?php echo $persona['nombre'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input placeholder="Ingrese Correo" type="text" id="correo" name="correo" class="form-control input-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input placeholder="Ingrese Usuario" type="text" id="usuario" name="usuario" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input placeholder="Ingrese Contraseña" type="text" id="password" name="password" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <select name="idRol" id="idRol" class="form-control input-sm">
                                        <option selected >Selecione un Rol</option>
                                        <option value="1">Alumno</option>
                                        <option value="2">Docente</option>
                                        <option value="3">Supervisor</option>
                                        <option value="4">Administrador</option>
                                    </select>
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
<!-- Fin Formulario (Agregar, Modificar) -->

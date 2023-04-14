<!-- Formulario (Agregar) -->
<form id="frmeditarusuario" method="post" onsubmit="return editarusuario()">
    <div class="modal fade" id="editar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Usuario</legend>
                        <input type="text" id="idusuario" name="idusuario" hidden>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombreu" name="nombreu" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="usuariou" name="usuariou" class="form-control input-sm" placeholder="Ingrese Usuario">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="password" id="passwordu" name="passwordu" class="form-control input-sm" placeholder="Ingrese Contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="correou" name="correou" class="form-control input-sm" placeholder="Ingrese Correo" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="idRolu" id="idRolu" class="form-control input-sm">
                                    <option selected>Seleccione Rol</option>
                                    <option value="1">Usuario</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Administrador</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="date" id="fechau" name="fechau" class="form-control input-sm" placeholder="Ingrese Contraseña">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="card-footer">
                        <button class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->

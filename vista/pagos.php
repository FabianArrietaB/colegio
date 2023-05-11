<!-- Formulario (Pago) -->
<form id="frmapago" method="POST" onsubmit="return detallematricula()">
    <div class="modal fade" id="pago" tabindex="-1" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Alumno</legend>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombreu" name="nombreu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <select name="idgradou" id="idgradou" class="form-control input-sm">
                                        <option value="1">TRANSICION</option>
                                        <option value="2">PRIMERO</option>
                                        <option value="3">SEGUNDO</option>
                                        <option value="4">TERCERO</option>
                                        <option value="5">CUARTO</option>
                                        <option value="6">QUINTO</option>
                                        <option value="7">SEXTO</option>
                                        <option value="8">SEPTIMO</option>
                                        <option value="9">OCTAVO</option>
                                        <option value="10">NOVENO</option>
                                        <option value="11">DECIMO</option>
                                        <option value="12">UNDECIMO</option>
                                    </select>
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
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->

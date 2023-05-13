<!-- Formulario (Agregar) -->
<form id="frmempresa" method="post" onsubmit="return editarempresa()">
    <div class="modal fade" id="empresa" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <d class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border"></legend>
                        <div class="row">
                            <input type="text" id="idempresa" name="idempresa" hidden>
                            <div class="col-4">

                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Razon Social</label>
                                            <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre Comercial</label>
                                            <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">NIT</label>
                                            <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Correo</label>
                                            <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Telefono</label>
                                            <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Direccion</label>
                                            <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Tipo de Persona</label>
                                    <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Regimen</label>
                                    <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Pais</label>
                                    <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Departamento</label>
                                    <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Municipio</label>
                                    <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Tipo</label>
                                    <input type="text" class="form-control" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                                </div>
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
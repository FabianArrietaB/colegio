
<!-- Formulario (Agregar) -->
<form id="frmempresa" method="post" onsubmit="return editarempresa()">
    <div class="card-header bg-primary text-center text-white">
        <div class="row">
            <div class="col-9">
                <h5 class="modal-title" id="exampleModalLabel">Detalle Empresa</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <fieldset class="group-border">
            <legend class="group-border"></legend>
            <div class="row">
                <input type="text" id="idsede" name="idsede" hidden>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Razon Social</label>
                                <input type="text" class="form-control" id="razsocu" placeholder="NOMBRE DE LA EMPRESA">
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
                                <input type="text" class="form-control" id="nitu" placeholder="NOMBRE DE LA EMPRESA">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Correo</label>
                                <input type="text" class="form-control" id="correou" placeholder="NOMBRE DE LA EMPRESA">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="telcelu" placeholder="NOMBRE DE LA EMPRESA">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="direccu" placeholder="NOMBRE DE LA EMPRESA">
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Pagina</label>
                        <input type="text" class="form-control" id="paginau" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Tipo de Persona</label>
                        <input type="text" class="form-control" id="tipperu" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Regimen</label>
                        <input type="text" class="form-control" id="regimeu" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Pais</label>
                        <input type="text" class="form-control" id="paisu" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Departamento</label>
                        <input type="text" class="form-control" id="departu" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Municipio</label>
                        <input type="text" class="form-control" id="muniu" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="card-footer">
        <button class="btn btn-success" data-bs-dismiss="modal">Actualizar</button>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->
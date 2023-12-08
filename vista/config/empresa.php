
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
                                <input type="text" class="form-control" name="razsocu" id="razsocu" placeholder="NOMBRE DE LA EMPRESA">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Nombre Comercial</label>
                                <input type="text" class="form-control" name="nombreu" id="nombreu" placeholder="NOMBRE DE LA EMPRESA">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">NIT</label>
                                <input type="text" class="form-control" name="nitu" id="nitu" placeholder="NOMBRE DE LA EMPRESA">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Correo</label>
                                <input type="text" class="form-control" name="correou" id="correou" placeholder="NOMBRE DE LA EMPRESA">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telcelu" id="telcelu" placeholder="NOMBRE DE LA EMPRESA">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Direccion</label>
                                <input type="text" class="form-control" name="direccu" id="direccu" placeholder="NOMBRE DE LA EMPRESA">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="mb-3">
                        <label class="form-label">Pagina</label>
                        <input type="text" class="form-control" name="paginau" id="paginau" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label class="form-label">Tipo de Persona</label>
                        <input type="text" class="form-control" name="tipperu" id="tipperu" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-3">
                        <label class="form-label">Regimen</label>
                        <input type="text" class="form-control" name="regimeu" id="regimeu" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-3">
                        <label class="form-label">Tipo</label>
                        <select name="idtipu" id="idtipu" class="form-control input-sm">
                                <option value="1">PUBLICA</option>
                                <option value="2">PRIVADA</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Pais</label>
                        <input type="text" class="form-control" name="paisu" id="paisu" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Departamento</label>
                        <input type="text" class="form-control" name="departu" id="departu" placeholder="NOMBRE DE LA EMPRESA">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Municipio</label>
                        <input type="text" class="form-control" name="muniu" id="muniu" placeholder="NOMBRE DE LA EMPRESA">
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
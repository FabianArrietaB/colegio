<!-- Formulario (Agregar) -->
<form id="frmeditarparafiscal" method="post" onsubmit="return editarparafiscal()">
    <div class="modal fade" id="editar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Parafiscal</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                            <input type="text" id="idparafiscal" name="idparafiscal" hidden>
                        <br>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Codigo Entidad</span>
                                <input type="text" id="codigou" name="codigou"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Nit Entidad</span>
                                <input type="text" id="nitu" name="nitu" aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Nombre Entidad</span>
                                <input type="text" id="nombreu" name="nombreu"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Tipo Regimen</span>
                                <select name="regimenu" id="regimenu" class="form-control input-sm">
                                    <option value="CONTRIBUTIVO">CONTRIBUTIVO</option>
                                    <option value="SUBSIDIADO">SUBSIDIADO</option>
                                    <option value="AMBOS">AMBOS</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Tipo Entidad</span>
                                <select name="idtipu" id="idtipu" class="form-control input-sm">
                                    <option value="1">EPS o PENSION</option>
                                    <option value="2">ARL</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                <button class="btn btn-success" data-bs-dismiss="modal">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->
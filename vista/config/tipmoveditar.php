<!-- Formulario (Agregar) -->
<form id="frmeditarmovimiento" method="post" onsubmit="return editarmovimiento()">
    <div class="modal fade" id="tipmoveditar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Movimiento</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                    <input type="text" id="idmovimiento" name="idmovimiento" hidden>
                        <br>
                    <div class="col mb-2">
                        <div class="input-group">
                            <span class="input-group-text">Detalle Movimiento</span>
                            <input type="text" id="predetallu" name="predetallu"  aria-label="First name" class="form-control">
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="input-group">
                            <span class="input-group-text">Nombre Movimiento</span>
                            <input type="text" id="prenombreu" name="prenombreu"  aria-label="First name" class="form-control">
                        </div>
                    </div>
                        <div class="col mb-2">
                            <div class="input-group">
                                <span class="input-group-text">Tipo Regimen</span>
                                <select name="estado" id="estado" class="form-control input-sm">
                                    <option value="1">ACTIVO</option>
                                    <option value="0">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success" data-bs-dismiss="modal">Actualizar</button>
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
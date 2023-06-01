<!-- Formulario (Agregar) -->
<form id="frmeditarparafiscal" method="post" onsubmit="return editarparafiscal()">
    <div class="modal fade" id="editar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Parafiscal</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <d class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion</legend>
                            <input type="text" id="idparafiscal" name="idparafiscal" hidden>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombreu" name="nombreu" class="form-control input-sm" " >
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="nitu" name="nitu" class="form-control input-sm" ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                <select name="idtipu" id="idtipu" class="form-control input-sm">
                                    <option value="1">EPS o PENSION</option>
                                    <option value="2">ARL</option>
                                </select>
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
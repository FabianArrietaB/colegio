<!-- Formulario (Agregar) -->
<form id="frmeditarproducto" method="post" onsubmit="return editarproducto()">
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
                        <legend class="group-border">Informacion Procduto</legend>
                            <input type="text" id="idproducto" name="idproducto" hidden>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombreu" name="nombreu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <select name="idcatu" id="idcatu" class="form-control input-sm">
                                        <option value="1">ACTA</option>
                                        <option value="2">CERTIFICADO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="preciou" name="preciou" class="form-control input-sm">
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
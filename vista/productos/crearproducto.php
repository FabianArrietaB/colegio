<!-- Formulario (Agregar) -->
<form id="frmagregarproducto" method="post" onsubmit="return agregarproducto()">
    <div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Procduto</legend>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombre" name="nombre" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <select name="idcat" id="idcat" class="form-control input-sm">
                                        <option selected >Selecione Categoria</option>
                                        <option value="1">ACTA</option>
                                        <option value="2">CERTIFICADO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="precio" name="precio" class="form-control input-sm" placeholder="Ingrese Precio">
                                </div>
                            </div>
                    </fieldset>
                    <div class="card-footer">
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->

<!-- Formulario (Agregar) -->
<form id="frmagregarproducto" method="post" onsubmit="return agregargrado()">
    <div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Grado</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <d class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Grado</legend>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombre" name="nombre" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="canalu" name="canalu" class="form-control input-sm" placeholder="Ingrese Precio">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <select name="iddir" id="iddir" class="form-control input-sm">
                                        <option selected >Selecione Categoria</option>
                                        <option value="<?php echo $grados['idempleado']; ?>"><?php echo $grados['nompro']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="matric" name="matric" class="form-control input-sm" placeholder="Ingrese Precio">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="pensio" name="pensio" class="form-control input-sm" placeholder="Ingrese Precio">
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

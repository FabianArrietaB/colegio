<!-- Formulario (Agregar) -->
<form id="frmeditarproducto" method="post" onsubmit="return editargrado()">
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
                        <legend class="group-border">Informacion Grado</legend>
                            <input type="text" id="idproducto" name="idproducto" hidden>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombreu" name="nombreu" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="canaluu" name="canaluu" class="form-control input-sm" placeholder="Ingrese Precio">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <select name="iddiru" id="iddiru" class="form-control input-sm">
                                        <option selected >Selecione Categoria</option>
                                        <option value="<?php echo $grados['idempleado']; ?>"><?php echo $grados['nompro']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="matricu" name="matricu" class="form-control input-sm" placeholder="Ingrese Precio">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="pensiou" name="pensiou" class="form-control input-sm" placeholder="Ingrese Precio">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="date" id="fechau" name="fechau" class="form-control input-sm">
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
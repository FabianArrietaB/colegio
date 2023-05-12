<!-- Formulario (Agregar) -->
<form id="frmeditargrado" method="post" onsubmit="return editargrado()">
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
                            <input type="text" id="idgrado" name="idgrado" hidden>
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
                                        <option value="1">CARLOS ALBERTO ROCHA TOVAR</option>
                                        <option value="2">MARIA DEL PILAR</option>
                                        <option value="3">CONSUELO BAUTISTAS SANCHEZ</option>
                                        <option value="4">JULIO JOSE REALEZ CUESTA</option>
                                        <option value="5">JULIO DEL CASTILLO MARTINEZ</option>
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
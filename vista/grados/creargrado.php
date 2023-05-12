<!-- Formulario (Agregar) -->
<form id="frmagregargrado" method="post" onsubmit="return agregargrado()">
    <div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Grado</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                    <input type="text" id="canalu" name="canalu" class="form-control input-sm" placeholder="Ingrese Numeros Estudiantes">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <select name="iddir" id="iddir" class="form-control input-sm">
                                        <option selected >Selecione Director Grupo</option>
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
                                    <input type="text" id="matric" name="matric" class="form-control input-sm" placeholder="Ingrese Valor Matricula">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" id="pensio" name="pensio" class="form-control input-sm" placeholder="Ingrese Valor Pension">
                                </div>
                            </div>
                    </fieldset>
                    <div class="card-footer">
                        <button class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->

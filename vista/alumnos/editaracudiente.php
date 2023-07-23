<!-- Formulario (Editar) -->
<form id="frmeditaracudiente" method="post" onsubmit="return editaracudiente()">
    <div class="modal fade" id="padre" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Acudientes</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Alumno) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Alumno</legend>
                        <div class="row">
                            <input type="text" id="alumnoid" name="alumnoid" hidden>
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <input type="text" id="nomaluu" name="nomaluu" class="form-control input-sm" placeholder="Ingrese Nombre" disabled>
                                </div>
                            </div>
                    </fieldset>
                    <!-- Formulario (Acudiente) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Acudiente</legend>
                        <div class="row">
                            <input type="text" id="idacudiente" name="idacudiente" hidden>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="padnombreu" name="padnombreu" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="padcladocu" id="padcladocu" class="form-control input-sm">
                                        <option value="CEDULA">CEDULA</option>
                                        <option value="CEDULA EXTRANEJERIA">CEDULA EXTRANGERIA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="paddocumeu" name="paddocumeu" class="form-control input-sm" placeholder="Ingrese Documento">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="padtelcelu" name="padtelcelu" class="form-control input-sm" placeholder="Ingrese Telefono">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="padciudadu" name="padciudadu" class="form-control input-sm" placeholder="Ingrese Ciudad">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="paddireccu" name="paddireccu" class="form-control input-sm" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="col-2">
                            <div class="input-group mb-3">
                                    <select name="padestratu" id="padestratu" class="form-control input-sm">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="MAS">MAS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="padcorreou" name="padcorreou" class="form-control input-sm" placeholder="Ingrese Correo" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    </fieldset>
                    <div class="card-footer text-center">
                        <button class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar) -->

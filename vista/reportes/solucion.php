<!-- Formulario (Agregar) -->
<form id="frmsolucion" method="post" onsubmit="return solucion()">
    <div class="modal fade" id="solucion" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Solicitud</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Alumno) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Alumno</legend>
                        <input type="text" id="idsolicitud" name="idsolicitud" hidden>
                        <div class="row">
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombreu" name="nombreu" class="form-control input-sm" placeholder="Ingrese Nombre Completo" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <select name="idgradou" id="idgradou" class="form-control input-sm">
                                        <option selected >GRADO</option>
                                        <option value="1">TRANSICION</option>
                                        <option value="2">PRIMERO</option>
                                        <option value="3">SEGUNDO</option>
                                        <option value="4">TERCERO</option>
                                        <option value="5">CUARTO</option>
                                        <option value="6">QUINTO</option>
                                        <option value="7">SEXTO</option>
                                        <option value="8">SEPTIMO</option>
                                        <option value="9">OCTAVO</option>
                                        <option value="10">NOVENO</option>
                                        <option value="11">DECIMO</option>
                                        <option value="12">UNDECIMO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Formulario (Madre) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Solicitud</legend>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="tiposolicitud" id="tiposolicitud" class="form-control input-sm">
                                        <option selected >TIPO SOLICITUD</option>
                                        <option value="1">SOLICITUD</option>
                                        <option value="2">REPORTE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="input-group mb-3">
                                    <input type="text" id="detalle" name="detalle" class="form-control input-sm" placeholder="Ingrese Su Solictud">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="card-footer text-center">
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar) -->

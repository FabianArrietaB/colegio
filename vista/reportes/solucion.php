<!-- Formulario (Agregar) -->
<form id="frmsolucion" method="post" onsubmit="return solucion()">
    <div class="modal fade" id="solucion" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Solucion a Solicitud</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Alumno) -->
                        <div class="row">
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <input type="text" id="idsolicitud" name="idsolicitud" hidden>
                                </div>
                            </div>
                    <!-- Formulario (Solicitud) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Solicitud</legend>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select disabled name="tiposolicitudu" id="tiposolicitudu" class="form-control input-sm">
                                        <option value="1">SOLICITUD</option>
                                        <option value="2">REPORTE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="input-group mb-3">
                                    <input disabled type="text" id="detalleu" name="detalleu" class="form-control input-sm" placeholder="Ingrese Su Solictud">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Formulario (Solucion) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Solucion</legend>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="estadou" id="estadou" class="form-control input-sm">
                                        <option value="0">ABIERTO</option>
                                        <option value="1">CERRADO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="input-group mb-3">
                                    <input type="text" id="solucionu" name="solucionu" class="form-control input-sm" placeholder="Observacion">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="card-footer text-center">
                        <button class="btn btn-success" data-bs-dismiss="modal" >Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar) -->

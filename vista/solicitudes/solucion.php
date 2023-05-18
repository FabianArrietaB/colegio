<!-- Formulario (Agregar) -->
<form id="frmsolucion" method="post" onsubmit="return solucion()">
    <div class="modal fade" id="solucion" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Venta</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Solicitud) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Solicitud</legend>
                        <div class="row">
                            <input type="text" id="idsolicitud" name="idsolicitud" hidden>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="usuariou" name="usuariou" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="detalleu" name="detalleu" class="form-control input-sm" disabled>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Solucion</legend>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="estado" id="estado" class="form-control input-sm">
                                        <option value="0">ABIERTO</option>
                                        <option value="1">CERRADO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="input-group mb-3">
                                    <input type="text" id="solucion" name="solucion" class="form-control input-sm">
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


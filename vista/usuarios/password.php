<!-- Formulario (Cambio Contraseña) -->
<form id="formcambiopassword" method="post" onsubmit="return cambiopassword()">
    <div class="modal" id="password" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio Contraseña</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <input type="text" hidden id="idusuariou" name="idusuariou">
                        <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="newpassword" name="newpassword" class="form-control input-sm" placeholder="Ingrese Nueva Contraseña" >
                                </div>
                            </div>
                    </fieldset>
                    <div class="card-footer text-center">
                        <button class="btn btn-warning">Cambiar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Cambio Contraseña) -->
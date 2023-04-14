<form id="formcambiopassword" onsubmit="return cambiopassword()" method="POST">
    <div class="modal fade" id="contraseña" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden id="idusuario" name="idusuario">
                    <label for="">Escribe nueva contraseña</label>
                    <input type="text" id="newpassword" name="newpassword" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Resetear</button>
                </div>
            </div>
        </div>
    </div>
</form>
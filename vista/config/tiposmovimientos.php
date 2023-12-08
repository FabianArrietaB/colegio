<!-- Formulario (Agregar) -->
<div class="card-header bg-primary text-center text-white">
    <div class="row">
        <div class="col-9">
            <h5 class="modal-title" id="exampleModalLabel">Tipos Movimientos</h5>
        </div>
    </div>
</div>
<div class="card-body">
    <fieldset class="group-border">
        <legend class="group-border"></legend>
        <div class="row">
            <form id="frmagregarmovimiento" method="post" onsubmit="return agregarmovimiento()">
                <div class="row">
                
                    <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text">Detalle Movimiento</span>
                            <input type="text" id="predetall" name="predetall"  aria-label="First name" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text">Nombre Movimiento</span>
                            <input type="text" id="prenombre" name="prenombre"  aria-label="First name" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Agregar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div id="tablamovimientos"></div>
            </div>
        </div>
    </fieldset>
</div>
<!-- Fin Formulario (Agregar, Modificar) -->
<script src="../public/js/config/config.js"></script>
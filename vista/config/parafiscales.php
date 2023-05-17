<!-- Formulario (Agregar) -->
    <div class="card-header bg-primary text-center text-white">
        <div class="row">
            <div class="col-9">
                <h5">Parafiscales</h5>
            </div>
        </div>
    </div>
    <fieldset class="group-border">
        <legend class="group-border"></legend>
        <div class="row">
            <form id="frmagregarparafiscal" method="post" onsubmit="return agregarparafiscal()">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nombre" name="nombre">
                    <button class="btn btn-primary" type="button">Guardar</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="tablaparafiscales"></div>
            </div>
        </div>
</fieldset>
<!-- Fin Formulario (Agregar, Modificar) -->
<script src="../public/js/config/config.js"></script>
<!-- Formulario (Agregar) -->
    <div class="card-header bg-primary text-center text-white">
        <div class="row">
            <div class="col-9">
                <h5">Parafiscales</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
    <fieldset class="group-border">
        <legend class="group-border"></legend>
            <div class="row">
                <form id="frmagregarparafiscal" method="post" onsubmit="return agregarparafiscal()">
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text">Codigo Entidad</span>
                                <input type="text" id="codigo" name="codigo"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text">Nit Entidad</span>
                                <input type="text" id="nit" name="nit" aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text">Nombre Entidad</span>
                                <input type="text" id="nombre" name="nombre"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text">Tipo Regimen</span>
                                <select name="regimen" id="regimen" class="form-control input-sm">
                                    <option value="CONTRIBUTIVO">CONTRIBUTIVO</option>
                                    <option value="SUBSIDIADO">SUBSIDIADO</option>
                                    <option value="AMBOS">AMBOS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text">Tipo Entidad</span>
                                <select name="idtip" id="idtip" class="form-control input-sm">
                                    <option value="1">EPS o PENSION</option>
                                    <option value="2">ARL</option>
                                </select>
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
                    <div id="tablaparafiscales"></div>
                </div>
            </div>
        </fieldset>
    </div>
<!-- Fin Formulario (Agregar, Modificar) -->
<script src="../public/js/config/config.js"></script>
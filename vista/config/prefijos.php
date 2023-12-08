<!-- Formulario (Agregar) -->
<div class="card-header bg-primary text-center text-white">
        <div class="row">
            <div class="col-9">
            <h5 class="modal-title" id="exampleModalLabel">Prefijos</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
    <fieldset class="group-border">
        <legend class="group-border"></legend>
            <div class="row">
                <form id="frmagregarprefijo" method="post" onsubmit="return agregarprefijo()">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Tipo Movimiento</span>
                                <input hidden type="text" id="idpretipmov" name="idpretipmov" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <input type="text" id="pretipmov" name="pretipmov" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tipmovimientos"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <span class="input-group-text">Prefijo</span>
                                <input type="text" id="prefij" name="prefij" aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <span class="input-group-text">Detalle</span>
                                <input type="text" id="prenombre" name="prenombre"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text">Consecutivo</span>
                                <input type="text" id="preconsec" name="preconsec"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text">Numeracion Inicial</span>
                                <input type="text" id="prenumini" name="prenumini"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text">Numeracion Final</span>
                                <input type="text" id="prenumfin" name="prenumfin"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group">
                                <span class="input-group-text">Fecha Inicial</span>
                                <input type="text" id="prefecini" name="prefecini"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <span class="input-group-text">Fecha Final</span>
                                <input type="text" id="prefecfin" name="prefecfin"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <span class="input-group-text">Resolucion</span>
                                <input type="text" id="preresolu" name="preresolu"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
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
                <div id="tablaprefijos"></div>
                </div>
            </div>
        </fieldset>
    </div>
<!-- Fin Formulario (Agregar, Modificar) -->
<script src="../public/js/config/config.js"></script>
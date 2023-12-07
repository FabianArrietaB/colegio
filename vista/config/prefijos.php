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
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <select name="idtipmov" id="idtipmov" class="form-control input-sm">
                                    <option selected >Selecione Tipo Movimiento</option>
                                    <?php
                                        $sql="SELECT m.id_tipmov AS codigo, m.mov_nombre AS nombre FROM movimientos as m";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($movimiento = mysqli_fetch_array($respuesta)) {
                                    ?>
                                        <option value="<?php echo $movimiento['codigo']?>"><?php echo str_pad($movimiento['codigo'],2,"0",STR_PAD_LEFT) . ' - ' . $movimiento['nombre'];?></option>
                                    <?php }?>
                                </select>
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
                                    <option selected>Seleccione Regimen</option>
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
                                    <option selected>Seleccione Entidad</option>
                                    <option value="1">EPS o PENSION</option>
                                    <option value="2">ARL</option>
                                    <option value="3">CESANTIAS</option>
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
                    <h4>TABLA PREFIJOS</h4>
                </div>
            </div>
        </fieldset>
    </div>
<!-- Fin Formulario (Agregar, Modificar) -->
<script src="../public/js/config/config.js"></script>
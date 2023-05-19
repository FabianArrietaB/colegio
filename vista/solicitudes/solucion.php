<!-- Formulario (Agregar) -->
<form id="frmsolucion" method="post" onsubmit="return solucion()">
    <div class="modal fade" id="solucion" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
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
                    <!-- Formulario (Venta) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Venta</legend>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <select name="idalumno" id="idalumno" class="form-control input-sm">
                                        <option selected >Selecione Alumno</option>
                                        <?php
                                        $sql="SELECT a.id_alumno as idalumno, a.alu_nombre as alumno FROM alumnos as a WHERE a.alu_estado = 1";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($empleado = mysqli_fetch_array($respuesta)) {
                                        ?>
                                        <option value="<?php echo $empleado['idalumno']?>"><?php echo $empleado['alumno'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <select name="idproducto" id="idproducto" class="form-control input-sm">
                                        <option selected >Selecione Producto</option>
                                        <?php
                                        $sql="SELECT p.id_producto as idproducto, p.pro_nombre as producto FROM productos as p WHERE p.pro_estado = 1";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($empleado = mysqli_fetch_array($respuesta)) {
                                        ?>
                                        <option value="<?php echo $empleado['idproducto']?>"><?php echo $empleado['producto'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="precio" name="precio" class="form-control input-sm" readonly>
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
                                    <input type="text" id="solucionu" name="solucionu" class="form-control input-sm">
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


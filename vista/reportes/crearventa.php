<!-- Formulario (Agregar) -->
<form id="frmventas" method="post" onsubmit="return ventas()">
    <div class="modal fade" id="ventas" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Venta</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Alumno) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Alumno</legend>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <select name="idalumno" id="idalumno" class="form-control input-sm">
                                        <option selected >Selecione Alumno</option>
                                        <?php
                                        $sql="SELECT a.id_alumno as idalumno, a.alu_nombre as alumno FROM alumnos as a WHERE a.alu_estado = 1";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($alumnos = mysqli_fetch_array($respuesta)) {
                                        ?>
                                        <option value="<?php echo $alumnos['idalumno']?>"><?php echo $alumnos['alumno'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                        <!-- Formulario (Solicitud) -->
                        <fieldset class="group-border">
                            <legend class="group-border">Informacion Producto</legend>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                    <select name="idproducto" id="idproducto" class="form-control input-sm">
                                        <option selected >Selecione Producto</option>
                                        <?php
                                        $sql="SELECT p.id_producto as idproducto, p.pro_nombre as producto FROM productos as p WHERE p.pro_estado = 1";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($producto = mysqli_fetch_array($respuesta)) {
                                        ?>
                                        <option value="<?php echo $producto['idproducto']?>"><?php echo $producto['producto'];?></option>
                                        <?php }?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Precio</label>
                                        <input type="text" id="precio" name="precio" class="form-control input-sm" readonly>
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
    </div>
</form>
<!-- Fin Formulario (Agregar) -->


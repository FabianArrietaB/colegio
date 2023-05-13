<!-- Formulario (Agregar) -->
<div class="modal fade" id="parametros" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Parametros</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario (Estudiante) -->
                <fieldset class="group-border">
                    <legend class="group-border">Parafiscales</legend>
                        <form id="frmagregarparafiscal" method="post" onsubmit="return agregarparafiscal()">
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-group mb-3">
                                        <input type="text" id="nombre" name="nombre" class="form-control input-sm" placeholder="Ingrese Nombre" require>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group mb-3">
                                        <button class="btn btn-success">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Fin Formulario (Agregar, Modificar) -->
                    <div class="row">
                        <div class="table-responsive justify-content-center">
                            <table class="table table-light text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql="SELECT p.par_nombre as nombre FROM parafiscales as p";
                                    $respuesta = mysqli_query($conexion, $sql);
                                    while($parafiscales = mysqli_fetch_array($respuesta)) {
                                    ?>
                                    <tr>
                                        <td> <?php echo $parafiscales['nombre']; ?> </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<!-- Fin Formulario (Agregar, Modificar) -->
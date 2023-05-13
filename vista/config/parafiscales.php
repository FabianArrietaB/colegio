<!-- Formulario (Agregar) -->
<div class="modal fade" id="parametros" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Parametros</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <d class="modal-body">
                <!-- Formulario (Estudiante) -->
                <fieldset class="group-border">
                    <legend class="group-border">Parafiscales</legend>
                    <div class="row">
                        <div class="col-4">
                            <!-- Formulario (Agregar) -->
                            <form id="frmagregarparafiscal" method="post" onsubmit="return agregarparafiscal()">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" id="nombre" name="nombre" class="form-control input-sm" placeholder="Ingrese Nombre" require>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success">Agregar</button>
                                </div>
                            </form>
                            <!-- Fin Formulario (Agregar, Modificar) -->
                        </div>
                        <div class="col-8">
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
                    </div>
                </fieldset>
                <fieldset class="group-border">
                    <legend class="group-border">Paises</legend>
                    <div class="row">
                        <div class="table-responsive justify-content-center">
                            <table id="data_table" class="table table-light text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" >Nombres</th>
                                        <th>
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="group-border">
                    <legend class="group-border">Departamentos</legend>
                    <div class="row">
                        <div class="table-responsive justify-content-center">
                            <table id="data_table" class="table table-light text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" >Nombres</th>
                                        <th>
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="group-border">
                    <legend class="group-border">Municipios</legend>
                    <div class="row">
                        <div class="table-responsive justify-content-center">
                            <table id="data_table" class="table table-light text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" >Nombres</th>
                                        <th>
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
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
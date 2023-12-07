<!-- Formulario (Agregar) -->
<form id="frmagregargrado" method="post" onsubmit="return crearfactura()">
    <div class="modal fade" id="createfactura" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generar Factura</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <div class="row">
                        <div class="col-6">
                            <fieldset class="group-border">
                                <legend class="group-border">Informacion Alumno</legend>
                            </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset class="group-border">
                                <legend class="group-border">Informacion Acudiente</legend>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Formulario (Productos) -->
                    <div class="row">
                        <div class="col">
                            <fieldset class="group-border">
                                <table class="table table-light text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col" >Nombres</th>
                                            <th scope="col" >Categoria</th>
                                            <th scope="col" >Precio</th>
                                            <th>Estado</th>
                                            <th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <fieldset class="group-border">
                                <legend class="group-border">Informacion Factura</legend>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="card-footer">
                        <button class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->

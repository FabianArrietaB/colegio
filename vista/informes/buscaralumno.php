<!-- Formulario (Agregar) -->
<div class="modal fade" id="alumnos" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccionar Alumno</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario (Alumno) -->
                <fieldset class="group-border">
                    <legend class="group-border mb-4"></legend>
                    <div class="row">
                        <div class="input-group">
                            <input type="text" id="filtroalumno" name="filtroalumno" class="form-control input-sm" placeholder="Ingrese Nombre" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="table-responsive justify-content-center">
                            <table class="table table-light text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" >Documento</th>
                                        <th scope="col" >Alumno</th>
                                        <th scope="col" >Grado</th>
                                    </tr>
                                </thead>
                                <tbody id="tblalumnos">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<!-- Fin Formulario (Agregar) -->

<?php
    $query = "SELECT
        a.id_alumno as idalumno,
        a.alu_nombre as nombre,
        a.alu_cladoc as cladoc,
        a.alu_docume as docume,
        a.alu_sexo as sexo,
        a.alu_gposan as gposan,
        a.alu_factrh as factrh,
        a.alu_ciudad as ciudad,
        a.alu_direcc as direcc,
        a.alu_estrat as estrat,
        a.alu_telcel as telcel,
        a.alu_correo as correo,
        a.alu_estado as estado,
        a.alu_fecnac as fecnac,
        g.gra_nombre as grado
    FROM alumnos AS a LEFT JOIN grados AS g ON g.id_grado = a.id_grado LIMIT 10";
    $respuesta = mysqli_query($conexion, $query);
?>
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
                                <tbody>
                                    <?php while ($alumnos = mysqli_fetch_array($respuesta)) { ?>
                                        <td><a data-bs-dismiss="modal" id="docalum" onclick="obteneralumno(<?php echo $alumnos['docume']; ?>)"><?php echo $alumnos['docume']; ?></a></td>
                                        <td> <?php echo $alumnos['nombre']; ?></td>
                                        <td> <?php echo $alumnos['grado'];  ?></td>
                                    <?php } ?>
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

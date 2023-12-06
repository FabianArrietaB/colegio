<?php
    $idgrado = '';
    $filtro = '';
    if(isset($_GET['idgrado'])){
        $idgrado = $_GET['idgrado'];
    }
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
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
    FROM alumnos AS a LEFT JOIN grados AS g ON g.id_grado = a.id_grado
    WHERE a.id_grado = '$idgrado'";
    $rwalumnos = mysqli_query($conexion, $query);
    $sql="SELECT g.id_grado as idgrado, g.gra_nombre as grado FROM grados AS g WHERE gra_estado = 1";
    $rwgrado = mysqli_query($conexion, $sql);
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
                        <div class="col">
                            <select onchange="enviargrado()" name="filtroidgrado" id="filtroidgrado" class="form-control input-sm">
                                    <option selected >Selecione Grado</option>
                                    <?php
                                        while($grado = mysqli_fetch_array($rwgrado)) {
                                    ?>
                                        <option value="<?php echo $grado['idgrado']?>"><?php echo $grado['grado'];?></option>
                                    <?php }?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="table-responsive justify-content-center">
                            <table id="tblalumnos" class="table table-light text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" >Documento</th>
                                        <th scope="col" >Alumno</th>
                                        <th scope="col" >Grado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($alumnos = mysqli_fetch_array($rwalumnos)) { ?>
                                        <tr>
                                            <td data-bs-dismiss="modal" onclick="obteneralumno(<?php echo $alumnos['docume']; ?>)"><?php echo $alumnos['docume']; ?></td>
                                            <td> <?php echo $alumnos['nombre']; ?></td>
                                            <td> <?php echo $alumnos['grado'];  ?></td>
                                        </tr>
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

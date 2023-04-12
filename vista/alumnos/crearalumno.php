<?php
    include "../../modelo/conexion.php";

    if (isset($_POST['nombre']) && isset($_POST['cladoc']) && isset($_POST['docume']) && isset($_POST['fecnac']) && isset($_POST['sexo']) && isset($_POST['grpsan']) && isset($_POST['factrh'])
    && isset($_POST['estciv']) && isset($_POST['ciudad']) && isset($_POST['direcc']) && isset($_POST['telcel']) && isset($_POST['correo']) && !empty($_POST['nombre'])
    && empty($_POST['cladoc']) && empty($_POST['docume']) && empty($_POST['fecnac']) && empty($_POST['sexo']) && empty($_POST['grpsan']) && empty($_POST['factrh'])
    && empty($_POST['estciv']) && empty($_POST['ciudad']) && empty($_POST['direcc']) && empty($_POST['telcel']) && empty($_POST['correo'])){
        $nombre = $_POST['nombre'];
        $cladoc = $_POST['cladoc'];
        $docume = $_POST['docume'];
        $fecnac = $_POST['fecnac'];
        $sexo   = $_POST['sexo'];
        $grpsan = $_POST['grpsan'];
        $factrh = $_POST['factrh'];
        $estciv = $_POST['estciv'];
        $ciudad = $_POST['ciudad'];
        $direcc = $_POST['direcc'];
        $telcel = $_POST['telcel'];
        $correo = $_POST['correo'];
        $sql = 'insert into alumno (alu_nombre, alu_cladoc, alu_docume, alu_fecnac, alu_sexo, alu_grpsan, alu_factrh, alu_estciv, alu_ciudad, alu_direcc, alu_telcel, alu_correo) values (?,?,?,?,?,?,?,?,?,?,?,)';

        if ($statement = mysqli_prepare($conexion, $sql)){
            mysqli_stmt_bind_param($statement, "sssssssssss", $nombre, $cladoc, $docume, $fecnac, $sexo, $grpsan, $factrh, $estciv, $ciudad, $direcc, $telcel, $correo);
            if (mysqli_stmt_execute($statement)) {
                header("list-alumnos.php");
                exit();
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Creado',
                        text: 'Alumno Creado con exito.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";

            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!',
                        text: 'Error al Crear Alumno.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
            }
            mysqli_stmt_close($statement);
        }
        mysqli_close($conexion);
    }else {

?>

<!-- Modal -->
<!-- Formulario (Agregar, Modificar) -->
<div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Alumno</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="create.php" method="post">
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Estudiante</legend>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombre" name="nombre" class="form-control input-sm" placeholder="Ingrese Nombres" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="cladoc" name="cladoc" class="form-control input-sm" placeholder="Tipo Documento" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="docume" name="docume" class="form-control input-sm" placeholder="Numero Documento" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Fecha Nacimiento</span>
                                    <input type="date" id="fecnac" name="fecnac" class="form-control input-sm" placeholder="Fecha Nacimiento" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input pe="text" id="sexo" name="sexo" class="form-control input-sm" placeholder="Sexo" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Grupo Sanguineo</span>
                                    <input type="text" id="grpsan" name="grpsan" class="form-control input-sm" placeholder="GS" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Factor RH</span>
                                    <input ype="text" id="factrh" name="factrh" class="form-control input-sm" placeholder="FH" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Estado Civil</span>
                                    <input type="text" id="estciv" name="estciv" class="form-control input-sm" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Ciudad Residencia</span>
                                    <input type="text" id="ciudad" name="ciudad" class="form-control input-sm" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Direccion</span>
                                    <input type="text" id="direcc" name="direcc" class="form-control input-sm" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Celular</span>
                                    <input type="text" id="telcel" name="telcel" class="form-control input-sm" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" id="correo" name="correo" class="form-control input-sm" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-success" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Formulario (Agregar, Modificar) -->
<?php 
}
?>
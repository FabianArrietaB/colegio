<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "select * from alumnos";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light align-middle">
        <thead>
            <tr>
                <th scope="col" >Nombres</th>
                <th scope="col" >Codigo</th>
                <th scope="col" >Tipo Documento</th>
                <th scope="col" >Documento</th>
                <th scope="col" >Direccion</th>
                <th scope="col" >Celular</th>
                <th scope="col" >Correo</th>
                <th scope="col" >Estado</th>
                <th>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($alumnos = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $alumnos['alu_nombre']; ?> </td>
                <td> <?php echo $alumnos['alu_grado']; ?></td>
                <td> <?php echo $alumnos['alu_cladoc']; ?></td>
                <td> <?php echo $alumnos['alu_docume']; ?></td>
                <td> <?php echo $alumnos['alu_direcc']; ?></td>
                <td> <?php echo $alumnos['alu_telcel']; ?></td>
                <td> <?php echo $alumnos['alu_correo']; ?></td>
                <td>
                <?php
                    if ($alumnos['alu_estado'] == 0) {
                ?>
                    <button class="btn btn-danger btn-sm" onclick="activarAlumno(
                        <?php echo $alumnos['id_alumno'] ?>,
                        <?php echo $alumnos['alu_estado'] ?>)">
                            INACTIVO
                        </button>
                    <?php
                    } else if ($alumnos['alu_estado'] == 1) {
                    ?>
                        <button class="btn btn-success btn-sm" onclick="activarAlumno(
                            <?php echo $alumnos['id_alumno'] ?>,
                            <?php echo $alumnos['alu_estado'] ?>)">
                            ACTIVO
                        </button>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <button class="btn btn-warning" type="button"><i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                    <button class="btn btn-danger" type="button"><i class="fa-regular fa-trash-can fa-xl"></i></button>
                    <button class="btn btn-info" type="button"><i class="fa-sharp fa-regular fa-circle-info fa-xl"></i></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
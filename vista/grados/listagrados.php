<?php
    session_start();
    //Consulta//
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT
        grados.id_grado         AS idgrado,
        grados.gra_nombre       AS nombre,
        grados.gra_matric       AS matric,
        grados.gra_pensio       AS pensio,
        grados.gra_canalu       AS canalu,
        grados.gra_fecope       AS fecha,
        grados.gra_estado       AS estado,
        empleados.id_empleado   AS idempleado,
        empleados.emp_nombre    AS nompro
        FROM grados AS grados
        INNER JOIN empleados AS empleados ON grados.id_empleado = empleados.id_empleado
        ORDER BY grados.id_grado ASC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >Nombre</th>
                <th scope="col" >Cantidad Alumnos</th>
                <th scope="col" >Director Grupo</th>
                <th scope="col" >Matricula</th>
                <th scope="col" >Pension</th>
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
            while ($grados = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $grados['nombre']; ?> </td>
                <td> <?php echo $grados['canalu']; ?></td>
                <td> <?php echo $grados['nompro']; ?></td>
                <td> <?php echo $grados['matric']; ?></td>
                <td> <?php echo $grados['pensio']; ?></td>
                <td>
                <?php
                    if ($grados['estado'] == 0) {
                ?>
                    <button class="btn btn-danger btn-sm" onclick="activargrado(
                        <?php echo $grados['idgrado'] ?>,
                        <?php echo $grados['estado'] ?>)">
                            INACTIVO
                        </button>
                    <?php
                    } else if ($grados['estado'] == 1) {
                    ?>
                        <button class="btn btn-success btn-sm" onclick="activargrado(
                            <?php echo $grados['idgrado'] ?>,
                            <?php echo $grados['estado'] ?>)">
                            ACTIVO
                        </button>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#editar" onclick="detallegrado('<?php echo $grados['idgrado']?>')"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                    <?php if($_SESSION['usuario']['rol'] == 3) {?> <button type="button" class="btn btn-danger"  onclick="eliminargrado('<?php echo $grados['idgrado']?>')"><i class="fa-regular fa-trash-can fa-beat fa-xl"></i></button>  <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
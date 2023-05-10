<?php
    session_start();
    if ($_SESSION['usuario']['rol'] == 4) {
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT
        empleados.id_empleado AS idempleado,
        empleados.emp_nombre    AS nombre,
        empleados.emp_cladoc    AS cladoc,
        empleados.emp_docume    AS docume,
        empleados.emp_cargo     AS cargo,
        empleados.emp_telcel    AS telcel,
        empleados.emp_ciudad    AS ciudad,
        empleados.emp_direcc    AS direcc,
        empleados.emp_estrat    AS estrat,
        empleados.emp_correo    AS correo,
        empleados.emp_tipcon    AS tipcon,
        empleados.emp_salari    AS salari,
        empleados.emp_codces    AS codces,
        empleados.emp_codeps    AS codeps,
        empleados.emp_codpen    AS codpen,
        empleados.emp_codarl    AS codarl,
        empleados.emp_sexo      AS sexo,
        empleados.emp_estciv    AS estciv,
        empleados.emp_escola    AS escola,
        empleados.emp_gposan    AS gposan,
        empleados.emp_factrh    AS factrh,
        empleados.emp_hijos     AS hijos,
        empleados.emp_estado    AS estado,
        empleados.emp_fecnac    AS fecnac
        FROM empleados AS empleados
        ORDER BY empleados.id_empleado ASC";
    $query = mysqli_query($conexion, $sql);
} else {
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT
        empleados.id_empleado AS idempleado,
        empleados.emp_nombre    AS nombre,
        empleados.emp_cladoc    AS cladoc,
        empleados.emp_docume    AS docume,
        empleados.emp_cargo     AS cargo,
        empleados.emp_telcel    AS telcel,
        empleados.emp_ciudad    AS ciudad,
        empleados.emp_direcc    AS direcc,
        empleados.emp_estrat    AS estrat,
        empleados.emp_correo    AS correo,
        empleados.emp_tipcon    AS tipcon,
        empleados.emp_salari    AS salari,
        empleados.emp_codces    AS codces,
        empleados.emp_codeps    AS codeps,
        empleados.emp_codpen    AS codpen,
        empleados.emp_codarl    AS codarl,
        empleados.emp_sexo      AS sexo,
        empleados.emp_estciv    AS estciv,
        empleados.emp_escola    AS escola,
        empleados.emp_gposan    AS gposan,
        empleados.emp_factrh    AS factrh,
        empleados.emp_hijos     AS hijos,
        empleados.emp_estado    AS estado,
        empleados.emp_fecnac    AS fecnac
        FROM empleados AS empleados
        WHERE empleados.emp_estado = 1
        ORDER BY empleados.id_empleado ASC";
    $query = mysqli_query($conexion, $sql);
    }
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light  text-center">
    <thead>
        <tr>
            <th scope="col" >Nombres</th>
            <th scope="col" >Tipo Documento</th>
            <th scope="col" >Documento</th>
            <th scope="col" >Cargo</th>
            <th scope="col" >Telefono</th>
            <th scope="col" >Correo</th>
            <th scope="col" >Direccion</th>
            <th>Estado</th>
            <th>
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php
        while ($empleados = mysqli_fetch_array($query)){
    ?>
        <tr>
            <td> <?php echo $empleados['nombre']; ?> </td>
            <td> <?php echo $empleados['cladoc']; ?></td>
            <td> <?php echo $empleados['docume']; ?></td>
            <td> <?php echo $empleados['cargo']; ?></td>
            <td> <?php echo $empleados['telcel']; ?></td>
            <td> <?php echo $empleados['correo']; ?></td>
            <td> <?php echo $empleados['direcc']; ?></td>
            <td>
                <?php
                    if ($empleados['estado'] == 0) {
                ?>
                    <button class="btn btn-danger btn-sm" onclick="activarempleado(
                        <?php echo $empleados['idempleado'] ?>,
                        <?php echo $empleados['estado'] ?>)">
                            INACTIVO
                        </button>
                    <?php
                    } else if ($empleados['estado'] == 1) {
                    ?>
                        <button class="btn btn-success btn-sm" onclick="activarempleado(
                            <?php echo $empleados['idempleado'] ?>,
                            <?php echo $empleados['estado'] ?>)">
                            ACTIVO
                        </button>
                    <?php
                    }
                    ?>
            </td>
            <td>
                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#editar" onclick="detalleempleado('<?php echo $empleados['idempleado']?>')"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                <?php if($_SESSION['usuario']['rol'] == 4) {?> <button type="button" class="btn btn-danger"  onclick="eliminarempleado('<?php echo $empleados['idempleado']?>')"><i class="fa-regular fa-trash-can fa-beat fa-xl"></i></button>  <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- fin de la tabla -->
<!-- carga ficheros -->

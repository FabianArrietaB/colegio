<?php
    session_start();
    if ($_SESSION['usuario']['rol'] == 4) {
    $filtro = '';
    if(isset($_GET['filtro'])){
        $filtro = $_GET['filtro'];
    }
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        e.id_empleado AS idempleado,
        e.id_usuario  AS idusuario,
        e.emp_nombre    AS nombre,
        e.emp_cladoc    AS cladoc,
        e.emp_docume    AS docume,
        e.emp_cargo     AS cargo,
        e.emp_telcel    AS telcel,
        e.emp_ciudad    AS ciudad,
        e.emp_direcc    AS direcc,
        e.emp_estrat    AS estrat,
        e.emp_correo    AS correo,
        e.emp_tipcon    AS tipcon,
        e.emp_salari    AS salari,
        e.emp_codces    AS codces,
        e.emp_codeps    AS codeps,
        e.emp_codpen    AS codpen,
        e.emp_codarl    AS codarl,
        e.emp_sexo      AS sexo,
        e.emp_estciv    AS estciv,
        e.emp_escola    AS escola,
        e.emp_gposan    AS gposan,
        e.emp_factrh    AS factrh,
        e.emp_hijos     AS hijos,
        e.emp_estado    AS estado,
        e.emp_fecnac    AS fecnac
        FROM empleados AS e
        WHERE e.emp_nombre
        LIKE '%$filtro%' || e.emp_nombre LIKE '%$filtro%' ||  e.emp_docume LIKE '%$filtro%'
        ORDER BY e.id_empleado ASC";
    $query = mysqli_query($conexion, $sql);
} else {
    $filtro = '';
    if(isset($_GET['filtro'])){
        $filtro = $_GET['filtro'];
    }
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT
        e.id_empleado AS idempleado,
        e.emp_nombre    AS nombre,
        e.emp_cladoc    AS cladoc,
        e.emp_docume    AS docume,
        e.emp_cargo     AS cargo,
        e.emp_telcel    AS telcel,
        e.emp_ciudad    AS ciudad,
        e.emp_direcc    AS direcc,
        e.emp_estrat    AS estrat,
        e.emp_correo    AS correo,
        e.emp_tipcon    AS tipcon,
        e.emp_salari    AS salari,
        e.emp_codces    AS codces,
        e.emp_codeps    AS codeps,
        e.emp_codpen    AS codpen,
        e.emp_codarl    AS codarl,
        e.emp_sexo      AS sexo,
        e.emp_estciv    AS estciv,
        e.emp_escola    AS escola,
        e.emp_gposan    AS gposan,
        e.emp_factrh    AS factrh,
        e.emp_hijos     AS hijos,
        e.emp_estado    AS estado,
        e.emp_fecnac    AS fecnac
        FROM empleados AS e
        WHERE e.emp_estado = 1
        AND LIKE '%$filtro%' || e.emp_nombre LIKE '%$filtro%' ||  e.emp_docume LIKE '%$filtro%'
        ORDER BY e.id_empleado ASC";
    $query = mysqli_query($conexion, $sql);
    }
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light  text-center" id="Recargar">
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

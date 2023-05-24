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
        FROM alumnos as a
        LEFT JOIN grados as g ON a.id_grado = g.id_grado
        WHERE a.alu_nombre LIKE '%$filtro%' || g.gra_nombre LIKE '%$filtro%' ||  a.alu_docume LIKE '%$filtro%'
        ORDER BY a.id_alumno ASC";
        $query = mysqli_query($conexion, $sql);
    } else {
        include "../../modelo/conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
        $sql = "SELECT
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
            FROM alumnos as a
            INNER JOIN grados as g ON a.id_grado = g.id_grado
            WHERE a.alu_estado = 1
            ORDER BY a.id_alumno ASC";
        $query = mysqli_query($conexion, $sql);
    }
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center" id="Recargar">
        <thead>
            <tr>
                <th scope="col" >Nombres</th>
                <th scope="col" >Grado</th>
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
        <?php while ($alumnos = mysqli_fetch_array($query)) { ?>
            <tr>
                <td> <?php echo $alumnos['nombre']; ?> </td>
                <td> <?php echo $alumnos['grado']; ?></td>
                <td> <?php echo $alumnos['direcc']; ?></td>
                <td> <?php echo $alumnos['telcel']; ?></td>
                <td> <?php echo $alumnos['correo']; ?></td>
                <td>
                    <?php if ($alumnos['estado'] == 0) { ?>
                        <button class="btn btn-danger btn-sm" onclick="activaralumno(<?php echo $alumnos['idalumno'] ?>, <?php echo $alumnos['estado'] ?>)">INACTIVO</button>
                    <?php } else if ($alumnos['estado'] == 1) { ?>
                        <button class="btn btn-success btn-sm" onclick="activaralumno(<?php echo $alumnos['idalumno'] ?>, <?php echo $alumnos['estado'] ?>)">ACTIVO</button>
                    <?php } ?>
                </td>
                <td>
                    <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#editar" onclick="detallealumno('<?php echo $alumnos['idalumno']?>')"><i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                    <?php if($_SESSION['usuario']['rol'] == 4) {?> <button type="button" class="btn btn-danger"  onclick="eliminaralumno('<?php echo $alumnos['idalumno']?>')"><i class="fa-regular fa-trash-can fa-xl"></i></button>  <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
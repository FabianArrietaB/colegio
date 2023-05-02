<?php
    session_start();
    if ($_SESSION['usuario']['rol'] == 3) {
        include "../../modelo/conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
        $sql = "SELECT DISTINCT
            acudientes.id_acudiente AS idacudiente,
            acudientes.acu_nombre  AS nombre,
            acudientes.acu_cladoc  AS cladoc,
            acudientes.acu_docume  AS docume,
            acudientes.acu_ciudad  AS ciudad,
            acudientes.acu_direcc  AS direcc,
            acudientes.acu_estrat  AS estrat,
            acudientes.acu_telcel  AS telcel,
            acudientes.acu_correo  AS correo,
            acudientes.acu_estado  AS estado,
            acudientes.acu_fecope  AS fecha,
            alumnos.id_alumno      AS idalumno,
            alumnos.alu_nombre     AS nomalu,
            grados.id_grado        AS idgrado,
            grados.gra_nombre      AS grado
            FROM acudientes AS acudientes
            INNER JOIN alumnos AS alumnos ON acudientes.id_alumno = alumnos.id_alumno
            INNER JOIN grados AS grados ON grados.id_grado = alumnos.id_grado
            ORDER BY acudientes.id_acudiente ASC";
        $query = mysqli_query($conexion, $sql);
    } else {
        include "../../modelo/conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
        $sql = "SELECT DISTINCT
            acudientes.id_acudiente AS idacudiente,
            acudientes.acu_nombre  AS nombre,
            acudientes.acu_cladoc  AS cladoc,
            acudientes.acu_docume  AS docume,
            acudientes.acu_ciudad  AS ciudad,
            acudientes.acu_direcc  AS direcc,
            acudientes.acu_estrat  AS estrat,
            acudientes.acu_telcel  AS telcel,
            acudientes.acu_correo  AS correo,
            acudientes.acu_estado  AS estado,
            acudientes.acu_fecope  AS fecha,
            alumnos.id_alumno      AS idalumno,
            alumnos.alu_nombre     AS nomalu,
            grados.id_grado        AS idgrado,
            grados.gra_nombre      AS grado
            FROM acudientes AS acudientes
            INNER JOIN alumnos AS alumnos ON acudientes.id_alumno = alumnos.id_alumno
            INNER JOIN grados AS grados ON grados.id_grado = alumnos.id_grado
            WHERE acudientes.acu_estado = 1
            ORDER BY acudientes.id_acudiente ASC";
        $query = mysqli_query($conexion, $sql);
    }
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >Nombres</th>
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
            while ($acudientes = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $acudientes['nombre']; ?> </td>
                <td> <?php echo $acudientes['cladoc']; ?></td>
                <td> <?php echo $acudientes['docume']; ?></td>
                <td> <?php echo $acudientes['direcc']; ?></td>
                <td> <?php echo $acudientes['telcel']; ?></td>
                <td> <?php echo $acudientes['correo']; ?></td>
                <td>
                <?php
                    if ($acudientes['estado'] == 0) {
                ?>
                    <button class="btn btn-danger btn-sm" onclick="activaracumno(
                        <?php echo $acudientes['idacudiente'] ?>,
                        <?php echo $acudientes['estado'] ?>)">
                            INACTIVO
                        </button>
                    <?php
                    } else if ($acudientes['estado'] == 1) {
                    ?>
                        <button class="btn btn-success btn-sm" onclick="activaracumno(
                            <?php echo $acudientes['idacudiente'] ?>,
                            <?php echo $acudientes['estado'] ?>)">
                            ACTIVO
                        </button>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#editar" onclick="detalleacudiente('<?php echo $acudientes['idacudiente']?>')"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                    <?php if($_SESSION['usuario']['rol'] == 3) {?> <button type="button" class="btn btn-danger"  onclick="eliminaracu('<?php echo $acudientes['idacudiente']?>')"><i class="fa-regular fa-trash-can fa-beat fa-xl"></i></button>  <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
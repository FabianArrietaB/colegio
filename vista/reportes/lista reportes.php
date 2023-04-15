<?php
    session_start();
    //Consulta//
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT
        alumnos.id_alumno   AS idalumno,
        alumnos.alu_nombre  AS nombre,
        alumnos.alu_cladoc  AS cladoc,
        alumnos.alu_docume  AS docume,
        alumnos.alu_sexo    AS sexo,
        alumnos.alu_gposan  AS gposan,
        alumnos.alu_factrh  AS factrh,
        alumnos.alu_ciudad  AS ciudad,
        alumnos.alu_direcc  AS direcc,
        alumnos.alu_estrat  AS estrat,
        alumnos.alu_telcel  AS celula,
        alumnos.alu_correo  AS correo,
        alumnos.alu_estado  AS estado,
        alumnos.alu_fecope  AS fecha,
        grados.id_grado     AS idgrado,
        grados.gra_nombre   AS grado,
        acudientes.id_acudiente  AS idacudiente,
        acudientes.acu_nombre AS nombreacu,
        acudientes.acu_cladoc AS cladocacu,
        acudientes.acu_docume AS documeacu,
        acudientes.acu_ciudad AS ciudadacu,
        acudientes.acu_direcc AS direccacu,
        acudientes.acu_telcel AS celulaacu,
        acudientes.acu_correo AS correoacu,
        acudientes.acu_parent AS parentezc
        FROM alumnos AS alumnos
        INNER JOIN acudientes AS acudientes ON alumnos.id_alumno = acudientes.id_alumno
        INNER JOIN grados AS grados ON grados.id_grado = alumnos.id_grado
        ORDER BY alumnos.id_alumno ASC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light align-middle text-center">
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
                <td> <?php echo $alumnos['nombre']; ?> </td>
                <td> <?php echo $alumnos['grado']; ?></td>
                <td> <?php echo $alumnos['cladoc']; ?></td>
                <td> <?php echo $alumnos['docume']; ?></td>
                <td> <?php echo $alumnos['direcc']; ?></td>
                <td> <?php echo $alumnos['celula']; ?></td>
                <td> <?php echo $alumnos['correo']; ?></td>
                <td>
                <?php
                    if ($alumnos['estado'] == 0) {
                ?>
                    <button class="btn btn-danger btn-sm" onclick="activaralumno(
                        <?php echo $alumnos['idalumno'] ?>,
                        <?php echo $alumnos['estado'] ?>)">
                            INACTIVO
                        </button>
                    <?php
                    } else if ($alumnos['estado'] == 1) {
                    ?>
                        <button class="btn btn-success btn-sm" onclick="activaralumno(
                            <?php echo $alumnos['idalumno'] ?>,
                            <?php echo $alumnos['estado'] ?>)">
                            ACTIVO
                        </button>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#editar" onclick="editaralumno('<?php echo $alumnos['idalumno']?>')"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
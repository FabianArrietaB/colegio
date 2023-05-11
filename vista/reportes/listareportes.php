<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        s.id_solicitud      AS idsolicitud,
        s.id_usuario        AS idusuario,
        u.user_nombre       AS usuario,
        s.id_grado          AS idgrado,
        g.gra_nombre        AS grado,
        s.id_empleado       AS idempleado,
        s.rep_tipo          AS tiposolicitud,
        s.rep_detalle       AS detalle,
        s.rep_solucion      AS solucion,
        s.rep_estado        AS estado
    FROM solicitudes AS s
    INNER JOIN grados as g ON s.id_grado = g.id_grado
    INNER JOIN usuarios AS u ON s.id_usuario = u.id_usuario
    ORDER BY s.id_solicitud ASC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio del contenido principal -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center"">
        <thead class="thead-light">
            <tr>
                <th>Tipo</th>
                <th>Detalle</th>
                <th>Estado</th>
                <th>Respuesta</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php while ($reportes = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php if ($reportes['tiposolicitud'] == 1) { ?>
                        <span">SOLICITUD</span>
                    <?php } else if ($reportes['tiposolicitud'] == 2) { ?>
                        <span >REPORTE</span>
                    <?php } ?></td>
                <td><?php echo $reportes['detalle']; ?></td>
                <td>
                    <?php if ($reportes['estado'] == 0) { ?>
                        <span class="badge text-bg-success">ABIERTO</span>
                    <?php } else if ($reportes['estado'] == 1) { ?>
                        <span class="badge text-bg-danger">CERRADO</span>
                    <?php } ?>
                </td>
               
                <td><?php if ($reportes['solucion'] == 0) { ?>
                        <span">SIN RESPUESTA</span>
                    <?php } else { ?>
                        <?php echo $reportes['solucion']; ?>
                    <?php } ?>
                </td>
                <td>
                <?php if ($reportes['estado'] == 0) { ?><button type="button" class="btn btn-danger"  onclick="eliminarsolicitud('<?php echo $reportes['idsolicitud']?>')"><i class="fa-regular fa-trash-can fa-beat fa-xl"></i></button><?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

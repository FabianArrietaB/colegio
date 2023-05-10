<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        s.id_solicitud      AS idsolicitud,
        s.id_usuario        AS idusuario,
        s.id_grado          AS idgrado,
        g.gra_nombre        AS grado,
        s.id_empleado       AS idempleado,
        s.rep_tipo          AS tiposolicitud,
        s.rep_detalle       AS detalle,
        s.rep_solucion      AS solucion,
        s.rep_estado        AS estado
    FROM solicitudes AS s
    INNER JOIN grados as g ON s.id_grado = g.id_grado
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
                <th>Encargado</th>
                <th>Respuesta</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php while ($reportes = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $reportes['tiposolicitud']; ?></td>
                <td><?php echo $reportes['detalle']; ?></td>
                <td>
                    <?php if ($reportes['estado'] == 0) { ?>
                        <span">ABIERTO</span>
                    <?php } else if ($reportes['estado'] == 1) { ?>
                        <span >CERRAO</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($reportes['idempleado'] == 0) { ?>
                        <span">NO ASIGNADO</span>
                    <?php } else { ?>
                        <?php echo $reportes['idempleado']; ?>
                    <?php } ?>
                <td><?php if ($reportes['solucion'] == 0) { ?>
                        <span">SIN RESPUESTA</span>
                    <?php } else { ?>
                        <?php echo $reportes['solucion']; ?>
                    <?php } ?>
                <td>
                    <button type="button" class="btn btn-danger"  onclick="eliminarsolicitud('<?php echo $reportes['idsolicitud']?>')"><i class="fa-regular fa-trash-can fa-beat fa-xl"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

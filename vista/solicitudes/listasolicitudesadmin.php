<?php
session_start();
include "../../modelo/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT
    s.id_solicitud      AS idsolicitud,
    s.id_usuario        AS idusuario,
    u.user_nombre       AS usuario,
    s.id_grado          AS idgrado,
    s.id_venta          AS idventa,
    g.gra_nombre        AS grado,
    s.id_operador       AS idoperador,
    s.rep_tipo          AS tiposolicitud,
    s.rep_detalle       AS detalle,
    s.rep_solucion      AS solucion,
    s.rep_fecope        AS fecoperacion,
    s.rep_fecupd        AS fecsolucion,
    s.rep_estado        AS estado
FROM solicitudes AS s
INNER JOIN usuarios AS u ON s.id_usuario = u.id_usuario
INNER JOIN grados as g ON s.id_grado = g.id_grado
ORDER BY s.id_solicitud ASC";
$query = mysqli_query($conexion, $sql);
?>
<!-- inicio del contenido principal -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center"">
        <thead class="thead-light">
            <tr>
                <th>Alumno</th>
                <th>Grado</th>
                <th>Tipo</th>
                <th>Detalle</th>
                <th>Venta</th>
                <th>Estado</th>
                <th>Fecha Creacion</th>
                <th>Fecha Respuesta</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php while ($solicitudes = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $solicitudes['usuario']; ?></td>
                <td><?php echo $solicitudes['grado']; ?></td>
                <td>
                <?php if ($solicitudes['tiposolicitud'] == 1) { ?>
                        <span">SOLICITUD</span>
                <?php } else if ($solicitudes['tiposolicitud'] == 2) { ?>
                        <span >REPORTE</span>
                <?php } ?>
                </td>
                <td><?php echo $solicitudes['detalle']; ?></td>
                <td>
                <?php if ($solicitudes['idventa'] == 0 && $solicitudes['tiposolicitud'] == 1) { ?>
                        <span class="badge text-bg-success">ABIERTO</span>
                    <?php } else if ($solicitudes['idventa'] > 0 && $solicitudes['tiposolicitud'] == 1) { ?>
                        <span class="badge text-bg-success">VENTA</span>
                    <?php } else { ?>
                        <span class="badge text-bg-danger">CERRADO</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($solicitudes['estado'] == 0) { ?>
                        <span class="badge text-bg-success">ABIERTO</span>
                    <?php } else if ($solicitudes['estado'] == 1) { ?>
                        <span class="badge text-bg-danger">CERRADO</span>
                    <?php } ?>
                </td>
                <td><?php echo $solicitudes['fecoperacion']; ?></td>
                <td><?php echo $solicitudes['fecsolucion']; ?></td>
                <td>
                    <?php if ($solicitudes['estado'] == 0 &&  $solicitudes['tiposolicitud'] == 2) { ?> <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#solucion" onclick="detallesolicitud('<?php echo $solicitudes['idsolicitud']?>')"><i class="fa-solid fa-check-to-slot fa-xl"></i></button><?php } ?>
                    <?php if ($solicitudes['estado'] == 0 && $solicitudes['tiposolicitud'] == 1) { ?> <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#venta" onclick="detallesolicitud('<?php echo $solicitudes['idsolicitud']?>')"><i class="fa-solid fa-check-to-slot fa-xl"></i></button><?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        m.id_matricula AS idmatricula,
        m.mat_saldo AS saldo,
        m.mat_detalle AS detalle,
        m.mat_valmat AS matricula,
        m.mat_fecope AS fecha,
        m.id_alumno AS idalumno,
        a.alu_nombre AS nombre,
        m.id_grado AS idgrado,
        g.gra_nombre AS grado
        FROM matriculas AS m
        INNER JOIN alumnos AS a ON m.id_alumno = a.id_alumno
        INNER JOIN grados AS g ON m.id_grado = g.id_grado
        ORDER BY m.id_matricula ASC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio del contenido principal -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center"">
        <thead class="thead-light">
            <tr>
                <th>Nombre Alumno</th>
                <th>Grado</th>
                <th>Valor Matricula</th>
                <th>Saldo Anterior</th>
                <th>Detalle</th>
                <th>Fecha Ultimo Pago</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($matriculas = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $matriculas['nombre'];?></td>
                <td><?php echo $matriculas['grado'];?></td>
                <td><?php echo $matriculas['matricula'];?></td>
                <td><?php echo $matriculas['saldo'];?></td>
                <td><?php echo $matriculas['detalle'];?></td>
                <td><?php echo $matriculas['fecha'];?></td>
                <td>
                    <input class="btn btn-success" type="button" value="Tomar Pago" data-bs-toggle="modal" data-bs-target="#pago" onclick="detallematricula('<?php echo $matriculas['idalumno']?>')">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
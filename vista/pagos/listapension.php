<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        m.id_matricula AS idmatricula,
        m.mat_saldo AS saldo,
        m.id_tipopago AS idtippago,
        m.mat_pensio AS pension,
        m.mat_fecope AS fecha,
        m.id_alumno AS idalumno,
        m.mat_fecpen AS fecpen,
        a.alu_nombre AS nombre,
        m.id_grado AS idgrado,
        g.gra_nombre AS grado
        FROM matriculas AS m
        INNER JOIN alumnos AS a ON m.id_alumno = a.id_alumno
        INNER JOIN grados AS g ON m.id_grado = g.id_grado
        WHERE m.mat_saldo > 0
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
                <th>Valor Pension</th>
                <th>Ultimo Pago</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $hoy = date("d-m-Y");
                while ($matriculas = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $matriculas['nombre'];?></td>
                <td><?php echo $matriculas['grado'];?></td>
                <td><?php echo $matriculas['pension'];?></td>
                <td><?php echo $matriculas['fecpen'];?></td>
                <td><?php echo $hoy;?> </td>
                <td>
                    <input class="btn btn-success" type="button" value="Tomar Pago" data-bs-toggle="modal" data-bs-target="#pago" onclick="detallematricula('<?php echo $matriculas['idmatricula']?>')">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
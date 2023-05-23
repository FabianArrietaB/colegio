<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        m.id_matricula AS idmatricula,
        m.mat_saldo AS saldo,
        m.id_tippagpen AS idtippago,
        m.mat_pensio AS pension,
        m.mat_salpen AS salpen,
        m.mat_fecope AS fecha,
        m.id_alumno AS idalumno,
        m.mat_fecpen AS fecpen,
        a.alu_nombre AS nombre,
        m.id_grado AS idgrado,
        g.gra_nombre AS grado
        FROM matriculas AS m
        INNER JOIN alumnos AS a ON m.id_alumno = a.id_alumno
        INNER JOIN grados AS g ON m.id_grado = g.id_grado
        ORDER BY m.mat_fecpen ASC";
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
                <th>Saldo Anterior</th>
                <th>Estado</th>
                <th>Ultimo Pago</th>
                <th>Dias Proximo Pago</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $fecha_actual = date("d-m-Y");
                while ($matriculas = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $matriculas['nombre'];?></td>
                <td><?php echo $matriculas['grado'];?></td>
                <td><?php echo $matriculas['pension'];?></td>
                <td><?php echo $matriculas['salpen'];?></td>
                <td><?php if ($matriculas['idtippago'] == 0) { ?>
                        <span class="badge text-bg-danger">NO REGISTRA PAGO</span>
                    <?php } else if ($matriculas['idtippago'] == 3)  { ?>
                        <span class="badge text-bg-warning">ABONO PENSION</span>
                    <?php } else if ($matriculas['idtippago'] == 4)  { ?>
                        <span class="badge text-bg-success">PAGO TOTAL</span>
                    <?php } ?>
                </td>

                <td><?php echo $matriculas['fecpen'];?></td>
                <td><?php
                        $propag = $matriculas['fecpen'];
                        $mes = date("d-m-Y",strtotime($propag."+ 1 month"));
                        $dateDifference = abs(strtotime($mes) - strtotime($fecha_actual));
                        $dias = $dateDifference / (60*60*24);
                        echo $dias;
                        if ($dias >= 30 && $dias < 16) {
                    ?>
                        <span class="badge text-bg-success value" ></span>
                    <?php } else if ($dias <= 15)  { ?>
                        <span class="badge text-bg-warning"><?php echo $dias ?></span>
                    <?php } else if ($dias <= 5)  { ?>
                        <span class="badge text-bg-danger"><?php echo $dias ?></span>
                    <?php } ?>
                </td>
                <td>
                    <input class="btn btn-success" type="button" value="Tomar Pago" data-bs-toggle="modal" data-bs-target="#pension" onclick="detallepension('<?php echo $matriculas['idmatricula']?>')">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
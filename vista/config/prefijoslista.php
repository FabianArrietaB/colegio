<?php
include "../../modelo/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT
    p.id_prefij  AS codigo,
    p.pre_tipmov AS tipmov,
    p.pre_prefij AS prefij,
    p.pre_nombre AS nombre,
    p.pre_consec AS consec,
    p.pre_inicio AS inicio,
    p.pre_final  AS final,
    p.pre_fecini AS fecini,
    p.pre_fecven AS fecven,
    p.pre_estado AS estado,
    p.pre_fecope AS fecope,
    p.pre_fecupd AS fecupd,
    m.mov_nombre AS nommov
FROM prefijos AS p
INNER JOIN movimientos AS m ON m.id_tipmov = p.pre_tipmov";
$query=mysqli_query($conexion,$sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center" id="tblparafiscales">
        <thead>
            <tr>
                <th scope="col" >Codigo</th>
                <th scope="col" >prefij</th>
                <th scope="col" >Nombre</th>
                <th scope="col" >Tipo Moviento</th>
                <th scope="col" >Consecutivo</th>
                <th scope="col" >Num Inicial</th>
                <th scope="col" >Num Final</th>
                <th scope="col" >Fecha Inicial</th>
                <th scope="col" >Fecha Final</th>
                <th scope="col" >Fecha Operacion</th>
                <th scope="col" >Estado</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($prefijos = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo str_pad($prefijos['codigo'],2,"0",STR_PAD_LEFT); ?> </td>
                <td data-bs-toggle="modal" data-bs-target="#prefijoeditar" onclick="detalleprefijo('<?php echo $prefijos['codigo']?>')"> <?php echo $prefijos['prefij']; ?> </td>
                <td> <?php echo $prefijos['nombre']; ?> </td>
                <td> <?php echo $prefijos['tipmov']; ?> </td>
                <td> <?php echo $prefijos['consec']; ?> </td>
                <td> <?php echo $prefijos['inicio']; ?> </td>
                <td> <?php echo $prefijos['final']; ?> </td>
                <td> <?php echo $prefijos['fecini']; ?> </td>
                <td> <?php echo $prefijos['fecven']; ?> </td>
                <td> <?php echo $prefijos['fecope']; ?> </td>
                <td> <?php echo $prefijos['fecope']; ?> </td>
                <td> <?php
                    if ($prefijos['estado'] == 0) {
                    ?>
                        <button class="btn btn-danger btn-sm" onclick="activarmovimiento(
                        <?php echo $prefijos['codigo'] ?>,
                        <?php echo $prefijos['estado'] ?>)">
                        INACTIVO
                        </button>
                        <?php
                    } else if ($prefijos['estado'] == 1) {
                        ?>
                        <button class="btn btn-success btn-sm" onclick="activarmovimiento(
                        <?php echo $prefijos['codigo'] ?>,
                        <?php echo $prefijos['estado'] ?>)">
                        ACTIVO
                        </button>
                    <?php
                    }
                    ?>
                </td>
            <?php } ?>
        </tbody>
    </table>
</div>
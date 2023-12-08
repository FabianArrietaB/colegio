<?php
include "../../modelo/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT
    m.id_tipmov AS codigo,
    m.mov_nombre AS nombre,
    m.mov_detall AS detall,
    m.mov_estado AS estado,
    m.mov_operad AS operad,
    m.mov_usuari AS usuari,
    m.mov_fecope AS fecope,
    m.mov_fecupd AS fecupd
FROM movimientos AS m";
$query=mysqli_query($conexion,$sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center" id="tblparafiscales">
        <thead>
            <tr>
                <th scope="col" >Codigo</th>
                <th scope="col" >Nombre</th>
                <th scope="col" >Estado</th>
                <th scope="col" >Fecha</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($movimientos = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo str_pad($movimientos['codigo'],2,"0",STR_PAD_LEFT); ?> </td>
                <td data-bs-toggle="modal" data-bs-target="#tipmoveditar" onclick="detallemovimiento('<?php echo $movimientos['codigo']?>')"> <?php echo $movimientos['nombre']; ?> </td>
                <td> <?php
                    if ($movimientos['estado'] == 0) {
                    ?>
                        <button class="btn btn-danger btn-sm">
                        INACTIVO
                        </button>
                        <?php
                    } else if ($movimientos['estado'] == 1) {
                        ?>
                        <button class="btn btn-success btn-sm">
                        ACTIVO
                        </button>
                    <?php
                    }
                    ?></td>
                <td> <?php echo $movimientos['fecope']; ?> </td>
            <?php } ?>
        </tbody>
    </table>
</div>
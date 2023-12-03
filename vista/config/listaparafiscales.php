<?php
include "../../modelo/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT
            p.id_parafiscal AS idparafiscal,
            p.par_nit AS nit,
            p.id_tipo AS idtip,
            p.par_nombre AS nombre
        FROM parafiscales AS p";
$query=mysqli_query($conexion,$sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center" id="tblparafiscales">
        <thead>
            <tr>
                <th scope="col" >Nit</th>
                <th scope="col" >Nombre Entidad</th>
                <th scope="col" >Codigo</th>
                <th scope="col" >Regime</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($parafiscal = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $parafiscal['nit']; ?> </td>
                <td> <?php echo $parafiscal['nombre']; ?> </td>
                <td>
                <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#editar" onclick="detalleparafiscal('<?php echo $parafiscal['idparafiscal']?>')"><i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                </td>
            <?php } ?>
        </tbody>
    </table>
</div>
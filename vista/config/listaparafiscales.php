<?php
include "../../modelo/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT
            p.id_parafiscales AS idparafiscal,
            p.par_nombre AS nombre
        FROM parafiscales AS p";
$query=mysqli_query($conexion,$sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >Nombre</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($grados = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $grados['nombre']; ?> </td>
            <?php } ?>
        </tbody>
    </table>
</div>
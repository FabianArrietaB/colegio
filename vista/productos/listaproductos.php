<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "select * from productos";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light  align-middle">
    <thead>
        <tr>
            <th scope="col" >Nombres</th>
            <th scope="col" >Categoria</th>
            <th scope="col" >Precio</th>
            <th>
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php
        while ($productos = mysqli_fetch_array($query)){
    ?>
        <tr>
            <td> <?php echo $productos['pro_nombre']; ?> </td>
            <td> <?php echo $productos['pro_catego']; ?></td>
            <td> <?php echo $productos['pro_precio']; ?></td>
            <td>
                <button class="btn btn-warning" type="button"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                <button class="btn btn-danger" type="button"><i class="fa-regular fa-trash-can fa-beat fa-xl"></i></button>
                <button class="btn btn-info" type="button"><i class="fa-solid fa-circle-info fa-beat fa-xl"></i></i></button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- fin de la tabla -->
<!-- carga ficheros -->

<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT * FROM usuarios AS usuarios INNER JOIN roles AS roles ON usuarios.id_rol = roles.id_rol;";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light  align-middle">
    <thead>
        <tr>
            <th scope="col" >Usuario</th>
            <th scope="col" >Nombres</th>
            <th scope="col" >Correo</th>
            <th scope="col" >Rol</th>
            <th scope="col" >Fecha</th>
            <th scope="col" >Estado</th>
            <th>
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php
        while ($usuarios = mysqli_fetch_array($query)){
    ?>
        <tr>
            <td> <?php echo $usuarios['user_usuario']; ?> </td>
            <td> <?php echo $usuarios['user_nombre']; ?></td>
            <td> <?php echo $usuarios['user_correo']; ?></td>
            <td> <?php echo $usuarios['rol_nombre']; ?></td>
            <td> <?php echo $usuarios['user_fecope']; ?></td>
            <td> <?php
                if ($usuarios['user_estado'] == 0) {
                ?>
                    <button class="btn btn-danger btn-sm" onclick="activarUsuario(
                        <?php echo $usuarios['id_usuario'] ?>,
                        <?php echo $usuarios['user_estado'] ?>)">
                            INACTIVO
                        </button>
                    <?php
                    } else if ($usuarios['user_estado'] == 1) {
                    ?>
                        <button class="btn btn-success btn-sm" onclick="activarUsuario(
                            <?php echo $usuarios['id_usuario'] ?>,
                            <?php echo $usuarios['user_estado'] ?>)">
                            ACTIVO
                        </button>
                    <?php
                    }
                    ?></td>
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

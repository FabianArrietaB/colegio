<?php
    session_start();
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT
        usuarios.id_usuario     AS idusuario,
        usuarios.user_usuario   AS usuario,
        usuarios.user_nombre    AS nombre,
        usuarios.user_correo    AS correo,
        usuarios.id_rol         AS idrol,
        roles.rol_nombre        AS rol,
        usuarios.user_estado     AS estado,
        usuarios.user_fecope     AS fecha
        FROM usuarios AS usuarios
        INNER JOIN roles AS roles ON usuarios.id_rol = roles.id_rol;";
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
            <td> <?php echo $usuarios['usuario']; ?> </td>
            <td> <?php echo $usuarios['nombre']; ?></td>
            <td> <?php echo $usuarios['correo']; ?></td>
            <td> <?php echo $usuarios['rol']; ?></td>
            <td> <?php echo $usuarios['fecha']; ?></td>
            <td> <?php
                if ($usuarios['estado'] == 0) {
                ?>
                    <button class="btn btn-danger btn-sm" onclick="activarUsuario(
                        <?php echo $usuarios['idusuario'] ?>,
                        <?php echo $usuarios['estado'] ?>)">
                            INACTIVO
                        </button>
                    <?php
                    } else if ($usuarios['estado'] == 1) {
                    ?>
                        <button class="btn btn-success btn-sm" onclick="activarUsuario(
                            <?php echo $usuarios['idusuario'] ?>,
                            <?php echo $usuarios['estado'] ?>)">
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

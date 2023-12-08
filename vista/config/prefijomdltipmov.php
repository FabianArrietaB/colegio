<?php
    $filtro = '';
    if(isset($_GET['filtro'])){
        $filtro = $_GET['filtro'];
    }
    include "../../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $query = "SELECT
        m.id_tipmov AS codigo,
        m.mov_nombre AS nombre,
        m.mov_detall AS detall,
        m.mov_estado AS estado,
        m.mov_operad AS operad,
        m.mov_usuari AS usuari,
        m.mov_fecope AS fecope,
        m.mov_fecupd AS fecupd
    FROM movimientos AS m";
    $datos = mysqli_query($conexion, $query);
?>
<!-- Formulario (Agregar) -->
<div class="modal fade" id="tipmovimientos" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccionar Tipo Movimiento</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario (Alumno) -->
                <fieldset class="group-border">
                    <legend class="group-border mb-4"></legend>
                    <div class="row">
                        <div class="table-responsive justify-content-center">
                            <table id="tblalumnos" class="table table-light text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" >codigo</th>
                                        <th scope="col" >nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($tipmov = mysqli_fetch_array($datos)) { ?>
                                        <tr>
                                            <td data-bs-dismiss="modal" onclick="obtenermovimiento(<?php echo $tipmov['codigo']; ?>)"><?php echo str_pad($tipmov['codigo'],2,"0",STR_PAD_LEFT); ?></td>
                                            <td> <?php echo $tipmov['nombre']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<!-- Fin Formulario (Agregar) -->

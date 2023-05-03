<?php
    session_start();
    if ($_SESSION['usuario']['rol'] == 3) {
        include "../../modelo/conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
        $sql = "SELECT DISTINCT
            acudientes.id_acudiente AS idacudiente,
            acudientes.acu_nombre  AS nombre,
            acudientes.acu_cladoc  AS cladoc,
            acudientes.acu_docume  AS docume,
            acudientes.acu_ciudad  AS ciudad,
            acudientes.acu_direcc  AS direcc,
            acudientes.acu_estrat  AS estrat,
            acudientes.acu_telcel  AS telcel,
            acudientes.acu_correo  AS correo,
            acudientes.acu_estado  AS estado,
            acudientes.acu_fecope  AS fecha,
            alumnos.id_alumno      AS idalumno,
            alumnos.alu_nombre     AS nomalu,
            grados.id_grado        AS idgrado,
            grados.gra_nombre      AS grado
            FROM acudientes AS acudientes
            INNER JOIN alumnos AS alumnos ON acudientes.id_alumno = alumnos.id_alumno
            INNER JOIN grados AS grados ON grados.id_grado = alumnos.id_grado
            ORDER BY acudientes.id_acudiente ASC";
        $query = mysqli_query($conexion, $sql);
    } else {
        include "../../modelo/conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
        $sql = "SELECT DISTINCT
            acudientes.id_acudiente AS idacudiente,
            acudientes.acu_nombre  AS nombre,
            acudientes.acu_cladoc  AS cladoc,
            acudientes.acu_docume  AS docume,
            acudientes.acu_ciudad  AS ciudad,
            acudientes.acu_direcc  AS direcc,
            acudientes.acu_estrat  AS estrat,
            acudientes.acu_telcel  AS telcel,
            acudientes.acu_correo  AS correo,
            acudientes.acu_estado  AS estado,
            acudientes.acu_fecope  AS fecha,
            alumnos.id_alumno      AS idalumno,
            alumnos.alu_nombre     AS nomalu,
            grados.id_grado        AS idgrado,
            grados.gra_nombre      AS grado
            FROM acudientes AS acudientes
            INNER JOIN alumnos AS alumnos ON acudientes.id_alumno = alumnos.id_alumno
            INNER JOIN grados AS grados ON grados.id_grado = alumnos.id_grado
            WHERE acudientes.acu_estado = 1
            ORDER BY acudientes.id_acudiente ASC";
        $query = mysqli_query($conexion, $sql);
    }
?>
<!-- inicio Tabla -->
<div class="container">
	<div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Employee</div>
            <div class="panel-body">
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Fist Name</th>
                            <th>Last Name</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-bs-toggle="collapse" data-bs-target="#demo1" class="accordion-toggle">
                            <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                            <td>Carlos</td>
                            <td>Mathias</td>
                            <td>Leme</td>
                            <td>SP</td>
                            <td>new</td>
                        </tr>
                        <tr>
                            <td colspan="12" class="hiddenRow">
                                <div class="accordian-body collapse" id="demo1">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="info">
                                                <th>Job</th>
                                                <th>Company</th>
                                                <th>Salary</th>
                                                <th>Date On</th>
                                                <th>Date off</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-bs-toggle="collapse"  class="accordion-toggle" data-bs-target="#demo10">
                                                <td><a href="#">Enginner Software</a></td>
                                                <td>Google</td>
                                                <td>U$8.00000 </td>
                                                <td> 2016/09/27</td>
                                                <td> 2017/09/27</td>
                                                <td>
                                                    <a href="#" class="btn btn-default btn-sm">
                                                        <i class="glyphicon glyphicon-cog"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="hiddenRow">
                                                    <div class="accordian-body collapse" id="demo10">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <td><a href="#"> XPTO 1</a></td>
                                                                    <td>XPTO 2</td>
                                                                    <td>Obs</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>item 1</th>
                                                                    <th>item 2</th>
                                                                    <th>item 3 </th>
                                                                    <th>item 4</th>
                                                                    <th>item 5</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>item 1</td>
                                                                    <td>item 2</td>
                                                                    <td>item 3</td>
                                                                    <td>item 4</td>
                                                                    <td>item 5</td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-default btn-sm">
                                                                            <i class="glyphicon glyphicon-cog"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Scrum Master</td>
                                                <td>Google</td>
                                                <td>U$8.00000 </td>
                                                <td> 2016/09/27</td>
                                                <td> 2017/09/27</td>
                                                <td>
                                                    <a href="#" class="btn btn-default btn-sm">
                                                        <i class="glyphicon glyphicon-cog"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Back-end</td>
                                                <td>Google</td>
                                                <td>U$8.00000 </td>
                                                <td> 2016/09/27</td>
                                                <td> 2017/09/27</td>
                                                <td>
                                                    <a href="#" class="btn btn-default btn-sm">
                                                        <i class="glyphicon glyphicon-cog"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Front-end</td>
                                                <td>Google</td>
                                                <td>U$8.00000 </td>
                                                <td> 2016/09/27</td>
                                                <td> 2017/09/27</td>
                                                <td>
                                                    <a href="#" class="btn btn-default btn-sm">
                                                        <i class="glyphicon glyphicon-cog"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >Alumno</th>
                <th scope="col" >Grado</th>
                <th scope="col" >Nombres</th>
                <th scope="col" >Direccion</th>
                <th scope="col" >Celular</th>
                <th scope="col" >Correo</th>
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
            while ($acudientes = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td> <?php echo $acudientes['nomalu']; ?> </td>
                <td> <?php echo $acudientes['grado']; ?> </td>
                <td> <?php echo $acudientes['nombre']; ?> </td>
                <td> <?php echo $acudientes['direcc']; ?></td>
                <td> <?php echo $acudientes['telcel']; ?></td>
                <td> <?php echo $acudientes['correo']; ?></td>
                <td>
                <?php
                    if ($acudientes['estado'] == 0) {
                ?>
                    <button class="btn btn-danger btn-sm" onclick="activaracumno(
                        <?php echo $acudientes['idacudiente'] ?>,
                        <?php echo $acudientes['estado'] ?>)">
                            INACTIVO
                        </button>
                    <?php
                    } else if ($acudientes['estado'] == 1) {
                    ?>
                        <button class="btn btn-success btn-sm" onclick="activaracumno(
                            <?php echo $acudientes['idacudiente'] ?>,
                            <?php echo $acudientes['estado'] ?>)">
                            ACTIVO
                        </button>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#padre" onclick="detalleacudiente('<?php echo $acudientes['idacudiente']?>')"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                    <?php if($_SESSION['usuario']['rol'] == 3) {?> <button type="button" class="btn btn-danger"  onclick="eliminaracudiente('<?php echo $acudientes['idacudiente']?>')"><i class="fa-regular fa-trash-can fa-beat fa-xl"></i></button>  <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div> -->
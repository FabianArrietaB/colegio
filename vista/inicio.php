<!-- Vista Admin y Supervisro -->
<?php
    include "header.php";
    include "sidebar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 3||
    $_SESSION['usuario']['rol'] == 4) {
    include "../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT
        m.id_matricula AS idmatricula,
        m.mat_saldo AS saldo,
        m.mat_detalle AS detalle,
        m.mat_valmat AS matricula,
        m.mat_fecope AS fecha,
        m.id_alumno AS idalumno,
        a.alu_nombre AS nombre,
        m.id_grado AS idgrado,
        g.gra_nombre AS grado
        FROM matriculas AS m
        INNER JOIN alumnos AS a ON m.id_alumno = a.id_alumno
        INNER JOIN grados AS g ON m.id_grado = g.id_grado
        ORDER BY m.id_matricula ASC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio del contenido principal -->
<section class="home-section">
    <div class="container-fluid">
        <div class="page-content">
            <!-- GRADOS-->
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div class="title">
                        <h2>GRADOS</h2>
                    </div>
                    <div class="row student" style="align-items: center;">
                        <!-- Curso Transicion -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 1 AND alu_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Transicion</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso Primero -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 2 AND alu_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Primero</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso Segundo -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 3 AND alu_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Segundo</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso Tercero -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 4 AND alu_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Tercero</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso Cuarto -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 5 AND alu_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Cuarto</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso Quinto -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 6 AND alu_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Quinto</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso Sexto -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 7 AND alu_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Sexto</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso Septimo -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 8 AND alu_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Septimo</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso Octavo -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 9 AND alu_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Octavo</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso Noveno -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 1 AND alu_estado = 10"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Noveno</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso Decimo -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 1 AND alu_estado = 11"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Decimo</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Curso UnDecimo -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos WHERE id_grado = 1 AND alu_estado = 12"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">UnDecimo</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div class="title">
                        <h2>PAGOS</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-light text-center"">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nombre Alumno</th>
                                    <th>Grado</th>
                                    <th>Valor Matricula</th>
                                    <th>Saldo Anterior</th>
                                    <th>Detalle</th>
                                    <th>Fecha Ultimo Pago</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($matriculas = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $matriculas['nombre'];?></td>
                                    <td><?php echo $matriculas['grado'];?></td>
                                    <td><?php echo $matriculas['matricula'];?></td>
                                    <td><?php echo $matriculas['saldo'];?></td>
                                    <td><?php echo $matriculas['detalle'];?></td>
                                    <td><?php echo $matriculas['fecha'];?></td>
                                    <td>
                                        <input class="btn btn-success" type="button" value="Tomar Pago" data-bs-toggle="modal" data-bs-target="#pago" onclick="detallematricula('<?php echo $matriculas['idalumno']?>')">
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
    </div>
</section>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
    include "pagos.php";
    include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/pagos/pagos.js"></script>
<!-- Vista Alumno -->
<?php }else if($_SESSION['usuario']['rol'] == 1){ ?>
<!-- inicio del contenido principal -->
<section class="home-section">
    <div class="container-fluid">
        <div class="page-content">
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <a class="btn btn-lg btn-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#reporte">
                                <div class="row">
                                    <div class="col-3 text-center"><i class="fa-solid fa-notes-medical fa-2x"></i></div>
                                    <div class="col-9 text-center pt-1"><strong>CREAR REPORTE</strong></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-12">
                            <h4>Mis Reportes</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="tablalistareportes"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "reportes/crearsolicitud.php";
include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/reportes/reportes.js"></script>
<?php }else{
        header("../index.php");
    }
?>
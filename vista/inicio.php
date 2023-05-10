<?php
    include "header.php";
    include "sidebar.php";

    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 1 ||
    $_SESSION['usuario']['rol'] == 2||
    $_SESSION['usuario']['rol'] == 3) {
    include "../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    
    $sql = "SELECT
        matriculas.id_matricula AS idmatricula,
        matriculas.mat_saldo AS saldo,
        matriculas.mat_detalle AS detalle,
        matriculas.mat_valmat AS matricula,
        matriculas.mat_fecope AS fecha,
        matriculas.id_alumno AS idalumno,
        alumnos.alu_nombre AS nombre,
        matriculas.id_grado AS idgrado,
        grados.gra_nombre AS grado
        FROM matriculas AS matriculas
        INNER JOIN alumnos AS alumnos ON matriculas.id_alumno = alumnos.id_alumno
        INNER JOIN grados AS grados ON matriculas.id_grado = grados.id_grado
        ORDER BY matriculas.id_matricula ASC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio del contenido principal -->
<section class="home-section">
    <div class="container-fluid">
        <div class="page-content">
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div class="title">
                        <h2>INFORMACION</h2>
                    </div>
                    <div class="row student" style="align-items: center;">
                        <!-- Numero Alumnos -->
                        <div class="col-sm-4">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="fa fa-users fa-3x"></i>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                    $sql=$conexion->query("SELECT * FROM alumnos"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="float-sm-right">Total de Estudiantes</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Numero Empleados -->
                        <div class="col-sm-4">
                            <div class="card text-white bg-info mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="fa fa-users fa-3x"></i>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                        $sql=$conexion->query("SELECT * FROM usuarios"); $sql= mysqli_num_rows($sql); echo $sql;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="float-sm-right">Total de Usuarios</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="fa fa-users fa-3x"></i>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 30px">
                                                    <?php
                                                        $sql=$conexion->query("SELECT * FROM empleados"); $sql= mysqli_num_rows($sql); echo $sql;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="float-sm-right">Total de Empleados</div>
                                        </div>
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
                                        <input name="" id="" class="btn btn-success" type="button" value="Tomar Pago">
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
<?php require('footer.php'); ?>
<!-- carga ficheros javascript -->
<script src="../public/js/pagos/pagos.js"></script>
<?php
    }else{
        header("../index.php");
    }
?>
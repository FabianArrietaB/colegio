<?php
    include "../header.php";
    include "../sidebar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 1 ||
    $_SESSION['usuario']['rol'] == 2||
    $_SESSION['usuario']['rol'] == 3) {
    $idUsuario = $_SESSION['usuario']['id_usuario'];
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
                                                    include "../../modelo/conexion.php";
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
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nombre Alumno</th>
                                    <th>Grado</th>
                                    <th>Valor Matricula</th>
                                    <th>Saldo Anterior</th>
                                    <th>Fecha Ultimo Pago</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MICHELLE ANDREA ARRIETA BLANCO</td>
                                    <td>Tercero</td>
                                    <td>$1200000</td>
                                    <td>$800000</td>
                                    <td>23 Febrero 2023</td>
                                    <td>
                                        <input name="" id="" class="btn btn-success" type="button" value="Tomar Pago">
                                    </td>
                                </tr>
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
<?php require('../footer.php'); ?>

<?php
    }else{
        header("../login/login.php");
    }
?>
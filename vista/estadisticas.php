<?php
    include "header.php";
    include "sidebar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 4){
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
                                                    include "../modelo/conexion.php";
                                                    $con = new Conexion();
                                                    $conexion = $con->conectar();
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
                        <!-- Numero Usuarios -->
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
                        <!-- Numero Empleados -->
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
        </div>
    </div>
</section>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include ("alumnos/crearalumno.php");
include ("alumnos/crearalumno.php");
?>
<?php
require('footer.php'); 
?>
<!-- carga ficheros javascript -->
<script src="../public/js/alumnos/alumnos.js"></script>

<?php
    }else{
        header("location:../index.php");
    }
?>
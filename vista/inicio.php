<?php 
    session_start();
    if (empty($_SESSION['nombre'])) {
        header('location:login/login.php');
    }
?>
<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">
    <div class="card border-primary">
        <div class="card-header text-center">
            <h2>INFORMACION</h2>
            <div class="row student">
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

    <div id="page-wrapper">
        <div class="card border-primary">
            <div class="card-header">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-head-line">Pagos</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row" style="margin-bottom:20px;">
                    <div class="col-md-12">
                        <fieldset class="scheduler-border" >
                            <legend  class="scheduler-border">Búsqueda:</legend>
                            <form class="form-inline" role="form" id="searchform">
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="alumno" name="alumno" placeholder="Nombre Alumno">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="fecing" name="fecinh" placeholder="Fecha Ingreso">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <select  class="form-control" id="grado" name="grado" >
                                            <option value="0" >Selecciona Grado</option>
                                            <?php
                                                $query = $mysqli -> query ("SELECT * FROM grados");
                                                while ($valores = mysqli_fetch_array($query)) {
                                                    echo '<option value="'.$valores['id_grado'].'">'.$valores['gra_nombre'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" id="find" > Búsqueda </button>
                                <button type="reset" class="btn btn-danger btn-sm" id="clear" > Limpiar </button>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-primary">
        <table></table>
    </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- fin del contenido principal -->

<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>
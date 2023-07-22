<?php
    include "header.php";
    include "sidebar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 4){
    include "../modelo/conexion.php";
    $con = new Conexion();
    $idalumno = '';
    if(isset($_GET['idalumno'])){
        $idalumno = $_GET['idalumno'];
    }
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
?>
<!-- inicio del contenido principal -->
<form id="frmaestadistica" method="post">
<section class="home-section">
    <div class="container-fluid">
        <div class="page-content">
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div class="title">
                        <h2>INFORMACION</h2>
                    </div>
                    <div class="row student" style="align-items: center;">
                        <!-- Valor Ventas -->
                        <div class="col-sm-2">
                            <div class="card border-danger text-white bg-warning mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="fa-solid fa-sack-dollar fa-3x"></i>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 20px">
                                                    <?php
                                                        $sql=$conexion->query("SELECT SUM(ven_precio) as 'precio' from ventas");
                                                        $data = mysqli_fetch_array($sql);
                                                        $precio = $data['precio'];
                                                        echo '$'. $precio;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Total de Ventas</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Numero Alumnos -->
                        <div class="col-sm-2">
                            <div class="card border-success text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 20px">
                                                    <?php
                                                        $sql=$conexion->query("SELECT * FROM alumnos WHERE alu_estado = 0"); $sql= mysqli_num_rows($sql); echo $sql;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <i class="fa fa-graduation-cap fa-3x"></i>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 20px">
                                                    <?php
                                                        $sql=$conexion->query("SELECT * FROM alumnos WHERE alu_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Estudiantes</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Numero Usuarios -->
                        <div class="col-sm-2">
                            <div class="card text-white bg-info mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 20px">
                                                    <?php
                                                        $sql=$conexion->query("SELECT * FROM usuarios WHERE user_estado = 0"); $sql= mysqli_num_rows($sql); echo $sql;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <i class="fa fa-users fa-3x"></i>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 20px">
                                                    <?php
                                                        $sql=$conexion->query("SELECT * FROM usuarios WHERE user_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Usuarios</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Numero Empleados -->
                        <div class="col-sm-2">
                            <div class="card border-success text-white bg-primary mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 20px">
                                                    <?php
                                                        $sql=$conexion->query("SELECT * FROM empleados WHERE emp_estado = 0"); $sql= mysqli_num_rows($sql); echo $sql;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <i class="fa fa-users fa-3x"></i>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 20px">
                                                    <?php
                                                        $sql=$conexion->query("SELECT * FROM empleados WHERE emp_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Empleados</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Numero Matricula -->
                        <div class="col-sm-2">
                            <div class="card border-danger text-white bg-warning mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="fa-solid fa-sack-dollar fa-3x"></i>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 20px">
                                                <?php
                                                        $sql=$conexion->query("SELECT SUM(mat_valmat) as 'matricula' from matriculas");
                                                        $data = mysqli_fetch_array($sql);
                                                        $matricula = $data['matricula'];
                                                        echo '$'. $matricula;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Total Matriculas</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Valor Pension -->
                        <div class="col-sm-2">
                            <div class="card border-danger text-white bg-warning mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="fa-solid fa-sack-dollar fa-3x"></i>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="float-sm-right">&nbsp;
                                                <span style="font-size: 20px">
                                                <?php
                                                        $sql=$conexion->query("SELECT SUM(aud_valor) as 'pension' from auditorias WHERE id_tipopago = 2");
                                                        $data = mysqli_fetch_array($sql);
                                                        $pension = $data['pension'];
                                                        echo '$'. $pension;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="float-sm-right">Total Pension</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card border-primary">
                        <div class="card-header ">
                            <div class="card mb-3">
                                <div class="card-header bg-primary text-left text-white">Filtro de la Consulta</div>
                                <div class="card-body">
                                    <input hidden type="text" id="idalumno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Operacion</span>
                                                <input type="date" id="fecope" name="fecope" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Identificacion</span>
                                                <input type="text" id="docume" name="docume" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <input disabled type="text" id="nombre" name="nombre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Ingreso</span>
                                                <input disabled type="text" id="fecing" name="fecing" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Telefono</span>
                                                <input disabled type="text" id="telcel" name="telcel" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Direccion</span>
                                                <input disabled type="text" id="direcc" name="direcc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grado</span>
                                                <input disabled type="text" id="grado" name="grado" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Correo</span>
                                                <input disabled type="text" id="correo" name="correo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Acudientes</span>
                                                <input disabled type="text" id="nommad" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                <input disabled type="text" id="nompad" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- inicio Tabla -->
                        <div class="table-responsive justify-content-center">
                            <table class="table table-info text-center table-bordered" id="estadisticas">
                                <thead>
                                    <tr>
                                        <th scope="col" >Prefijo</th>
                                        <th scope="col" >Numero</th>
                                        <th scope="col" >Fecha Documento</th>
                                        <th scope="col" >Valor</th>
                                        <th scope="col" >Operador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td><?php echo $idalumno;?></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<!-- 1043698754 -->
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
require('footer.php'); 
?>
<!-- carga ficheros javascript -->
<script src="../public/js/estadisticas/estadisticas.js"></script>

<?php
    }else{
        header("location:../index.php");
    }
?>
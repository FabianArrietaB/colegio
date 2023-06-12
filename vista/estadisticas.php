<?php
    include "header.php";
    include "sidebar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 4){
        $filtro = '';
    if(isset($_GET['filtro'])){
        $filtro = $_GET['filtro'];
    }
    include "../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        au.id_auditoria as idpension,
        au.id_operador  as idoperador,
        u.user_nombre as vendedor,
        au.id_alumno  as idalumno,
        a.alu_nombre  as alumno,
        au.id_grado  as idgrado,
        g.gra_nombre  as grado,
        au.id_tipopago as tippag,
        au.aud_numdoc as idfacturas,
        au.aud_abono  as valor,
        au.aud_fecope  as fecope
        FROM auditorias AS au
        LEFT JOIN alumnos as a ON a.id_alumno = au.id_alumno
        LEFT JOIN grados as g ON g.id_grado = au.id_grado
        LEFT JOIN usuarios as u ON u.id_usuario = au.id_operador
        WHERE a.alu_nombre LIKE '%$filtro%'|| a.alu_docume LIKE '%$filtro%' || g.gra_nombre LIKE '%$filtro%' || au.aud_numdoc LIKE '%$filtro%' || u.user_nombre LIKE '%$filtro%'
        ORDER BY au.id_auditoria ASC";
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
                                                        $sql=$conexion->query("SELECT SUM(mat_valmat) as 'matricula' from matriculas WHERE mat_saldo = 0");
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
                                                        $sql=$conexion->query("SELECT SUM(aud_valor) as 'pension' from auditorias WHERE id_tipopago = 4");
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
                    <div class="row">
                        <form action="" method="GET">
                            <input class="form-control me-xl-2" type="search" onkeyup="filtrar()" placeholder="Buscar" name="filtro" id="filtro">
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <!-- inicio Tabla -->
                    <div class="table-responsive justify-content-center">
                        <table class="table table-light text-center" id="estadisticas">
                            <thead>
                                <tr>
                                    <th scope="col" >Alumno</th>
                                    <th scope="col" >Grado</th>
                                    <th scope="col" >Vendedor</th>
                                    <th scope="col" >Factura</th>
                                    <th scope="col" >Precio</th>
                                    <th scope="col" >Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while ($ventas = mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <td> <?php echo $ventas['alumno']; ?> </td>
                                    <td> <?php echo $ventas['grado']; ?> </td>
                                    <td> <?php echo $ventas['vendedor']; ?> </td>
                                    <td> <?php echo "GVA". ' - ' . $ventas['idfacturas']; ?> </td>
                                    <td> <?php echo $ventas['valor']; ?> </td>
                                    <td> <?php echo $ventas['fecope']; ?> </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
<?php
    include "header.php";
    include "sidebar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 4 ||
    $_SESSION['usuario']['rol'] == 3 ){
    include "../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
?>
<!-- inicio del contenido principal -->
<section class="home-section">
    <div class="container-fluid">
        <div class="page-content">
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-6">
                            <h4>Lista Alumnos</h4>
                        </div>
                        <div class="col-3 border-primary">
                            <form action="" method="GET">
                                <input class="form-control me-xl-2" type="search" placeholder="Buscar" name="filtro" id="filtro">
                            </form>
                        </div>
                        <div class="col-3 border-primary">
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroup-sizing-default">GRADO</span>
                                <select name="grado" id="grado" onchange="selectgrado()" class="form-control input-sm">
                                    <option selected>Seleccione Grado</option>
                                    <?php
                                        $sql="SELECT g.id_grado as idgrado, g.gra_nombre as nombre FROM grados as g";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($grados = mysqli_fetch_array($respuesta)) {
                                    ?>
                                        <option value="<?php echo $grados['idgrado']?>"><?php echo $grados['nombre'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="tablalistaalumnos"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "alumnos/crearalumno.php";
include "alumnos/editaracudiente.php";
include "alumnos/editaralumno.php";
include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/alumnos/alumnos.js"></script>
<script src="../public/js/alumnos/acudientes.js"></script>

<?php
    }else{
        header("location:../index.php");
    }
?>
<?php
    include "header.php";
    include "sidebar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 3||
    $_SESSION['usuario']['rol'] == 4) {
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
                    <div class="title">
                        <h2>REPORTES</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row text-center mb-2">
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <a name="" id="ventasbtn" class="btn btn-primary" href="#" role="button">VENTAS</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <a name="" id="pensionbtn" class="btn btn-primary" href="#" role="button">PENSION</a>
                            </div>
                        </div>
                        <!-- <div class="col-3">
                            <a name="" id="matriculasbtn" class="btn btn-primary" href="#" role="button">MATRICULAS</a>
                        </div> -->
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <a name="" id="facturasbtn" class="btn btn-primary" href="#" role="button">FACTURAS</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div id="tablafacturas"></div>
                    <div id="tablamatriculas"></div>
                    <div id="tablapension"></div>
                    <div id="tablaventas"></div>
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
<script src="../public/js/informes/informes.js"></script>

<?php
    }else{
        header("location:../index.php");
    }
?>
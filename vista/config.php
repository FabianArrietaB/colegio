<?php
    include "header.php";
    include "sidebar.php";
    if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 4){
    include "../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
?>
<!-- inicio del contenido principal -->
<section class="home-section">
    <div class="container-fluid">
        <div class="page-content">
            <div class="card border-primary">
                <div class="card-header bg-success text-center text-white">
                    <div class="row">
                        <div class="col-9">
                            <h4>Datos Empresa</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="config"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "config/empresa.php";
include "config/parafiscales.php";
include "config/seguridad.php";
include "config/sedes.php";
include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/config/config.js"></script>
<?php
    }else{
        header("location:../index.php");
    }
?>
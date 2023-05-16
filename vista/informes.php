<!-- Vista Admin y Supervisor -->
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
                    <div class="row">
                        <div class="col-9">
                            <h4>Panel Informes</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-6 border-primary">
                        <form action="" method="POST">
                            <input class="form-control me-xl-2" type="search" placeholder="Buscar" name="filtro" id="filtro">
                        </form>
                    </div>
                </div>
                    <div id="tablainformes"></div>
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
<?php
    include "header.php";
    include "sidebar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 3 ||
    $_SESSION['usuario']['rol'] == 2 ){
?>
<!-- inicio del contenido principal -->
<section class="home-section">
    <div class="container-fluid">
        <div class="page-content">
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-9">
                            <h4>Lista Empleados</h4>
                        </div>
                        <div class="col-3 border-primary">
                            <input class="form-control me-xl-2" type="search" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="tablalistaempleados"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "empleados/crearempleado.php";
include "empleados/editarempleado.php";
include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/empleados/empleados.js"></script>

<?php
    }else{
        header("location:../index.php");
    }
?>
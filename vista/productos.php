<?php
    include "header.php";
    include "sidebar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 3||
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
                            <h4>Lista Productos</h4>
                        </div>
                        <div class="col-3 border-primary">
                            <input class="form-control me-xl-2" type="search" id="filtro" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="tablalistarproductos"></div>
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
</section>
<!-- fin del contenido principal -->

<!-- por ultimo se carga el footer -->
<?php
include "productos/crearproducto.php";
include "productos/editarproducto.php";
include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/productos/productos.js"></script>

<?php
    }else{
        header("location:../index.php");
    }
?>
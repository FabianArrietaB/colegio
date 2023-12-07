<?php
    include "header.php";
    include "sidebar.php";
?>
<section class="home-section">
    <div class="container-fluid">
        <div class="page-content">
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div href="dashboard.php" class="title">
                        <h2>GENERAR FACTURA</h2>
                    </div>
                </div>
            </div>
            <form id="frmcrearfactura" method="post" onsubmit="return crearfactura()">
                <div class="row">
                    <div class="col-9">
                        <div class="card border-primary">
                            <div class="title">
                                <h4>INFORMACION CLIENTE</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card border-primary">
                            <div class="title">
                                <h4>INFORMACION FACTURA</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="card border-primary">
                            <div class="title">
                                <h4>INFORMACION CLIENTE</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card border-primary">
                            <div class="title">
                                <h4>INFORMACION FACTURA</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Fin Formulario (Agregar, Modificar) -->
<?php
    include "footer.php";
?>

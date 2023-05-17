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
                            <h4>Configuracion Empresa</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2 text-center"">
                            <a type="button" id="empresabtn">
                                <div class="card border-danger text-white bg-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <i class="fa-solid fa-hotel fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-sm-right">Perfil Empresa</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-2 text-center"">
                        <a type="button" id="parafiscalesbtn">
                            <div class="card border-danger text-white bg-primary mb-3">
                            <div class="card-header">
                                <div class="row">
                                <div class="col-sm-12">
                                <i class="fa-solid fa-percent fa-3x"></i>
                                </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-sm-right">Parafiscales</div>
                            </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-sm-2 text-center"">
                        <a data-bs-toggle="modal" data-bs-target="#pais">
                            <div class="card border-danger text-white bg-primary mb-3">
                            <div class="card-header">
                                <div class="row">
                                <div class="col-sm-12">
                                <i class="fa-solid fa-percent fa-3x"></i>
                                </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-sm-right">Paises</div>
                            </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-sm-2 text-center"">
                        <a data-bs-toggle="modal" data-bs-target="#parametros">
                            <div class="card border-danger text-white bg-primary mb-3">
                            <div class="card-header">
                                <div class="row">
                                <div class="col-sm-12">
                                <i class="fa-solid fa-percent fa-3x"></i>
                                </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-sm-right">Parametros</div>
                            </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-sm-2 text-center"">
                        <a data-bs-toggle="modal" data-bs-target="#seguridad">
                            <div class="card border-danger text-white bg-primary mb-3">
                            <div class="card-header">
                                <div class="row">
                                <div class="col-sm-12">
                                <i class="fa-solid fa-shield-halved fa-3x"></i>
                                </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-sm-right">Seguridad</div>
                            </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-sm-2 text-center"">
                        <a data-bs-toggle="modal" data-bs-target="#sedes">
                            <div class="card border-danger text-white bg-primary mb-3">
                            <div class="card-header">
                                <div class="row">
                                <div class="col-sm-12">
                                <i class="fa-regular fa-object-ungroup fa-3x"></i>
                                </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-sm-right">Sedes</div>
                            </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="row">
                        <div id="empresa"></div>
                        <div id="parafiscales"></div>
                        <div id="paises"></div>
                        <div id="parametros"></div>
                        <div id="seguridad"></div>
                        <div id="sedes"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/config/config.js"></script>
<?php
    }else{
        header("location:../index.php");
    }
?>
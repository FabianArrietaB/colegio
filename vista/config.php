<?php
    include "header.php";
    include "sidebar.php";
    if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 4){
    include "../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
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
                        <div class="col-sm-3 text-center">
                            <a class="acard" type="button" id="empresabtn" onclick="detalleempresa('<?php echo $_SESSION['usuario']['id']?>')">
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
                        <div class="col-sm-3 text-center"">
                            <a class="acard" type="button" id="parafiscalesbtn">
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
                        <div class="col-sm-3 text-center">
                            <a class="acard" type="button" id="prefijbtn">
                                <div class="card border-danger text-white bg-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <i class="fa-solid fa-hotel fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-sm-right">Prefijos</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 text-center">
                            <a class="acard" type="button" id="tipmovbtn">
                                <div class="card border-danger text-white bg-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <i class="fa-solid fa-hotel fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-sm-right">Tipo Movimientos</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div id="empresa"></div>
                        <div id="parafiscales"></div>
                        <div id="prefijos"></div>
                        <div id="tipomovimientos"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "config/editarpara.php";
include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/config/config.js"></script>
<?php
    }else{
        header("location:../index.php");
    }
?>

<?php 
    session_start();
    if (empty($_SESSION['nombre'])) {
        header('location:login/login.php');
    }
?>
<!-- primero se carga el topbar -->
<?php require('../layout/header.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('../layout/sidebar.php'); ?>
<!-- inicio del contenido principal -->
<section class="home-section">
    <div class="container-fluid">
        <div class="page-content">
            <div class="card border-primary">
                <div class="card-header text-center">
                <div class="row">
                    <div class="col-3 border-primary">
                        <button routerLink="/addalum" type="button" class="btn btn-success">Nuevo Alumno</button>
                    </div>
                    <div class="col-6">
                        <h4>Lista Alumnos</h4>
                    </div>
                    <div class="col-3 border-primary">
                        <input class="form-control me-sm-2" [(ngModel)]="filterTerm" type="search" placeholder="Search">
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-light">
                        <thead>
                        <tr>
                            <th scope="col" >Nombres</th>
                            <th scope="col" >Codigo</th>
                            <th scope="col" >Tipo Documento</th>
                            <th scope="col" >Documento</th>
                            <th scope="col" >Direccion</th>
                            <th scope="col" >Telefono</th>
                            <th scope="col" >Celular</th>
                            <th scope="col" >Correo</th>
                        </tr>
                    </thead>
                            <tbody>
                                <tr>
                                    <td>MICHELLE ANDREA ARRIETA BLANCO</td>
                                    <td>Tercero</td>
                                    <td>$1200000</td>
                                    <td>$800000</td>
                                    <td>23 Febrero 2023</td>
                                    <td>
                                        <input name="" id="" class="btn btn-success" type="button" value="Tomar Pago">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    <!-- /. PAGE INNER  -->
        </div>
    </div>
</section>
<!-- fin del contenido principal -->

<!-- Formulario (Agregar, Modificar) -->
<div class="modal fade" id="FormularioArticulo" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="Codigo">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Descripción:</label>
                        <input type="text" id="Descripcion" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Precio:</label>
                        <input type="number" id="Precio" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="ConfirmarAgregar" class="btn btn-success">Agregar</button>
                    <button type="button" id="ConfirmarModificar" class="btn btn-success">Modificar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Formulario (Agregar, Modificar) -->
<!-- por ultimo se carga el footer -->
<?php require('../layout/footer.php'); ?>
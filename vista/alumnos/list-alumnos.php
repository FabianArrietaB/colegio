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
                        <div class="col-9">
                            <h4>Lista Alumnos</h4>
                        </div>
                        <div class="col-3 border-primary">
                            <input class="form-control me-xl-2" type="search" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-light  align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" >Nombres</th>
                                    <th scope="col" >Codigo</th>
                                    <th scope="col" >Tipo Documento</th>
                                    <th scope="col" >Documento</th>
                                    <th scope="col" >Direccion</th>
                                    <th scope="col" >Celular</th>
                                    <th scope="col" >Correo</th>
                                    <th>
                                        <div class="d-grid gap-2">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include "../../modelo/conexion.php";
                                $sql = "select * from alumnos";
                                $query = mysqli_query($conexion, $sql);
                                while ($alumnos = mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <td> <?php echo $alumnos['alu_nombre']; ?> </td>
                                    <td> <?php echo $alumnos['alu_grado']; ?></td>
                                    <td> <?php echo $alumnos['alu_cladoc']; ?></td>
                                    <td> <?php echo $alumnos['alu_docume']; ?></td>
                                    <td> <?php echo $alumnos['alu_direcc']; ?></td>
                                    <td> <?php echo $alumnos['alu_telcel']; ?></td>
                                    <td> <?php echo $alumnos['alu_correo']; ?></td>
                                    <td>
                                        <button class="btn btn-warning" type="button"><i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                                        <button class="btn btn-danger" type="button"><i class="fa-regular fa-trash-can fa-xl"></i></button>
                                        <button class="btn btn-info" type="button"><i class="fa-sharp fa-regular fa-circle-info fa-xl"></i></button>
                                    </td>
                                </tr>
                                <?php } ?>
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
<!-- por ultimo se carga el footer -->
<?php 
include ("crearalumno.php");
?>
<?php 
require('../layout/footer.php'); 
?>
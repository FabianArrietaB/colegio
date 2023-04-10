<?php 
    session_start();
    if (empty($_SESSION['nombre'])) {
        header('location:login/login.php');
    }
?>
<!-- primero se carga el topbar -->
<?php require('../layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('../layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">
    <div class="card border-primary">
        <div class="card-header text-center">
            <h2>PAGOS</h2>
        </div>
        <div class="card-body">
        <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre Alumno</th>
                        <th>Grado</th>
                        <th>Valor Matricula</th>
                        <th>Saldo Anterior</th>
                        <th>Fecha Ultimo Pago</th>
                        <th></th>
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
    <!-- /. PAGE INNER  -->
</div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php require('../layout/footer.php'); ?>
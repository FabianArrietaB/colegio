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

<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php require('../layout/footer.php'); ?>
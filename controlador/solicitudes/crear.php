<?php
   session_start();
    $datos = Array(
      'idusuario'  => $_SESSION['usuario']['id'],
      'idgrado'  => $_POST['idgrado'],
      'reptipo'  => $_POST['reptipo'],
      'detalle'  => $_POST['detalle'],
    );
    include "../../modelo/solicitudes.php";
    $Solicitudes = new Solicitudes();
    echo $Solicitudes->crearsolicitud($datos);
?>
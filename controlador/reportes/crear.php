<?php
   session_start();
    $datos = Array(
      'idusuario'  => $_SESSION['usuario']['id'],
      'idgrado'  => $_POST['idgrado'],
      'tiposolicitud'  => $_POST['tiposolicitud'],
      'detalle'  => $_POST['detalle'],
    );
    include "../../modelo/reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->crearsolicitud($datos);
?>
<?php
   session_start();
    $datos = Array(
      'idusuario'  => $_SESSION['usuario']['id'],
      'idgrado'  => $_POST['idgrado'],
      'tiposolicitud'  => $_POST['tiposolicitud'],
      'detalle'  => $_POST['detalle'],
    );
    include "../../modelo/solicitudes.php";
    $Solicitudes = new Solicitudes();
    echo $Solicitudes->crearsolicitud($datos);
?>
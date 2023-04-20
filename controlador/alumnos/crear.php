<?php
   $datos = array(
      "nombre" => $_POST['nombre'],
      "cladoc" => $_POST['cladoc'],
      "docume" => $_POST['docume'],
      "fecnac" => $_POST['fecnac'],
      "sexo"   => $_POST['sexo'],
      "gposan" => $_POST['gposan'],
      "factrh" => $_POST['factrh'],
      "telcel" => $_POST['telcel'],
      "ciudad" => $_POST['ciudad'],
      "direcc" => $_POST['direcc'],
      "estrat" => $_POST['estrat'],
      "correo" => $_POST['correo'],
   );
   include "../../modelo/alumnos.php";
   $Alumnos   = new Alumnos();
   echo $Alumnos->agregaralumno($datos);
?>
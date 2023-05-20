<?php
   session_start();
   $datos = array(
      'idoperador' => $_SESSION['usuario']['id'],
      "nombre" => $_POST['nombre'],
      "cladoc" => $_POST['cladoc'],
      "docume" => $_POST['docume'],
      "fecnac" => $_POST['fecnac'],
      "sexo"   => $_POST['sexo'],
      "gposan" => $_POST['gposan'],
      "factrh" => $_POST['factrh'],
      "estciv" => $_POST['estciv'],
      "escola" => $_POST['escola'],
      "hijos"  => $_POST['hijos'],
      "telcel" => $_POST['telcel'],
      "ciudad" => $_POST['ciudad'],
      "direcc" => $_POST['direcc'],
      "estrat" => $_POST['estrat'],
      "correo" => $_POST['correo'],
      "cargo"  => $_POST['cargo'],
      "tipcon" => $_POST['tipcon'],
      "salari" => $_POST['salari'],
      "codeps" => $_POST['codeps'],
      "codarl" => $_POST['codarl'],
      "codpen" => $_POST['codpen'],
      "codces" => $_POST['codces'],
   );
   include "../../modelo/empleados.php";
   $Empleados   = new Empleados();
   echo $Empleados->agregarempleado($datos);
?>
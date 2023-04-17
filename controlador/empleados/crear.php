<?php
   $datos = array(
   "nombre" => $_POST['nombre'],
   "cladoc" => $_POST['cladoc'],
   "docume" => $_POST['docume'],
   "cargo"  => $_POST['cargo'],
   "telcel"  => $_POST['telcel'],
   "ciudad" => $_POST['ciudad'],
   "direcc" => $_POST['direcc'],
   "estrat" => $_POST['estrat'],
   "correo" => $_POST['correo'],
   "tipcon" => $_POST['tipcon'],
   "salari" => $_POST['salari'],
   "codces" => $_POST['codces'],
   "codeps" => $_POST['codeps'],
   "conpen" => $_POST['conpen'],
   "codarl" => $_POST['codarl'],
   "sexo" => $_POST['sexo'],
   "estciv" => $_POST['estciv'],
   "escola" => $_POST['escola'],
   "gposan" => $_POST['gposan'],
   "factrh" => $_POST['factrh'],
   "hijos" => $_POST['hijos'],
   "fecnac" => $_POST['fecnac'],
   );

   include "../../modelo/empleados.php";
   $Empleados   = new Empleados();
   echo $Empleados->agregarempleado($datos);
?>
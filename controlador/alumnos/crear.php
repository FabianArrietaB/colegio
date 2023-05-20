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
      "telcel" => $_POST['telcel'],
      "ciudad" => $_POST['ciudad'],
      "direcc" => $_POST['direcc'],
      "estrat" => $_POST['estrat'],
      "correo" => $_POST['correo'],
      "parmad" => $_POST['parmad'],
      "nommad" => $_POST['nommad'],
      "cldoma" => $_POST['cldoma'],
      "docmad" => $_POST['docmad'],
      "telmad" => $_POST['telmad'],
      "ciumad" => $_POST['ciumad'],
      "dirmad" => $_POST['dirmad'],
      "estmad" => $_POST['estmad'],
      "cormad" => $_POST['cormad'],
      "parpad" => $_POST['parpad'],
      "nompad" => $_POST['nompad'],
      "cldopa" => $_POST['cldopa'],
      "docpad" => $_POST['docpad'],
      "telpad" => $_POST['telpad'],
      "ciupad" => $_POST['ciupad'],
      "dirpad" => $_POST['dirpad'],
      "estpad" => $_POST['estpad'],
      "corpad" => $_POST['corpad'],
      "idgrado" => $_POST['idgrado'],
      "matric" => $_POST['matric'],
      "pensio" => $_POST['pensio'],
      "abono" => $_POST['abono'],
      "tippag" => $_POST['tippag'],
   );
   include "../../modelo/alumnos.php";
   $Alumnos   = new Alumnos();
   echo $Alumnos->agregaralumno($datos);
?>
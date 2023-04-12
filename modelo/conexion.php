<?php
   class Conexion{
      public function conectar(){
      $servidor = "localhost";
      $usuario = "root";
      $password = "";
      $db = "colegio";
      $conexion = new mysqli($servidor, $usuario, $password, $db);
      return $conexion;
   }
}
?>
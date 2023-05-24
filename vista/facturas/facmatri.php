<?php
    session_start();
    //Consulta//
    require('../../public/fpdf185/fpdf.php');
    define('EURO',chr(128)); // Constante con el símbolo Euro.
    $pdf = new FPDF('P','mm',array(80,150)); // Tamaño tickt 80mm x 150 mm (largo aprox)
    $pdf->AddPage();
?>
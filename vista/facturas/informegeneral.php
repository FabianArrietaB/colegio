<?php
/* Connect To Database*/
require_once ("../../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
$con = new Conexion();
$conexion = $con->conectar();
// $idalumno = ($_GET['idfacturas']);

require('../../public/fpdf/fpdf.php');

class PDF extends FPDF{
    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';

    // Cabecera de página
    function Header(){
        $this->SetXY(2, 1);
        $this->SetFont('times','B',30);
        $this->Image('../../public/images/informes/triangulosrecortados.png',0,0,50); //imagen(archivo, png/jpg || x,y,tamaño)
        // Logo
        $this->Image('../../public/images/logo.png', 20, 10, 30);
        $fill = True;
        $this->Cell(280,22,'REPORTE RELACION FACTURAS',0,1,'C');
        $this->SetFont('times','B',15);
        $this->Cell(120,6,'Informe #: ',0,1,'C');
        $this->Cell(115,3,'Fecha: ',0,1,'C');

        $this->SetXY(10,42);//Esquina del inicio del margen de la cabecera Intitucion //
        $posicion_MulticeldaDX= $this->GetX();//Aquí inicializo donde va a comenzar el primer recuadro en la posición X
        $posicion_MulticeldaDY= $this->GetY();//Aquí inicializo donde va a comenzar el primer recuadro en la posición Y
        //Estas lineas comentadas las ocupo para verificar la posición, imprime la posición de cada eje//
        //$this->Cell(50,5,utf8_decode('Posicion X'  ." " .$posicion_MulticeldaDX),1,0,'C');
        //$this->Cell(50,5,utf8_decode('Posicion Y'  ." " .$posicion_MulticeldaDY),1,0,'C');
  //-------------------------------------------------------------------------//
//**************************************************************************//
      // Estas lineas son para asignar relleno, color del texto y color de lineas de contorno si mal no recuerdo //
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(224,235,255);

//*************************************************************************//
        $this->SetXY($posicion_MulticeldaDX,$posicion_MulticeldaDY); //Aquí le indicas la posición de la esquina superior izquierda para el primer multicell que envuelve toda la tabla o recuadro
        $this->MultiCell(137,25,'',1);
        $this->SetFont('times','B',10);
        $this->SetXY($posicion_MulticeldaDX,$posicion_MulticeldaDY); // Esto posiciona cada etiqueta en base a la posición de la esquina
        $this->Cell(137,5,'INFORMACION INSTITUCION', 1,1,'C',$fill);
        $this->SetXY($posicion_MulticeldaDX,$posicion_MulticeldaDY+5);
        $this->Cell(137,5,'RAZON SOCIAL:', 0,1,'L');
        $this->SetXY($posicion_MulticeldaDX,$posicion_MulticeldaDY+10);
        $this->Cell(137,5,'NIT:', 0,1,'L');
        $this->SetXY($posicion_MulticeldaDX,$posicion_MulticeldaDY+15);
        $this->Cell(137,5,utf8_decode('DIRECCIÓN:'), 0,1,'L');
        $this->SetXY($posicion_MulticeldaDX,$posicion_MulticeldaDY+20);
        $this->Cell(137,5,utf8_decode('TELEFONO:'), 0,1,'L');
        $this->SetFont('times','');
        $this->SetXY($posicion_MulticeldaDX+35,$posicion_MulticeldaDY+5);
        $this->Cell(80,5,utf8_decode('COLEGIO GIMNASIO LAS AMERICAS'),0,1,'L',0);
        $this->SetXY($posicion_MulticeldaDX+35,$posicion_MulticeldaDY+10);
        $this->Cell(80,5,utf8_decode('347001005243') ,0,1,'L',0);
        $this->SetXY($posicion_MulticeldaDX+35,$posicion_MulticeldaDY+15);
        $this->Cell(80,5,utf8_decode('Cra. 33b #9f-27 a 9f-1' ),0,1,'L',0);
        $this->SetXY($posicion_MulticeldaDX+35,$posicion_MulticeldaDY+20);
        $this->Cell(80,5,utf8_decode('3245833253'),0,1,'L',0);
        $this->Ln();  // Termina seccion de multicelda de datos de Informacion Institucion


        $this->SetFont('','B');
        $fill = True;
        $this->SetXY(153,42); // Esquina del unicio de la cabecera del Alumno//
        $posicion_MulticeldaUX= $this->GetX();
        $posicion_MulticeldaUY= $this->GetY();
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(224,235,255);
        $this->SetXY($posicion_MulticeldaUX,$posicion_MulticeldaUY);
        $this->MultiCell(137,25,'',1);
        $this->SetXY($posicion_MulticeldaUX,$posicion_MulticeldaUY);
        $this->Cell(137,5,'DATOS DEL ALUMNO', 1,1,'C',$fill);
        $this->SetXY($posicion_MulticeldaUX,$posicion_MulticeldaUY+5);
        $this->Cell(137,5,'IDENTIFICACION:', 0,1,'L');
        $this->SetXY($posicion_MulticeldaUX,$posicion_MulticeldaUY+10);
        $this->Cell(137,5,'NOMBRE:', 0,1,'L');
        $this->SetXY($posicion_MulticeldaUX,$posicion_MulticeldaUY+15);
        $this->Cell(137,5,'GRADO:', 0,1,'L');
        $this->SetXY($posicion_MulticeldaUX,$posicion_MulticeldaUY+20);
        $this->Cell(137,5,'CORREO:', 0,1,'L');
        $this->SetFont('times','');
        $this->SetXY($posicion_MulticeldaUX+40,$posicion_MulticeldaUY+5);
        $this->Cell(80,5,utf8_decode('1043698754'),0,1,'L',0);
        $this->SetXY($posicion_MulticeldaUX+40,$posicion_MulticeldaUY+10);
        $this->Cell(80,5,utf8_decode('MICHELLE ANDREA ARRIETA BOLAÑOS'),0,1,'L',0);
        $this->SetXY($posicion_MulticeldaUX+40,$posicion_MulticeldaUY+15);
        $this->Cell(80,5,utf8_decode('TRANSICION'),0,1,'L',0);
        $this->SetXY($posicion_MulticeldaUX+40,$posicion_MulticeldaUY+20);
        $this->Cell(80,5,utf8_decode('marrieta@gmail.com'),0,1,'L',0);
        $this->Ln();
        //$this->Cell(185,5,'', 0,1,'L');
        $posicion_CierreCeldaCabeceraX = $this->GetX();
        $posicion_CierreCeldaCabeceraY = $this->GetY();
        //$this->Cell(50, 5, utf8_decode('Posicion X' . " " . $posicion_CierreCeldaCabeceraX), 1, 0, 'C');
        //$this->Cell(50, 5, utf8_decode('Posicion Y' . " " . $posicion_CierreCeldaCabeceraY), 1, 0, 'C');
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Times','B',10);
        // Número de página
        $this->Cell(170,10,'Todos los derechos reservados',0,0,'C',0);
        $this->Cell(25,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();//hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage('Letter');
// $pdf->SetMargins(10,10,10);
// $pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
// $pdf->SetX(20);
// $pdf->SetFont('times','B',15);
// $pdf->Cell(10,8,'#',1,0,'C',0);
// $pdf->Cell(30,8,'Factura',1,0,'C',0);
// $pdf->Cell(30,8,'Cantidad',1,0,'C',0);
// $pdf->Cell(30,8,'Valor',1,0,'C',0);
// $pdf->Cell(50,8,'Detalle',1,0,'C',0);
// $pdf->Cell(35,8,'Fecha',1,0,'C',0);

$pdf->SetFillColor(233, 229, 235);//color de fondo rgb
$pdf->SetDrawColor(61, 61, 61);//color de linea  rgb

// cell(ancho, largo, contenido,borde?, salto de linea?)
$pdf->Output();
?>
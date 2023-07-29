<?php
/* Connect To Database*/
require_once ("../../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
$con = new Conexion();
$conexion = $con->conectar();
//Valores Consulta
$modulo = ($_GET['modulo']);
$idalumno =  ($_GET['idalumno']);
$desde = ($_GET['desde']);
$hasta = ($_GET['hasta']);
//Consulta Modulo
if ($modulo == 'Todos'){
    $detalle = 'general';
} else if ($modulo =='0'){
    $detalle = 'ventas';
} else if ($modulo =='1'){
    $detalle = 'matricula';
} else if ($modulo =='2'){
    $detalle = 'pension';
}
$sql = "SELECT
    f.id_operador as idoperador,
    u.user_nombre as vendedor,
    f.fac_prefijo as prefijo,
    f.id_facturas as factura,
    a.alu_nombre  as nomalu,
    f.id_producto  as idproducto,
    p.pro_nombre as producto,
    f.fac_cantidad as cantidad,
    f.id_tippag as tippag,
    f.fac_forpag as forpag,
    f.fac_detalle as detalle,
    f.fac_valor as precio,
    f.fac_fecope as fecha
    FROM facturas AS f
    LEFT JOIN alumnos as a ON a.id_alumno = f.id_alumno
    LEFT JOIN productos as p ON p.id_producto = f.id_producto
    LEFT JOIN usuarios as u ON u.id_usuario = f.id_operador
    WHERE f.id_alumno = '$idalumno'";
    if ($modulo != 'Todos') {
        $sql .= " AND f.id_tippag = '$modulo'";
        }
    if ($desde != '' && $hasta != '') {
        $sql .= " AND f.fac_fecope BETWEEN '$desde' AND '$hasta'";
    }
$query = mysqli_query($conexion, $sql);
$sqlalumno = "SELECT
a.alu_nombre  as nomalu
FROM alumnos AS a
WHERE a.id_alumno = '$idalumno'";
$rwalumno = mysqli_query($conexion, $sqlalumno);
$alumno = mysqli_fetch_array($rwalumno);


require('../../public/fpdf/fpdf.php');

class PDF extends FPDF{
    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';

    // Cabecera de página
    function Header(){
        require_once ("../../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
        $con = new Conexion();
        $conexion = $con->conectar();

         //Consulta Empresa
        $sql_empresa = "select * from sedes where id_sedes = 1 limit 0,1";//Obtengo los datos del Empresa
        $query2 = mysqli_query($conexion, $sql_empresa);
        $rw_empresa = mysqli_fetch_array($query2);

        //Valores Consulta
        $modulo = ($_GET['modulo']);
        $idalumno =  ($_GET['idalumno']);
        $desde = ($_GET['desde']);
        $hasta = ($_GET['hasta']);
        $entdesde = strtotime($desde);
        $enthasta = strtotime($hasta);
        $añodesde = date("Y", $entdesde);
        $mesdesde = date('M', $entdesde);
        $diadesde = date('d', $entdesde);
        $añohasta = date("Y", $enthasta);
        $meshasta = date('M', $enthasta);
        $diahasta = date('d', $enthasta);

        //Consulta Modulo
        if ($modulo == 'Todos'){
            $detalle = 'DE FACTURA GENERALES';
        } else if ($modulo =='0'){
            $detalle = 'FACTURAS DE VENTAS';
        } else if ($modulo =='1'){
            $detalle = 'FACTURAS DE PAGOS MATRICULAS';
        } else if ($modulo =='2'){
            $detalle = 'FACTURAS DE PAGOS PENSION';
        }

        //Consulta Datos Alumnos
        $sql_alumno = "select * from alumnos Where id_alumno = '$idalumno'";
        $query4 = mysqli_query($conexion, $sql_alumno);
        $rw_alumno = mysqli_fetch_array($query4);

        //Consulta Acudiente
        $idgrado = $rw_alumno['id_grado'];
        $sql_acudiente = "select * from grados Where id_grado = '$idgrado'";
        $query5 = mysqli_query($conexion, $sql_acudiente);
        $rw_grado = mysqli_fetch_array($query5);

        $this->SetXY(2, 1);
        $this->SetFont('times','B',30);
        $this->Image('../../public/images/informes/triangulosrecortados.png',0,0,50); //imagen(archivo, png/jpg || x,y,tamaño)
        // Logo
        $this->Image('../../public/images/logo.png', 20, 10, 30);
        $this->Image('../../public/images/logo.png', 250, 10, 30);
        $fill = True;
        $this->Cell(300,15,'REPORTE RELACION FACTURAS',0,1,'C');
        $this->SetFont('times','B',15);
        $this->Cell(280,8,'PERIODO COMPRENDIDO DE ' . $diadesde . ' - ' . $mesdesde . ' - ' . $añodesde . ' AL ' . $diahasta . ' - ' . $meshasta . ' - ' . $añohasta ,0,1,'C');
        $this->Cell(280,8,'FECHA DOCUMENTO: ' . date("Y-m-d"),0,1,'C');
        $this->Cell(280,8,'INFORME ' . $detalle,0,1,'C');

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
        $this->Cell(80,5,utf8_decode($rw_empresa['sed_nombre']),0,1,'L',0);
        $this->SetXY($posicion_MulticeldaDX+35,$posicion_MulticeldaDY+10);
        $this->Cell(80,5,utf8_decode($rw_empresa['sed_nit']) ,0,1,'L',0);
        $this->SetXY($posicion_MulticeldaDX+35,$posicion_MulticeldaDY+15);
        $this->Cell(80,5,utf8_decode($rw_empresa['sed_direcc']),0,1,'L',0);
        $this->SetXY($posicion_MulticeldaDX+35,$posicion_MulticeldaDY+20);
        $this->Cell(80,5,utf8_decode($rw_empresa['sed_telcel']),0,1,'L',0);
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
        $this->Cell(137,5,'Item:', 0,1,'L');
        $this->SetXY($posicion_MulticeldaUX,$posicion_MulticeldaUY+15);
        $this->Cell(137,5,'GRADO:', 0,1,'L');
        $this->SetXY($posicion_MulticeldaUX,$posicion_MulticeldaUY+20);
        $this->Cell(137,5,'CORREO:', 0,1,'L');
        $this->SetFont('times','');
        $this->SetXY($posicion_MulticeldaUX+40,$posicion_MulticeldaUY+5);
        $this->Cell(80,5,utf8_decode($rw_alumno['alu_telcel']),0,1,'L',0);
        $this->SetXY($posicion_MulticeldaUX+40,$posicion_MulticeldaUY+10);
        $this->Cell(80,5,utf8_decode($rw_alumno['alu_nombre']),0,1,'L',0);
        $this->SetXY($posicion_MulticeldaUX+40,$posicion_MulticeldaUY+15);
        $this->Cell(80,5,utf8_decode($rw_grado['gra_nombre']),0,1,'L',0);
        $this->SetXY($posicion_MulticeldaUX+40,$posicion_MulticeldaUY+20);
        $this->Cell(80,5,utf8_decode($rw_alumno['alu_correo']),0,1,'L',0);
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

    var $widths;
    var $aligns;

    function SetWidths($w){
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a){
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data,$setX){
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h){
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt){
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
            $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
            $s=str_replace("\r",'',$txt);
            $nb=strlen($s);
            if($nb>0 and $s[$nb-1]=="\n")
                $nb--;
                $sep=-1;
                $i=0;
                $j=0;
                $l=0;
                $nl=1;
                while($i<$nb){
                    $c=$s[$i];
                    if($c=="\n"){
                        $i++;
                        $sep=-1;
                        $j=$i;
                        $l=0;
                        $nl++;
                        continue;
                    }
                    if($c==' ')
                        $sep=$i;
                        $l+=$cw[$c];
                        if($l>$wmax){
                            if($sep==-1){
                                if($i==$j)
                                $i++;
                            }else
                                $i=$sep+1;
                                $sep=-1;
                                $j=$i;
                                $l=0;
                                $nl++;
                        }else
                            $i++;
                }
                return $nl;
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();//hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage('p','A3');
$pdf->SetXY(10,70);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(224,235,255);
$pdf->SetFont('times','B',12);
$pdf->Cell(20,8,'ITEM',1,0,'C',1);
$pdf->Cell(30,8,'FACTURA',1,0,'C',1);
$pdf->Cell(30,8,'CANTIDAD',1,0,'C',1);
$pdf->Cell(35,8,'VALOR',1,0,'C',1);
$pdf->Cell(70,8,'DETALLE',1,0,'C',1);
$pdf->Cell(35,8,'FECHA',1,0,'C',1);
$pdf->Cell(30,8,'TIPO PAGO',1,0,'C',1);
$pdf->Cell(30,8,'VENDEDOR',1,1,'C',1);

//colorear fondo
$pdf->Setfont('times','',9);
$pdf->SetWidths(array(20,30,30,35,70,35,30,30));
$i = 0;
while($mostrar= mysqli_fetch_array($query)){
    $pdf->SetX(10);
    $pdf->Row(array(
        ++$i,
        $mostrar['prefijo'] . ' - ' . str_pad($mostrar['factura'], 6, "0", STR_PAD_LEFT),
        $mostrar['cantidad'],
        number_format($mostrar['precio'], 2),
        $mostrar['detalle'],
        $mostrar['fecha'],
        $mostrar['forpag'],
        $mostrar['vendedor']), 30);
        if($i >=66){
            $i++;
            $pdf->AddPage('p','A3');
            $pdf->SetXY(20,60);
            $pdf->SetFont('times','B',12);
            $pdf->Cell(20,8,'ITEM',1,0,'C',1);
            $pdf->Cell(30,8,'FACTURA',1,0,'C',1);
            $pdf->Cell(30,8,'CANTIDAD',1,0,'C',1);
            $pdf->Cell(35,8,'VALOR',1,0,'C',1);
            $pdf->Cell(60,8,'DETALLE',1,0,'C',1);
            $pdf->Cell(35,8,'FECHA',1,0,'C',1);
            $pdf->Cell(30,8,'TIPO PAGO',1,0,'C',1);
            $pdf->Cell(30,8,'VENDEDOR',1,1,'C',1);
        }
}

$pdf->Output('../../public/pdfinformes/informe' . $detalle . $alumno['nomalu'] . date("Y-m-d") .'.pdf','f');
$pdf->Output();
?>
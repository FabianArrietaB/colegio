<?php
/* Connect To Database*/
require_once ("../../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
$con = new Conexion();
$conexion = $con->conectar();
//Consulta ultima Numeracion facturas
$sql = "select LAST_INSERT_ID(id_facturas) as last from facturas";
$query1 = mysqli_query($conexion, $sql);
$rw1 = mysqli_fetch_array($query1);
$numero = $rw1['last']+1;
$index = 1;

$factura = ($_GET['idfacturas']);

//Consulta Empresa
$sql_empresa = "select * from sedes where id_sedes = 1 limit 0,1";//Obtengo los datos del Empresa
$query2 = mysqli_query($conexion, $sql_empresa);
$rw_empresa = mysqli_fetch_array($query2);

//Consulta Factura
$sql_factura = "select * from facturas where id_facturas ='$factura' limit 0,1";//Obtengo los datos de la factura
$query3 = mysqli_query($conexion, $sql_factura);
$rw_factura = mysqli_fetch_array($query3);
$idfactura = str_pad($rw_factura['id_facturas'], 6, "0", STR_PAD_LEFT);

//Consulta Alumnos
$idalumno = $rw_factura['id_alumno'];
$sql_alumno = "select * from alumnos Where id_alumno = '$idalumno'";
$query4 = mysqli_query($conexion, $sql_alumno);
$rw_alumno = mysqli_fetch_array($query4);

//Consulta Acudiente
$idacudiente = $rw_factura['id_acudiente'];
$sql_acudiente = "select * from acudientes Where id_acudiente = '$idacudiente'";
$query5 = mysqli_query($conexion, $sql_acudiente);
$rw_acudiente = mysqli_fetch_array($query5);

//Consulta Productos
$idproducto = $rw_factura['id_producto'];
$sql_prducto = "select * from productos Where id_producto = '$idproducto'";
$query6 = mysqli_query($conexion, $sql_prducto);

//Nombre Producto
if ($rw_factura['id_producto'] <> 0) {
    $producto = $rw_producto['pro_nombre'];
} else {
    if ($rw_factura['id_tippag'] == 1) {
    $producto = 'PAGO MATRICULA';
    } else if ($rw_factura['id_tippag'] == 2) {
    $producto = 'PAGO PENSION';
    }
}

$rw_producto = mysqli_fetch_array($query6);


require('../../public/fpdf/fpdf.php');
class PDF extends FPDF{
    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';

    function factura($html){
        $this->SetX(2);
        // Intérprete de HTML
        $html = str_replace("\n",' ',$html);
        $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e){
            if($i%2==0){
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
            }else{
                // Etiqueta
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else{
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v){
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr){
        // Etiqueta de apertura
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(3);
    }
    
    function CloseTag($tag){
        // Etiqueta de cierre
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable){
        // Modificar estilo y escoger la fuente correspondiente
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach(array('B', 'I', 'U') as $s){
            if($this->$s>0)
                $style .= $s;
        }
        $this->SetFont('',$style);
    }

    // Cabecera de página
    function Header(){
        $this->SetXY(2, 1);
        // Logo
        $this->Image('../../public/images/logo.png', 4, 8, -110);
        // Arial bold 15
        $this->SetFont('times','B',14);
        // Título
        $this->Cell(65,8,'Colegio gimnasio las Americas',0,1,'C');
        $this->SetFont('times','',10);
        $this->Cell(60,3,'NIT: 347001005243-6',0,1,'C');
        $this->Cell(60,4,'Santa Marta (Magd)',0,1,'C');
        $this->Cell(60,4,'Cra. 33b #9f - 27 a 9f-1',0,1,'C');
        $this->Cell(60,4,'3245833253',0,1,'C');
        $this->Cell(50,5,'secretariageneral@colegiogimnasiolasamericas',0,1,'C');
        // Salto de línea
        $this->Ln(2);
    }

    // Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->Ln(4);
        $this->SetFont('times','I',8);
        $this->Cell(50,4,'Gracias por su compra!',0,1,'C');
        $this->Cell(50,5,'www.gignasiolasamericas.com',0,1,'C');
        // Número de página
        $this->Cell(50,5,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        $this->Ln(2);
    }

}


// Creación del objeto de la clase heredada
$pdf = new PDF($orientation='P',$unit='mm', array(80,150));
$pdf->AliasNbPages();
$pdf->AddPage();

//Datos Factura
$pdf->SetFont('times','B',9);
$pdf->Cell(50,4, 'Factura de Venta: '. $rw_factura['fac_prefijo'] .' - '. $idfactura,0,1,'C');
$pdf->SetFont('times','',8);
$pdf->Cell(50,4,'Fecha:'.' '. $rw_factura['fac_fecope'],0,1,'C');
$pdf->Cell(50,4,'Metodo de pago: Efectivo',0,1,'C');

//Datos Alumno
$pdf->SetFont('times', 'B');
$titalu = '<b>ALUMNO......:</b>' . ' ' . $rw_alumno['alu_nombre'] . '<br>';
$titdir = '<b>DIRECCION.:</b>' . ' ' . $rw_alumno['alu_direcc'] . '<br>';
$tittel = '<b>TELEFONO..:</b>' . ' ' . $rw_alumno['alu_telcel'] . '<br>';
$titacu = '<b>ACUDIENTE:</b>' . ' ' . $rw_acudiente['acu_nombre'] . '<br>';

$pdf->SetFont('times', '');
$pdf->SetFontSize(7);
$pdf->factura(utf8_decode($titalu));
$pdf->factura($titdir);
$pdf->factura($tittel);
$pdf->factura($titacu);
$pdf->Ln(3);

// COLUMNAS
$pdf->SetX(2);
$pdf->SetFont('times', 'B', 9);
$pdf->Cell(3, 5, '#', 1);
$pdf->Cell(25, 5, 'Articulo',1,0,'C');
$pdf->Cell(12, 5, 'Ud',1,0,'R');
$pdf->Cell(15, 5, 'Precio',1,0,'R');
$pdf->Cell(15, 5, 'Total',1,0,'R');
$pdf->Ln(5);

// PRODUCTOS
$pdf->SetX(2);
$pdf->SetFont('times', '', 7);
$pdf->Cell(3 , 4,$index++ , 1);
$pdf->Cell(25, 4,$producto ,1,0,'C');
$pdf->Cell(12, 4,$rw_factura['fac_cantidad'],1,0,'R');
$pdf->Cell(15, 4,'$ '. number_format(round($rw_factura['fac_valor'])),1,0,'R');
$pdf->Cell(15, 4,'$ '. number_format(round($rw_factura['fac_valor']*$rw_factura['fac_cantidad'])),1,0,'R');
$pdf->Ln(2);



$pdf->Output('../../public/facturaspdf/' . $rw_factura['fac_prefijo'] .' - '. $idfactura .'.pdf','f');
$pdf->Output('ticket.pdf','i');
?>
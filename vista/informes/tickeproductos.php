<?php
	/* Connect To Database*/
	require_once ("../../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
	$con = new Conexion();
    $conexion = $con->conectar();
	//Consulta ultimo dijito factura
	$sql = "select LAST_INSERT_ID(aud_numdoc) as last from auditorias WHERE id_tipopago = 3 or id_tipopago = 4 ";
	$query1 = mysqli_query($conexion, $sql);
	$rw1 = mysqli_fetch_array($query1);
	$numero = $rw1['last']+1;

	//Variables por GET
	$alunmno = intval($_GET['idalumno']);
	//Fin de variables por GET

	//Consulta Empresa
	$sql_empresa = "select * from sedes where id_sedes = 1 limit 0,1";//Obtengo los datos del cliente
	$query2 = mysqli_query($conexion, $sql_empresa);
	$rw_empresa = mysqli_fetch_array($query2);

	//Consulta Alumno
	$sql_alumno = "select * from alumnos where id_alumno ='$alunmno' limit 0,1";//Obtengo los datos del cliente
	$query3 = mysqli_query($conexion, $sql_alumno);
	$rw_alumno = mysqli_fetch_array($query3);
	
	//Consulta Producto
	$sql_count = $conexion->query("select * from productos");
	$count = mysqli_num_rows($sql_count);

	if ($count==0) {
		echo "<script>alert('No hay productos agregados al presupuesto')</script>";
		echo "<script>window.close();</script>";
		exit;
		}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../../public/css/ticket.css">
        <title>Factura Producto</title>
    </head>
    <body>
        <div class="ticket">
			<img src="img/logo.png" alt="Logo sistemas web" />
			<p class="centered"><?php echo $rw_empresa['sed_razsoc'];?> 
				<br><strong>Teléfono :</strong> <?php echo $rw_empresa['sed_telcel'];?> 
				<br><strong>Dirección: </strong> <?php echo $rw_empresa['sed_direcc'];?> 
				<br><strong>Fecha: </strong><?php echo date("d/m/Y H:i");?>
				<br><strong>Ticket Nº: </strong> <?php echo $numero;?> 
			</p>
			<p>
				<strong>Cliente :</strong><?php echo $rw_alumno['alu_nombre'];?> 
				<br><strong>Dirección: </strong> <?php echo $rw_alumno['alu_direcc'];?>
				<br><strong>Telefono: </strong> <?php echo $rw_alumno['alu_telcel'];?>
			</p>
            <table>
                <thead>
                    <tr >
                        <th class="quantity both_border">Cant.</th>
                        <th class="description both_border">Descripción</th>
                        <th class="price both_border">Total</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$sqlproducto = "select * from productos";
					$query4 = mysqli_query($conexion, $sqlproducto);
					$suma=0;
					while($row = mysqli_fetch_array($query4)){
						$total=$row['pro_estado']*$row['pro_precio'];
						$total=number_format($total,2,'.','');
				?>
                    <tr>
                        <td class="quantity"><?php echo $row['pro_estado'];?></td>
                        <td class="description"><?php echo $row['pro_nombre'];?></td>
                        <td class="price"> <?php echo $total;?></td>
                    </tr>
				<?php
					$suma+=$total;
					//Guardo los datos en la tabla detalle
					//$detalle = mysqli_query($con,"INSERT INTO `detalle` (`id`, `descripcion`, `cantidad`, `precio`, `id_factura`) VALUES (NULL, '".$row['pro_nombre']."', '".$row['pro_estado']."', '".$row['pro_precio']."', '$numero');");
					}
					
					$iva = $suma * (16 / 100);
					$total_iva=number_format($iva,2,'.','');	
					$total=$suma + $total_iva;
			
				?>	
                
                    <tr>
                        <td class="quantity"></td>
                        <td class="description"> NETO</td>
                        <td class="price"> <?php echo number_format($suma,2);?></td>
                    </tr>
					
					<tr>
                        <td class="quantity"></td>
                        <td class="description"> IVA  16%</td>
                        <td class="price"> <?php echo number_format($total_iva,2);?></td>
                    </tr>
					
					<tr>
						<th class="price totales both_border" colspan=3> TOTAL IMPORTE  $ <?php echo number_format($total,2);?></th>
                    </tr>
                </tbody>
            </table>
            <p class="centered">Gracias por su compra!
			<br>www.obedalvarado.com</p>
        </div>
        <button id="btnPrint" class="hidden-print" onclick="window.print();">Imprimir</button>
		<button  class="hidden-print" onclick="window.close();">Cerrar</button>
        <script src="js/script.js"></script>
    </body>
</html>
<?php
	//Guardando los datos del ticket
	$fecha=date("Y-m-d H:i:s");
	$sql = "INSERT INTO `facturas` (`id`, `fecha`, `id_cliente`, `monto`) VALUES (NULL, '$fecha', '$alunmno', '$total');";
	$save = mysqli_query($conexion,$sql);
	$delete = mysqli_query($conexion,"delete from tmp");
?>
<?php
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	
	$sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from facturas order by id desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
	$numero=$rw['last']+1;	
	
	
	$query_perfil=mysqli_query($con,"select * from perfil where id=1");
	$rw=mysqli_fetch_assoc($query_perfil);
	$tax=$rw['tax'];
	
	//Variables por GET
	$cliente=intval($_GET['cliente']);
	
	//Fin de variables por GET
	
	$sql_cliente=mysqli_query($con,"select * from clientes where id='$cliente' limit 0,1");//Obtengo los datos del cliente
	$rw_cliente=mysqli_fetch_array($sql_cliente);
	
	$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from tmp ");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
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
        <link rel="stylesheet" href="assets/css/ticket.css">
		
        <title>Ejemplo de ticket</title>
    </head>
    <body>
        <div class="ticket">
            
			 <img src="img/logo.png" alt="Logo sistemas web" />
            <p class="centered"><?php echo $rw['nombre_comercial'];?> 
                <br><strong>Teléfono :</strong> <?php echo $rw['telefono'];?> 
                <br><strong>Dirección: </strong> <?php echo $rw['direccion'];?> 
				<br><strong>Fecha: </strong><?php echo date("d/m/Y H:i");?>
				<br><strong>Ticket Nº: </strong> <?php echo $numero;?> 
				</p>
				
				
			<p >
				<strong>Cliente :</strong> <?php echo $rw_cliente['nombre'];?> 
				<br><strong>Dirección: </strong> <?php echo $rw_cliente['direccion'];?> 
				
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
					$query=mysqli_query($con,"select * from tmp order by id");
					$suma=0;
					while($row=mysqli_fetch_array($query)){
						$total=$row['cantidad']*$row['precio'];
						$total=number_format($total,2,'.','');
				?>
                    <tr>
                        <td class="quantity"><?php echo $row['cantidad'];?></td>
                        <td class="description"><?php echo $row['descripcion'];?></td>
                        <td class="price"> <?php echo $total;?></td>
                    </tr>
				<?php 
					$suma+=$total;
					//Guardo los datos en la tabla detalle
					$detalle=mysqli_query($con,"INSERT INTO `detalle` (`id`, `descripcion`, `cantidad`, `precio`, `id_factura`) VALUES (NULL, '".$row['descripcion']."', '".$row['cantidad']."', '".$row['precio']."', '$numero');");
					
					
					}
					
					$iva=$suma * ($tax / 100);
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
                        <td class="description"> IVA  (<?php echo $tax;?>%)</td>
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
$sql="INSERT INTO `facturas` (`id`, `fecha`, `id_cliente`, `monto`) VALUES (NULL, '$fecha', '$cliente', '$total');";
$save=mysqli_query($con,$sql);
$delete=mysqli_query($con,"delete from tmp");
?> 
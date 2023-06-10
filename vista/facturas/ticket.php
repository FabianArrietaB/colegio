<?php
	/* Connect To Database*/
	session_start();
	$idoperador = $_SESSION['usuario']['id'];
	require_once ("../../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
	$con = new Conexion();
    $conexion = $con->conectar();
	$sql=mysqli_query($conexion, "select MAX(id_facturas) as last from facturas");
	$rw=mysqli_fetch_array($sql);
	$numero=$rw['last']+1;
	//Consulta Empresa
	$sql_empresa = "select * from sedes where id_sedes = 1 limit 0,1";//Obtengo los datos del Empresa
	$query2 = mysqli_query($conexion, $sql_empresa);
	$rw_empresa = mysqli_fetch_array($query2);
	//Variables por GET
	$cliente = ($_GET['idpersona']);
	//Fin de variables por GET
	$sql_cliente=mysqli_query($conexion,"select * from acudientes inner join alumnos on acudientes.id_alumno = alumnos.id_alumno where id_acudiente = '$cliente' limit 0,1");//Obtengo los datos del cliente
	$rw_cliente=mysqli_fetch_array($sql_cliente);
	$idalumno = $rw_cliente['id_alumno'];
	$session_id= session_id();
	$sql_count=mysqli_query($conexion,"select * from tmp ");
	$count=mysqli_num_rows($sql_count);
	$fecha = date("d/m/Y");
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
        <link rel="stylesheet" href="../../public/css/ticket.css">
        <title>Ejemplo de ticket</title>
    </head>
    <body>
        <div class="ticket">
			<img href="./../public/images/logo.jpg"/>
			<p class="centered"><?php echo $rw_empresa['sed_razsoc'];?>
				<br><strong>Teléfono :</strong> <?php echo $rw_empresa['sed_telcel'];?> 
				<br><strong>Dirección: </strong> <?php echo $rw_empresa['sed_direcc'];?> 
				<br><strong>Fecha: </strong><?php echo $fecha;?>
				<br><strong>Factura Nº: </strong> <?php echo 'GAV', ' - ',  $numero;?> 
			</p>
			<p>
				<strong>Alumno :</strong> <?php echo $rw_cliente['alu_nombre'];?>
				<br>
				<strong>Cliente :</strong> <?php echo $rw_cliente['acu_nombre'];?>
				<br>
				<strong>Dirección: </strong> <?php echo $rw_cliente['acu_direcc'];?>
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
					$query=mysqli_query($conexion,"select * from tmp order by id");
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
					$detalle = mysqli_query($conexion,"INSERT INTO `facturas` (`id_operador`, `id_acudiente`, `id_alumno`, `id_producto`, `id_tippag`, `fac_detalle`, `fac_cantidad`, `fac_valor`, `fac_fecope`) VALUES ($idoperador, $cliente, $idalumno ,'".$row['id_producto']."', '".$row['descripcion']."', '".$row['cantidad']."', '".$row['precio']."', $fecha);");
					}
					$iva = $suma * (16 / 100);
					$total_iva= number_format($iva,2,'.','');
					$total= $suma + $total_iva;
			
				?>
					
					
					<tr>
                     
                        <th class="price totales both_border" colspan=3> TOTAL IMPORTE  $ <?php echo number_format($suma,2);?></th>
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
$delete = mysqli_query($conexion,"delete from tmp");
?>
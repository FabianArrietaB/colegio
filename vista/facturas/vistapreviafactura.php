<?php
	/* Connect To Database*/
	require_once ("../../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
	$con = new Conexion();
    $conexion = $con->conectar();
	//Consulta ultimo dijito factura
	$sql = "select LAST_INSERT_ID(id_facturas) as last from facturas";
	$query1 = mysqli_query($conexion, $sql);
	$rw1 = mysqli_fetch_array($query1);
	$numero = $rw1['last']+1;
	//Variables por GET
	$factura = ($_GET['idfacturas']);
	//Fin de variables por GET

	//Consulta Empresa
	$sql_empresa = "select * from sedes where id_sedes = 1 limit 0,1";//Obtengo los datos del Empresa
	$query2 = mysqli_query($conexion, $sql_empresa);
	$rw_empresa = mysqli_fetch_array($query2);

	//Consulta Factura
	$sql_factura = "select * from facturas where id_facturas ='$factura' limit 0,1";//Obtengo los datos de la factura
	$query3 = mysqli_query($conexion, $sql_factura);
	$rw_factura = mysqli_fetch_array($query3);

	//Consulta Alumnos
	$idalumno = $rw_factura['id_alumno'];
	$sql_alumno = "select * from alumnos Where id_alumno = '$idalumno'";
	$query3 = mysqli_query($conexion, $sql_alumno);
	$rw_alumno = mysqli_fetch_array($query3);

	//Consulta Productos
	$idproducto = $rw_factura['id_producto'];
	$sql_prducto = "select * from productos Where id_producto = '$idproducto'";
	$query4 = mysqli_query($conexion, $sql_prducto);
	$rw_producto = mysqli_fetch_array($query4);

?>
<div class="modal fade" id="factura" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<!DOCTYPE html>
					<html lang="es">
						<head>
						<meta charset="UTF-8">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<meta http-equiv="X-UA-Compatible" content="ie=edge">
						<link rel="stylesheet" href="./../public//css/ticket.css">
						<title>Factura Producto</title>
					</head>
					<body>
						<div class="ticket">
							<p class="centered">
								<?php echo $rw_empresa['sed_razsoc'];?>
								<br><?php echo $rw_empresa['sed_pagina'];?>
								<br><strong>Teléfono :</strong> <?php echo $rw_empresa['sed_telcel'];?>
								<br><strong>Dirección: </strong> <?php echo $rw_empresa['sed_direcc'];?>
								<br><strong>Fecha: </strong><?php echo $rw_factura['fac_fecope'];?>
								<br><strong>Factura Nº: </strong> <?php echo $rw_factura['fac_prefijo'], ' - ', $rw_factura['id_facturas'];?> 
							</p>
							<p>
								<strong>Cliente : </strong><?php echo $rw_alumno['alu_nombre'];?>
								<br><strong>Dirección: </strong> <?php echo $rw_alumno['alu_direcc'];?>
								<br><strong>Telefono: </strong> <?php echo $rw_alumno['alu_telcel'];?>
							</p>
							<table class="mb-3">
								<thead>
									<tr >
										<th class="quantity both_border">Cant.</th>
										<th class="description both_border">Descripción</th>
										<th class="price both_border">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$suma=0;
										$total = $rw_factura['fac_cantidad']*$rw_factura['fac_valor'];
										$total = number_format($total,2,'.','');
									?>
									<tr>
										<td class="quantity"><?php echo $rw_factura['fac_cantidad'];?></td>
										<td class="description">
											<?php if ($rw_factura['id_producto'] <> 0) {
												echo $rw_producto['pro_nombre'];
											} else {
												if ($rw_factura['id_tippag'] == 1) { ?>
													<span>PAGO MATRICULA</span>
												<?php } else if ($rw_factura['id_tippag'] == 2) { ?>
													<span>PAGO PENSION</span>
												<?php } ?>
											<?php } ?>
										</td>
										<td class="price">$ <?php echo number_format($total);?></td>
									</tr>
									<?php
										$suma+= $total;
										//Guardo los datos en la tabla detalle
										//$detalle = mysqli_query($con,"INSERT INTO `detalle` (`id`, `descripcion`, `cantidad`, `precio`, `id_factura`) VALUES (NULL, '".$row['pro_nombre']."', '".$row['pro_estado']."', '".$row['pro_precio']."', '$numero');");
									?>
									<tr>
										<th class="price totales both_border" colspan=3> TOTAL PAGO  $ <?php echo number_format($total);?></th>
									</tr>
								</tbody>
							</table>
							<p class="centered">Gracias por su compra!
							<br>www.gimnasiolasamericas.com</p>
						</div>
					</body>
				</html>
			</div>
			<div class="modal-footer">
				<button  id="btnPrint" class="btn btn-info" onclick="imprimir()"><i class="fa-solid fa-print fa-2x"></i></button>
				<button  class="btn btn-danger" data-bs-dismiss="modal" ><i class="fa-solid fa-x fa-2x"></i></button>
			</div>
		</div>
	</div>
</div>
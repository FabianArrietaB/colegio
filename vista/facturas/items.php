<?php
	$action = (isset($_REQUEST['action'])
	&& $_REQUEST['action'] !=NULL)?
	$_REQUEST['action']:'';
	if($action == 'ajax'){
		/* Connect To Database*/
		require_once ("../../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
		$con = new Conexion();
		$conexion = $con->conectar();
		if (isset($_REQUEST['id'])){
			$id=intval($_REQUEST['id']);
			$delete=mysqli_query($conexion,"delete from tmp where id='$id'");
		}

		if (isset($_POST['idproducto'])){
			$idproducto = intval($_POST['idproducto']);
			$idtippag = intval($_POST['idtippagou']);
			$descripcion = mysqli_real_escape_string($conexion,$_POST['detalle']);
			$cantidad = intval($_POST['cantidad']);
			$precio = floatval($_POST['precio']);
			$sql="INSERT INTO `tmp` (`id`, `id_producto`, `id_tippag`, `descripcion`, `cantidad`, `precio`) VALUES (NULL, '$idproducto', $idtippag, '$descripcion', '$cantidad', '$precio');";
			$insert=mysqli_query($conexion,$sql);
		}
		$query_perfil=mysqli_query($conexion,"select * from sedes where id_sedes = 1");
		$rw=mysqli_fetch_assoc($query_perfil);
		$query=mysqli_query($conexion,"select * from tmp order by id");
		$items=1;
		$suma=0;

		while($row=mysqli_fetch_array($query)){
			$total=$row['cantidad']*$row['precio'];
			$total=number_format($total,2,'.','');
?>
		<tr>
			<td class='text-center'><?php echo $items;?></td>
			<td><?php echo $row['descripcion'];?></td>
			<td class='text-center'><?php echo $row['cantidad'];?></td>
			<td class='text-right'><?php echo $row['precio'];?></td>
			<td class='text-right'><?php echo $total;?></td>
			<td class='text-right'><a href="#" onclick="eliminar_item('<?php echo $row['id']; ?>')" ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUAAADnTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDx+VWpeAAAAJ3RSTlMAAQIFCAkPERQYGi40TVRVVlhZaHR8g4WPl5qdtb7Hys7R19rr7e97kMnEAAAAaklEQVQYV7XOSQKCMBQE0UpQwfkrSJwCKmDf/4YuVOIF7F29VQOA897xs50k1aknmnmfPRfvWptdBjOz29Vs46B6aFx/cEBIEAEIamhWc3EcIRKXhQj/hX47nGvt7x8o07ETANP2210OvABwcxH233o1TgAAAABJRU5ErkJggg=="></a></td>
		</tr>
	<?php
		$items++;
		$suma+=$total;
		
	}
		$iva=$suma * (16 / 100);
		$total_iva=number_format($iva,2,'.','');
		$total=$suma + $total_iva;
	?>
	<tr>
		<td colspan='6'>
		
			<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#producto"><span class="glyphicon glyphicon-plus"></span> Agregar Ítem</button>
		</td>
	</tr>
	<tr>
		<td colspan='4' class='text-right'>
			NETO
		</td>
		<th class='text-right'>
			<?php echo number_format($suma,2);?>
		</th>
		<td></td>
	</tr>
	
	<tr>
		<td colspan='4' class='text-right'>
			IVA
		</td>
		<th class='text-right'>
			<?php echo number_format($total_iva,2);?>
		</th>
		<td></td>
	</tr>
	
	<tr>
		<td colspan='4' class='text-right'>
			TOTAL
		</td>
		<th class='text-right'>
			<?php echo number_format($total,2);?>
		</th>
		<td></td>
	</tr>
	<?php
}
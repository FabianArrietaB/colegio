<?php
    include "header.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 3||
    $_SESSION['usuario']['rol'] == 4){
    include "../modelo/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
?>
<!-- inicio del contenido principal -->

	<body>
		<div class="main-container">
			<div class="main">
				<div class="box-container">
					<div class="textoddd">SOFTWARE EDUCATIVO</div>
				</div>
				<br>
				<br>
				<br>
				<div class="box-container">
					<a href="inicio.php">
						<div class="box box1">
							<div class="text">
								<h2 class="topic">INICIO</h2>
							</div>
							<i class="fa-solid fa-house fa-2x" style="color: #ffffff;"></i>
						</div>
					</a>
					<a href="alumnos.php">
						<div class="box box1">
							<div class="text">
								<h2 class="topic">ALUMNOS</h2>
							</div>
							<i class="fa-solid fa-graduation-cap fa-2x" style="color: #ffffff;"></i>
						</div>
					</a>
					<a href="empleados.php">
						<div class="box box1">
							<div class="text">
								<h2 class="topic">EMPLEADOS</h2>
							</div>
							<i class="fa-regular fa-user fa-2x" style="color: #ffffff;"></i>
						</div>
					</a>
					<a href="solicitudes.php">
						<div class="box box1">
							<div class="text">
								<h2 class="topic">SOLICITUDES</h2>
							</div>
							<i class="fa-solid fa-list-check fa-2x" style="color: #ffffff;"></i>
						</div>
					</a>
				</div>
				<br><br>
				<div class="box-container">
					<a href="informes.php">
						<div class="box box1">
							<div class="text">
								<h2 class="topic">INFORMES</h2>
							</div>
							<i class="fa-solid fa-file-invoice fa-2x" style="color: #ffffff;"></i>
						</div>
					</a>
					<a href="grados.php">
						<div class="box box1">
							<div class="text">
								<h2 class="topic">GRADOS</h2>
							</div>
							<i class="fa-solid fa-chalkboard-user fa-2x" style="color: #ffffff;"></i>
						</div>
					</a>
					<a href="productos.php">
						<div class="box box1">
							<div class="text">
								<h2 class="topic">PRODUCTOS</h2>
							</div>
							<i class="fa-brands fa-product-hunt fa-2x" style="color: #ffffff;"></i>
						</div>
					</a>
					<a href="estadisticas.php">
						<div class="box box1">
							<div class="text">
								<h2 class="topic">ESTADISTICAS</h2>
							</div>
							<i class="fa-solid fa-chart-simple fa-2x" style="color: #ffffff;"></i>
						</div>
					</a>
				</div>
				<br>
				<br><br>
				<div class="box-container">
					<div class="textoddd"><div class="logo_name"><?php echo 'BIENVENIDO '. $_SESSION['usuario']['nombre'];?></div></div>
				</div>
				<br>
				<br>
				<br>
				<div class="box-container">
					<a href="../controlador/usuarios/salir.php">
						<div class="salir box1">
						<i class="fa-solid fa-right-from-bracket fa-2x" style="color: #ffffff;"></i>
						</div>
					</a>
				</div>
			</div>
		</div>
		<?php }else{
			header("../index.php");
		}
		?>
	</body>
</html>

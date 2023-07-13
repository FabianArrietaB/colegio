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
			
<?php }else{
	header("../index.php");
}
?>

			<!-- <div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Recent Articles</h1>
					<button class="view">View All</button>
				</div>
				<div class="report-body">
					<div class="report-topic-heading">
						<h3 class="t-op">Article</h3>
						<h3 class="t-op">Views</h3>
						<h3 class="t-op">Comments</h3>
						<h3 class="t-op">Status</h3>
					</div>
					<div class="items">
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 73</h3>
							<h3 class="t-op-nextlvl">2.9k</h3>
							<h3 class="t-op-nextlvl">210</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 72</h3>
							<h3 class="t-op-nextlvl">1.5k</h3>
							<h3 class="t-op-nextlvl">360</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 71</h3>
							<h3 class="t-op-nextlvl">1.1k</h3>
							<h3 class="t-op-nextlvl">150</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 70</h3>
							<h3 class="t-op-nextlvl">1.2k</h3>
							<h3 class="t-op-nextlvl">420</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 69</h3>
							<h3 class="t-op-nextlvl">2.6k</h3>
							<h3 class="t-op-nextlvl">190</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 68</h3>
							<h3 class="t-op-nextlvl">1.9k</h3>
							<h3 class="t-op-nextlvl">390</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 67</h3>
							<h3 class="t-op-nextlvl">1.2k</h3>
							<h3 class="t-op-nextlvl">580</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 66</h3>
							<h3 class="t-op-nextlvl">3.6k</h3>
							<h3 class="t-op-nextlvl">160</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>
						<div class="item1">
							<h3 class="t-op-nextlvl">Article 65</h3>
							<h3 class="t-op-nextlvl">1.3k</h3>
							<h3 class="t-op-nextlvl">220</h3>
							<h3 class="t-op-nextlvl label-tag">Published</h3>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>

	<script src="./index.js"></script>
</body>
</html>

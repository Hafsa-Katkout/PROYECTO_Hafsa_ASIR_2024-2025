<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>HafsaTech Pro S.L.</title>

	<!-- Add some styles -->
	<style>
		body {
			background-color: black;
			color: white;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		header {
			text-align: center;
			padding: 20px;
		}

		h1 {
			font-size: 2.5em;
			margin: 0;
		}

		.main-content {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 80vh;
			flex-direction: column;
			text-align: center;
		}

		.circle-container {
			display: flex;
			justify-content: space-evenly;
			width: 100%;
			margin: 20px 0;
		}

		.circle {
			width: 150px;
			height: 150px;
			border-radius: 50%;
			overflow: hidden;
			border: 2px solid white;
		}

		.circle img {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		.text-block {
			background-color: rgba(0, 0, 0, 0.7);
			border: 2px solid white;
			padding: 20px;
			width: 80%;
			max-width: 600px;
			margin-top: 20px;
		}

		.text-block h2 {
			margin-top: 0;
		}

		.text-block p {
			font-size: 1.1em;
		}
	</style>
</head>
<body>
<div>
	<header>
		<h1>HafsaTech Pro S.L.</h1>
	</header>

	<main>
		<div class="main-content">
			<!-- Circles with images -->
			<div class="circle-container">
				<div class="circle">
					<img src="https://i.pinimg.com/474x/84/8b/ed/848bed359379148a865e8a224064aed5.jpg" alt="Image 1">
				</div>
				<div class="circle">
					<img src="https://i.pinimg.com/736x/9d/fb/e3/9dfbe3c1034de2ddbf01d19c25c5bddf.jpg" alt="Image 2">
				</div>
				<div class="circle">
					<img src="https://i.pinimg.com/736x/b1/61/44/b16144c196d8d61fa358d3c7cc9d3ea0.jpg" alt="Image 3">
				</div>
			</div>

			<!-- Text blocks -->
			<div class="text-block">
				<h2>Información sobre el producto</h2>
				<p>¡Tu producto ha sido modificado con éxito y está listo para brillar! 🌟 Si quieres descubrir más sobre nuestros increíbles productos, te invitamos a explorar nuestra página de inicio. Y si tienes alguna duda, no dudes en contactarnos a HafsaTechPro@gmail.com. ¡Estaremos encantados de ayudarte! 😊</p>
			</div>

			<!-- PHP form for product modification -->
			<?php
			if(isset($_POST['modifica'])) {
				$producto_id = $mysqli->real_escape_string($_POST['producto_id']);
				$nombre = $mysqli->real_escape_string($_POST['nombre']);
				$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
				$precio = $mysqli->real_escape_string($_POST['precio']);
				$stock = $mysqli->real_escape_string($_POST['stock']);
				$categoria = $mysqli->real_escape_string($_POST['categoria']);
				$tendencia = $mysqli->real_escape_string($_POST['tendencia']);
				$fecha_agregado = $mysqli->real_escape_string($_POST['fecha_agregado']);
				$visitas = $mysqli->real_escape_string($_POST['visitas']);
				$calificacion = $mysqli->real_escape_string($_POST['calificacion']);

				if(empty($nombre) || empty($descripcion) || empty($precio) || empty($stock) || empty($categoria) || empty($tendencia) || empty($fecha_agregado) || empty($visitas) || empty($calificacion)) {
					// Error messages for empty fields
					if(empty($nombre)) { echo "<font color='red'>Campo nombre vacío.</font><br/>"; }
					if(empty($descripcion)) { echo "<font color='red'>Campo Descripcion vacío.</font><br/>"; }
					if(empty($precio)) { echo "<font color='red'>Campo Precio vacío.</font><br/>"; }
					if(empty($stock)) { echo "<font color='red'>Campo Stock vacío.</font><br/>"; }
					if(empty($categoria)) { echo "<font color='red'>Campo Categoria vacío.</font><br/>"; }
					if(empty($tendencia)) { echo "<font color='red'>Campo Tendencia vacío.</font><br/>"; }
					if(empty($fecha_agregado)) { echo "<font color='red'>Campo Fecha vacío.</font><br/>"; }
					if(empty($visitas)) { echo "<font color='red'>Campo Visitas vacío.</font><br/>"; }
					if(empty($calificacion)) { echo "<font color='red'>Campo Calificacion vacío.</font><br/>"; }
				} else {
					// Update product record
					$mysqli->query("UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', stock = '$stock', categoria = '$categoria', tendencia = '$tendencia', fecha_agregado = '$fecha_agregado', visitas = '$visitas', calificacion = '$calificacion' WHERE producto_id = $producto_id");
					$mysqli->close();
					echo "<div>Registro editado correctamente...</div>";
					echo "<a href='index.php'>Ver resultado</a>";
				}
			}
			?>
		</div>
	</main>
</div>
</body>
</html>



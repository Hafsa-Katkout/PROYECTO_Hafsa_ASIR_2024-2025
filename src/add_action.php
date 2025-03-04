<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Añadir Producto</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background: url('https://i.pinimg.com/736x/b8/36/56/b836562c5437e14c9b2774ca5c722ec9.jpg') no-repeat center center fixed;
			background-size: cover;
			color: white;
			text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
			margin: 0;
			padding: 0;
		}
		header {
			background-color: rgba(0, 0, 0, 0.5);
			padding: 20px;
			text-align: center;
			margin-bottom: 20px;
			border: 3px solid white; /* White border */
			border-radius: 5px;
		}
		header h1 {
			font-size: 3em;
			margin: 0;
			color: white;
			text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
		}
		.main-container {
			width: 80%;
			margin: 0 auto;
			background-color: rgba(0, 0, 0, 0.7);
			padding: 30px;
			border-radius: 10px;
			border: 3px solid white; /* White border */
		}
		.main-container a {
			color: white;
			text-decoration: none;
			font-weight: bold;
		}
		.main-container a:hover {
			color: #ff0;
		}
		.form-container {
			display: flex;
			flex-direction: column;
		}
		.form-container input, .form-container textarea, .form-container select {
			margin-bottom: 10px;
			padding: 10px;
			border: 2px solid white; /* White border for form inputs */
			border-radius: 5px;
			font-size: 1em;
			background-color: rgba(255, 255, 255, 0.2);
			color: white;
		}
		.form-container input[type="submit"] {
			background-color: #ff0;
			color: #000;
			font-weight: bold;
			cursor: pointer;
			border: none;
		}
		.form-container input[type="submit"]:hover {
			background-color: #fff;
			color: #ff0;
		}
	</style>
</head>
<body>
	<div class="main-container">
	<header>
		<h1>HafsaTech Pro S.L.</h1>
	</header>
	<main>

<?php
/* Se Comprueba si se ha llegado a esta página PHP a través del formulario de altas. 
Para ello se comprueba la variable de formulario: "inserta" enviada al pulsar el botón Agregar.
Los datos del formulario se acceden por el método: POST
*/

if(isset($_POST['inserta'])) 
{
/*Se obtienen los datos del empleado (nombre, apellido, edad y puesto) a partir del formulario de alta (name, surname, age y job)  por el método POST.
Se envía a través del body del HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['idempleado']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

	$nombre = $mysqli->real_escape_string($_POST['nombre']);
	echo $nombre."\n";
	$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
	echo $descripcion."\n";
	$precio = $mysqli->real_escape_string($_POST['precio']);
	echo $precio."\n";
	$stock = $mysqli->real_escape_string($_POST['stock']);
	echo $stock."\n";
	$categoria = $mysqli->real_escape_string($_POST['categoria']);
	echo $categoria."\n";
	$tendencia = $mysqli->real_escape_string($_POST['tendencia']);
	echo $tendencia."\n";
	$fecha_agregado = $mysqli->real_escape_string($_POST['fecha_agregado']);
	echo $fecha_agregado."\n";
	$visitas = $mysqli->real_escape_string($_POST['visitas']);
	echo $visitas."\n";
	$calificacion = $mysqli->real_escape_string($_POST['calificacion']);
	echo $calificacion."\n";

/*Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
Esta función es usada para crear una cadena SQL legal que se puede usar en una sentencia SQL. 
Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.
Ejemplo: Entrada sin escapar: "O'Reilly" contiene una comilla simple (').
Escapado con mysqli_real_escape_string(): Se convierte en "O\'Reilly", evitando que la comilla se interprete como el fin de una cadena en SQL.
*/

//Se comprueba si existen campos del formulario vacíos
	if(empty($nombre) || empty($descripcion) || empty($precio) || empty($stock) || empty($categoria) || empty($tendencia) || empty($fecha_agregado) || empty($visitas) || empty($calificacion) ) 
	{
		if(empty($nombre)) {
			echo "<div>Campo Nombre vacío.</div>";
		}

		if(empty($descripcion)) {
			echo "<div>Campo Descripcion vacío</div>";
		}

		if(empty($precio)) {
			echo "<div>Campo Precio vacío.</div>";
		}

		if(empty($stock)) {
			echo "<div>Campo Stock vacío.</div>";
		}
		if(empty($categoria)) {
			echo "<div>Campo Categoria vacío.</div>";
		}
		if(empty($tendencia)) {
			echo "<div>Campo Tendencia vacío.</div>";
		}
		if(empty($fecha_agregado)) {
			echo "<div>Campo Fecha_agregado vacío.</div>";
		}
		if(empty($visitas)) {
			echo "<div>Campo Visitas vacío.</div>";
		}
		if(empty($calificacion)) {
			echo "<div>Campo Calificacion vacío.</div>";
		}
//Enlace a la página anterior
		//Se cierra la conexión
		$mysqli->close();
		echo "<a href='javascript:self.history.back();'>Volver atras</a>";
	} //fin si
	else //Sino existen campos de formulario vacíos se procede al alta del nuevo registro
	{
//Se ejecuta una sentencia SQL. Inserta (da de alta) el nuevo registro: insert.
	echo "Vamos a insertar un registro\n";
		$result = $mysqli->query("INSERT INTO productos (nombre, descripcion, precio,stock,categoria,tendencia,fecha_agregado,visitas,calificacion) VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$categoria', '$tendencia', '$fecha_agregado', '$visitas', '$calificacion')");	
		//Se cierra la conexión
		$mysqli->close();
		echo "<div>Registro añadido correctamente...</div>";
		echo "<a href='index.php'>Ver resultado</a>";
		//Se redirige a la página principal: index.php
		//header("Location:index.php");
	}//fin sino
}
?>

 	<!--<div>Registro añadido correctamente</div>
	<a href='index.php'>Ver resultado</a>-->
	</main>
</div>
</body>
</html>


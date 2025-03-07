<?php
//Incluye fichero con parámetros de conexión a la base de datos
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <style>
        /* Adding background image */
        body {
            background-image: url('your-image-url.jpg'); /* Replace 'your-image-url.jpg' with the actual image path */
            background-size: cover;
            background-position: center;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Styling the text */
        h1 {
            text-align: center;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.8);
            border: 2px solid white;
            padding: 10px;
        }

        main {
            text-align: center;
            margin-top: 50px;
            font-size: 18px;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.8);
        }

        a {
            color: white;
            text-decoration: none;
            border: 1px solid white;
            padding: 10px 20px;
            margin-top: 20px;
            display: inline-block;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
        }

        a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
        }

        div {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            margin: 0 auto;
            width: fit-content;
        }
    </style>
</head>
<body>
<div>
	<header>
		<h1>HafsaTech Pro S.L.</h1>
	</header>
	<main>

<?php
/*Obtiene el id del registro del empleado a eliminar, idempleado, a partir de su URL. Se recibe el dato utilizando el método: GET 
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['idempleado']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

//Recoge el id del empleado a eliminar a través de la clave idempleado del array asociativo $_GET y lo almacena en la variable idempleado
$producto_id = $_GET['producto_id'];

//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$producto_id = $mysqli->real_escape_string($producto_id);

//Se realiza el borrado del registro: delete.
$result = $mysqli->query("DELETE FROM productos WHERE producto_id = $producto_id");

//Se cierra la conexión de base de datos previamente abierta
$mysqli->close();
echo "<div>Registro borrado correctamente...</div>";
echo "<a href='index.php'>Ver resultado</a>";
//Se redirige a la página principal: index.php
//header("Location:index.php");
?>

    <!--<div>Registro borrado correctamente</div>
	<a href='index.php'>Ver resultado</a>-->
    </main>
</div>
</body>
</html>



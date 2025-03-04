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
	<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            height: 100vh;
            background: #121212; /* Dark background */
            color: white;
            font-family: 'Arial', sans-serif;
            overflow-y: auto; /* Ensure the page is scrollable */
        }
        .main-container {
            display: flex;
            width: 100%;
            position: fixed; /* Fixing the layout for both scrolling up and down */
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 100;
        }
        .content {
            width: 50%; /* Adjusting content width */
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            text-align: left;
            box-shadow: 10px 0px 20px rgba(255, 255, 255, 0.2);
            border-radius: 10px; /* Rounded corners */
            background: #1e1e1e; /* Slightly lighter background for content */
            overflow-y: auto;
            height: 100vh; /* Full height */
        }
        .content header h1 {
            font-size: 36px;
            font-weight: bold;
            color: white; /* White color for the big title */
            margin-bottom: 20px;
            text-align: center;
        }
        .content ul {
            list-style-type: none;
            margin: 10px 0;
            padding: 0;
        }
        .content ul li {
            margin: 10px 0;
        }
        .content ul li a {
            color: #007bff; /* Blue color for links */
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #333;
            transition: background-color 0.3s, color 0.3s;
        }
        .content ul li a:hover {
            background-color: #007bff;
            color: #fff;
        }
        .form-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .form-container div {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .form-container label {
            font-size: 16px;
            font-weight: bold;
        }
        .form-container input, .form-container select {
            padding: 10px;
            border: 2px solid #333;
            border-radius: 5px;
            font-size: 16px;
            background-color: #2a2a2a;
            color: #fff;
            transition: border-color 0.3s;
        }
        .form-container input:focus, .form-container select:focus {
            border-color: #ff6f61;
        }
        .form-container input[type="submit"] {
            background-color: #ff6f61;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-container input[type="submit"]:hover {
            background-color: #ff4c40;
        }
        .form-container input[type="button"] {
            background-color: #444;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .form-container input[type="button"]:hover {
            background-color: #666;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
        footer a {
            color: #ff6f61;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        .image-container {
    width: 50%; /* The container takes up half of the screen */
    background: url(https://i.pinimg.com/474x/40/7d/30/407d30eb33ad8c9163d0e76cca09937f.jpg) no-repeat center center;
    background-size: 100% 100%; /* Ensures the image covers the entire area */
    border-radius: 0 10px 10px 0; /* Rounded corners */
    height: 100vh; /* The image will fill the height */
}
    </style>
</head>
<body>
<div class="main-container">
    <div class="content">
        <header>
            <h1>HafsaTech Pro S.L.</h1>
        </header>
        <main>				
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="add.html">Añadir producto</a></li>
            </ul>
            <h2>Modificación de Producto</h2>

        <?php
        /*Obtiene el id del registro del empleado a modificar, idempleado, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

        //Recoge el id del empleado a modificar a través de la clave idempleado del array asociativo $_GET y lo almacena en la variable idempleado
        $producto_id = $_GET['producto_id'];

        //Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
        $producto_id = $mysqli->real_escape_string($producto_id);

        //Se selecciona el registro a modificar: select
        $resultado = $mysqli->query("SELECT nombre , descripcion , precio , stock , categoria , tendencia , fecha_agregado , visitas , calificacion FROM productos WHERE producto_id = $producto_id");

        //Se extrae el registro y lo guarda en el array $fila
        //Nota: También se puede utilizar el método fetch_assoc de la siguiente manera: $fila = $resultado->fetch_assoc();
        $fila = $resultado->fetch_array();
        $nombre = $fila['nombre'];
        $descripcion = $fila['descripcion'];
        $precio = $fila['precio'];
        $stock = $fila['stock'];
        $categoria = $fila['categoria'];
        $tendencia = $fila['tendencia'];
        $fecha_agregado = $fila['fecha_agregado'];
        $visitas = $fila['visitas'];
        $calificacion = $fila['calificacion'];

        //Se cierra la conexión de base de datos
        $mysqli->close();
        ?>

        <!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a la página (form action="edit_action.php"): edit_action.php-->
        <form action="edit_action.php" method="post" class="form-container">
             <div>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" required>
            </div>
            <div>
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>" required>
            </div>
            <div>
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" value="<?php echo $precio;?>" required>
            </div>
            <div>
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" value="<?php echo $stock;?>" required>
            </div>
            <div>
                <label for="categoria">Categoría del producto</label>
                <select name="categoria" id="categoria">
                    <option value="<?php echo $categoria;?>" selected><?php echo $categoria;?></option>
                    <option value="Ropa">Ropa</option>
                    <option value="Accesorios">Accesorios</option>
                    <option value="Calzado">Calzado</option>
                    <option value="Decoración">Decoración</option>
                    <option value="Tecnología">Tecnología</option>
                    <option value="Joyería">Joyería</option>
                </select>
            </div>
            <div>
                <label for="tendencia">Tendencia</label>
                <select name="tendencia" id="tendencia">
                    <option value="<?php echo $tendencia;?>" selected><?php echo $tendencia;?></option>
                    <option value="Baja">Baja</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div>
                <label for="fecha_agregado">Fecha de Agregado</label>
                <input type="datetime-local" name="fecha_agregado" id="fecha_agregado" value="<?php echo $fecha_agregado;?>" required>
            </div>
            <div>
                <label for="visitas">Número de visitas</label>
                <input type="number" name="visitas" id="visitas" value="<?php echo $visitas;?>" required>
            </div>
            <div>
                <label for="calificacion">Calificación</label>
                <input type="number" name="calificacion" id="calificacion" value="<?php echo $calificacion;?>" required>
            </div>

            <div>
                <input type="hidden" name="producto_id" value=<?php echo $producto_id;?>>
                <input type="submit" name="modifica" value="Guardar">
                <input type="button" value="Cancelar" onclick="location.href='index.php'">
            </div>
        </form>
        </main>	
        <footer>
            Creado por Hafsa Katkout Aabil &copy; 2025
        </footer>
    </div>
    <div class="image-container"></div>
</div>
</body>
</html>







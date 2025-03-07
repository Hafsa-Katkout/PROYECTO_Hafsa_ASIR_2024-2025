<?php
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HafsaTech Pro S.L.</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://getwallpapers.com/wallpaper/full/a/0/7/957604-grafiti-wallpapers-1920x1200-download-free.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            text-align: center;
        }
        header {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            font-size: 24px;
            text-transform: uppercase;
            border-bottom: 4px solid white;
            box-shadow: 0 0 10px white;
        }
        main {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            border-radius: 10px;
            border: 2px solid white;
            box-shadow: 0 0 15px white;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            display: inline;
            margin: 10px;
        }
        a {
            text-decoration: none;
            color: #ffcc00;
            font-weight: bold;
            padding: 5px 10px;
            background: #333;
            border-radius: 5px;
            transition: 0.3s;
            border: 2px solid white;
            box-shadow: 0 0 10px white;
            display: inline-block;
            width: 45%;
        }
        a:hover {
            background: #ff6600;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid white;
            padding: 10px;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 5px white;
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
        }
        .action-buttons a {
            font-size: 12px;
        }
        footer {
            margin-top: 20px;
            padding: 10px;
            background: rgba(0, 0, 0, 0.7);
            border-top: 4px solid white;
            box-shadow: 0 0 10px white;
        }
    </style>
</head>
<body>
<div>
    <header>
        <h1>Salam Alaikom</h1>
    </header>
    <main>
        <ul>
            <li><a href="index.php">Página Principal</a></li>
            <li><a href="add.html">Añadir Producto</a></li>
        </ul>
        <h2>Productos</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Tendencia</th>
                    <th>Fecha_Agregación</th>
                    <th>Visitas</th>
                    <th>Calificación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $resultado = $mysqli->query("SELECT * FROM productos ORDER BY nombre");
                $mysqli->close();
                if ($resultado->num_rows > 0) {
                    while($fila = $resultado->fetch_array()) {
                        echo "<tr>\n";
                        echo "<td>".$fila['nombre']."</td>\n";
                        echo "<td>".$fila['descripcion']."</td>\n";
                        echo "<td>".$fila['precio']."</td>\n";
                        echo "<td>".$fila['stock']."</td>\n";
                        echo "<td>".$fila['categoria']."</td>\n";
                        echo "<td>".$fila['tendencia']."</td>\n";
                        echo "<td>".$fila['fecha_agregado']."</td>\n";
                        echo "<td>".$fila['visitas']."</td>\n";
                        echo "<td>".$fila['calificacion']."</td>\n";
                        echo "<td class='action-buttons'>";
                        echo "<a href=\"edit.php?producto_id=$fila[producto_id]\">Edición</a>";
                        echo "<a href=\"delete.php?producto_id=$fila[producto_id]\" onClick=\"return confirm('¿Está seguro de eliminar este producto?')\">Eliminar</a>";
                        echo "</td>";
                        echo "</tr>\n";
                    }
                }
            ?>
            </tbody>
        </table>
    </main>
    <footer>
        Creado por Hafsa Katkout Aabil &copy; 2025
    </footer>
</div>
</body>
</html>


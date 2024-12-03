<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$libro = mysqli_query($conexion, "SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Productos</title>
</head>
<body>
    <h1>Administración De Productos</h1><br>
    
    <!-- Tabla de productos -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Libro</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php
        while ($fila = mysqli_fetch_array($libro)) {
            echo ("<tr>
                    <td>" . $fila['id'] . "</td>
                    <td>" . $fila['Libro'] . "</td>
                    <td>" . $fila['precio'] . "</td>
                    <td>
                        <br>
                        <a href='elimina_producto.php?id=" . $fila['id'] . "'>Eliminar</a>
                    </td>
                </tr>");
        }
        ?>
    </table>

    <br>
    
    <!-- Botón para agregar un nuevo producto -->
    <a href="agregar_producto.php"><input type="button" value="Agregar Producto"></a>
    
    <br><br>
    <!-- Botón para regresar a la página principal -->
    <a href="administrar.php"><input type="button" value="Regresar a la Página Principal"></a>
</body>
</html>

<?php
// Cerrar conexión
mysqli_close($conexion);
?>

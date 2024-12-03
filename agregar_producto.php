<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $libro = mysqli_real_escape_string($conexion, $_POST['libro']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);

    // Consulta para insertar el nuevo producto
    $consulta = "INSERT INTO productos (Libro, precio) VALUES ('$libro', '$precio')";

    if (mysqli_query($conexion, $consulta)) {
        echo "Producto agregado correctamente.";
        header("Location: productos.php"); // Redirigir después de agregar
        exit();
    } else {
        echo "Error al agregar el producto: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
</head>
<body>
    <h1>Agregar Nuevo Producto</h1>

    <form action="agregar_producto.php" method="POST">
        <label for="libro">Libro:</label><br>
        <input type="text" id="libro" name="libro" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="text" id="precio" name="precio" required><br><br>

        <input type="submit" value="Agregar Producto">
    </form>

    <br>
    <a href="productos.php"><input type="button" value="Regresar a la Página Principal"></a>
</body>
</html>

<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nombre = $POST['Nombre'];
    $Apellidos = $POST['Apellidos'];
    $Direccion = $_POST['Direccion'];

    // Inserción en la base de datos
    $consulta = "INSERT INTO proveedor (Nombre, Apellidos, Direccion) VALUES ('$Nombre', '$Apellidos', '$Direccion')";

    if (mysqli_query($conexion, $consulta)) {
        // Redirigir a la página de administración de usuarios
        header("Location: proveedor.php");
        exit();
    } else {
        echo "Error al agregar el proveedor: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor</title>
</head>
<body>
    <h1>Agregar Nuevo Proveedor</h1>
    <form action="agregar_proveedor1.php" method="post">
        <label for="Nombre">Nombre del Proveedor:</label><br>
        <input type="text" name="Nombre" required><br><br>
        
        <label for="Apellidos">Apellidos:</label><br>
        <input type="text" name="apellidos" required><br><br>

        <label for="Direccion">Direccion:</label><br>
        <input type="text" name="Direccion" required><br><br>
        
        <input type="submit" value="Agregar Proveedor">
    </form>
    
    <br>
    <a href="proveedor.php"><input type="button" value="Regresar a Administración"></a>
</body>
</html>

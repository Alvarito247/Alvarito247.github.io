<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nombre = $_POST['Nombre'];
    $Apellidos = $_POST['Apellidos'];
    $Direccion = $_POST['Direccion'];

    // Escapar caracteres especiales para evitar inyecciones SQL
    $Nombre = mysqli_real_escape_string($conexion, $Nombre);
    $Apellidos = mysqli_real_escape_string($conexion, $Apellidos);
    $Direccion = mysqli_real_escape_string($conexion, $Direccion);

    // Depuración: Mostrar los datos recibidos
    echo "Nombre: " . $Nombre . "<br>";
    echo "Apellidos: " . $Apellidos . "<br>";
    echo "Dirección: " . $Direccion . "<br>";

    // Inserción en la base de datos
    $consulta = "INSERT INTO proveedor (Nombre, Apellidos, Direccion) VALUES ('$Nombre', '$Apellidos', '$Direccion')";

    // Mostrar la consulta SQL para verificar que los valores sean correctos
    echo "Consulta SQL: " . $consulta . "<br>";

    // Verificar si la inserción fue exitosa
    if (mysqli_query($conexion, $consulta)) {
        // Redirigir a la página de administración de proveedores después de agregar
        header("Location: proveedor.php"); 
        exit();
    } else {
        echo "Error al agregar el proveedor: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion); // Cerrar conexión
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
        <input type="text" name="Apellidos" required><br><br>

        <label for="Direccion">Dirección:</label><br>
        <input type="text" name="Direccion" required><br><br>
        
        <input type="submit" value="Agregar Proveedor">
    </form>
    
    <br>
    <a href="proveedor.php"><input type="button" value="Regresar a Administración"></a>
</body>
</html>

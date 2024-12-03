<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Escapar caracteres especiales para evitar inyecciones SQL
    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $password = mysqli_real_escape_string($conexion, $password);

    // Inserción en la base de datos
    $consulta = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password')";

    // Verificar si la inserción fue exitosa
    if (mysqli_query($conexion, $consulta)) {
        echo "Usuario agregado: " . $usuario; // Mensaje para depuración
        header("Location: usuario.php"); // Redirigir a la página de administración de usuarios
        exit();
    } else {
        echo "Error al agregar el usuario: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion); // Cerrar conexión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
</head>
<body>
    <h1>Agregar Nuevo Usuario</h1>
    <form action="agregar.php" method="post">
        <label for="usuario">Nombre de Usuario:</label><br>
        <input type="text" name="usuario" required><br><br>
        
        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Agregar Usuario">
    </form>
    
    <br>
    <a href="usuario.php"><input type="button" value="Regresar a Administración"></a>
</body>
</html>
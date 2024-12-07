<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Inserción en la base de datos
    $consulta = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password')";

    if (mysqli_query($conexion, $consulta)) {
        // Redirigir a la página de administración de usuarios
        header("Location: usuario.php");
        exit();
    } else {
        echo "Error al agregar el usuario: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
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
    <form action="agregar_1.php" method="post">
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

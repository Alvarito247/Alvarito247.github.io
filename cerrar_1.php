<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtener el usuario de la sesión
    $usuario = $_SESSION['usuario'];

    // Consulta para eliminar al usuario de la base de datos
    $consultaEliminar = "DELETE FROM usuarios WHERE usuario='$usuario'";
    if (mysqli_query($conexion, $consultaEliminar)) {
        // Reorganizar los IDs
        $consultaReorganizar = "SET @autoid := 0; 
            UPDATE usuarios SET id = (@autoid := @autoid + 1); 
            ALTER TABLE usuarios AUTO_INCREMENT = 1;";
        mysqli_multi_query($conexion, $consultaReorganizar);

        // Cerrar la sesión
        session_destroy();
        // Redirigir al usuario al login
        header("Location: login.html");
        exit();
    } else {
        echo "Error al eliminar el perfil: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Cerrar Sesión</title>
    <link rel="stylesheet" href="cerrar_1.css"> <!-- Usamos un CSS personalizado -->
</head>
<body>
    <div class="perfil-container">
        <h1>¿Deseas realmente cerrar tu sesión?</h1>
        <form method="POST">
            <button type="submit" class="btn-confirmar">Sí, cerrar sesión</button>
            <a href="libreria.html" class="btn-cancelar">Cancelar</a>
        </form>
    </div>
</body>
</html>

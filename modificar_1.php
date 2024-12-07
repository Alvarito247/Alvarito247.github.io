<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectar a la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

    // Verificar la conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Recoger los datos del formulario
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Preparar y ejecutar la consulta de actualización
    $consulta = "UPDATE usuarios SET usuario = ?, password = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $consulta);
    
    // Verificar si la preparación fue exitosa
    if ($stmt) {
        // Enlazar parámetros
        mysqli_stmt_bind_param($stmt, "ssi", $usuario, $password, $id);
        
        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            echo "Usuario actualizado correctamente.";
        } else {
            echo "Error al actualizar el usuario: " . mysqli_error($conexion);
        }
        
        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "No se han enviado datos.";
}

// Redirigir a la página de usuarios después de un breve retraso
header("refresh:2;url=usuario.php");
?>



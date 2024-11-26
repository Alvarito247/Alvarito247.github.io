<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Conectar a la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Proteger contra inyección SQL
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $correo = mysqli_real_escape_string($conexion, $correo);
    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $password = mysqli_real_escape_string($conexion, $password);

    // Generar un hash seguro para la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Consulta para insertar un nuevo usuario
    $consulta = "INSERT INTO usuarios (nombre, correo, usuario, password) VALUES ('$nombre', '$correo', '$usuario', '$hashed_password')";
    
    if (mysqli_query($conexion, $consulta)) {
        echo "Usuario registrado exitosamente.";
        // Redirigir a la página de inicio de sesión
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $password = mysqli_real_escape_string($conexion, $password);
    $consulta = "SELECT * FROM admin WHERE usuario='$usuario' AND password='$password'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        echo "Inicio de sesión exitoso. Bienvenido, $usuario.";
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: administrar.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
    mysqli_close($conexion);
}
?>

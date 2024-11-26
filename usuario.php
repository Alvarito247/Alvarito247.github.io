<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    // Validación de campos vacíos
    if (empty($usuario) || empty($password)) {
        echo "Por favor, completa todos los campos.";
    } else {
        // Conectar a la base de datos
        $conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

        // Verificar si la conexión fue exitosa
        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Proteger contra inyección SQL
        $usuario = mysqli_real_escape_string($conexion, $usuario);
        $password = mysqli_real_escape_string($conexion, $password);

        // Consulta para obtener el usuario
        $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si el usuario existe
        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);

            // Verificar si las contraseñas coinciden usando password_verify
            if (password_verify($password, $fila['password'])) {
                // Iniciar sesión
                session_start();
                $_SESSION['usuario'] = $usuario;

                // Redirigir a perfil.php
                header("Location: libreria2.php");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    }
}
?>

<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: usuario.php");
    exit();
}

// Conectar a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener los datos del usuario autenticado
$usuario = $_SESSION['usuario'];
$consulta = "SELECT nombre, correo FROM usuarios WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    $datosUsuario = mysqli_fetch_assoc($resultado);
    $nombre = $datosUsuario['nombre'];
    $correo = $datosUsuario['correo'];
} else {
    echo "Error al obtener los datos del usuario.";
    exit();
}

// Cerrar la conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
        }

        .perfil-container {
            background: #ffffff10; /* Fondo semitransparente */
            padding: 30px 50px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.2rem;
            margin: 5px 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            text-decoration: none;
            color: #fff;
            background: #ff5722;
            border-radius: 5px;
            transition: background 0.3s;
        }

        a:hover {
            background: #e64a19;
        }

        @media (max-width: 600px) {
            .perfil-container {
                padding: 20px;
                font-size: 0.9rem;
            }

            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="perfil-container">
        <h1>¡Bienvenido, <?php echo htmlspecialchars($nombre); ?>!</h1>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($correo); ?></p>
        <a href="cerrar.php">Cerrar sesión</a>
    </div>
</body>
</html>

<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Validar el ID para evitar inyecciones
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Consulta para obtener la información completa del proveedor
$resultado = mysqli_query($conexion, "SELECT * FROM proveedor WHERE id = $id");

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $proveedor = mysqli_fetch_assoc($resultado);
    $Direccion = $proveedor['Direccion']; // Asegúrate de que esta columna exista en tu tabla
} else {
    $Direccion = "No disponible";
}
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del proveedor</title>
</head>
<body>
    <h1>Detalles del Proveedor</h1><br><br>
    <strong>Dirección:</strong> <?php echo htmlspecialchars($Direccion); ?><br>
    <a href="proveedor.php"><input type="button" value="Regresar"></a>

    <div class="map" style="width:100%; height:400px;">
        <?php if ($Direccion !== "No disponible"): ?>
            <iframe
                src="https://www.google.com/maps?q=<?php echo urlencode($Direccion); ?>&output=embed"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        <?php else: ?>
            <p>No se pudo cargar el mapa. Dirección no disponible.</p>
        <?php endif; ?>
    </div>
</body>
</html>

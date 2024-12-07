<?php
// Validar el ID de la venta
$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Validar el ID para evitar inyecciones

// Conectar a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Consulta para obtener la información de la venta
$resultado = mysqli_query($conexion, "SELECT * FROM ventas WHERE id = $id");

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $venta = mysqli_fetch_assoc($resultado);
    $codigo_postal = $venta['codigo_postal'];
    $colonia = $venta['colonia'];
    $Calle = $venta['Calle'];
    $numero_casa = $venta['numero_casa'];
} else {
    $codigo_postal = $colonia = $Calle = $numero_casa = "No disponible";
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Venta</title>
</head>
<body>
    <h1>Detalles de la Venta</h1><br><br>
    <strong>Código Postal:</strong> <?php echo htmlspecialchars($codigo_postal); ?><br>
    <strong>Colonia:</strong> <?php echo htmlspecialchars($colonia); ?><br>
    <strong>Calle:</strong> <?php echo htmlspecialchars($Calle); ?><br>
    <strong>Número de Casa:</strong> <?php echo htmlspecialchars($numero_casa); ?><br><br>
    
    <!-- Botón para regresar -->
    <a href="ventas.php"><input type="button" value="Regresar"></a>

    <div class="map" style="width:100%; height:400px;">
        <?php if ($codigo_postal !== "No disponible" && $colonia !== "No disponible" && $Calle !== "No disponible" && $numero_casa !== "No disponible"): ?>
            <iframe
                src="https://www.google.com/maps?q=<?php echo urlencode($Calle . ', ' . $numero_casa . ', ' . $colonia . ', ' . $codigo_postal); ?>&output=embed"
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

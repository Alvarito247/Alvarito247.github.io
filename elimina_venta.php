<?php
// Obtener el ID de la venta
$id = $_GET['id'];

// Conectar a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para eliminar la venta
$consulta = "DELETE FROM ventas WHERE id=$id";

if (mysqli_query($conexion, $consulta)) {
    // Restablecer el AUTO_INCREMENT después de eliminar
    $consultaRestablecer = "ALTER TABLE ventas AUTO_INCREMENT = 1";
    
    if (mysqli_query($conexion, $consultaRestablecer)) {
        // Redirigir al listado de ventas después de eliminar
        header("Location: ventas.php");
        exit();
    } else {
        echo "Error al restablecer el AUTO_INCREMENT: " . mysqli_error($conexion);
    }
} else {
    echo "Error al eliminar la venta: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>

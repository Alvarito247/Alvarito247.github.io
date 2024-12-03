<?php
$id = $_GET['id'];
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Consulta para obtener el nombre del libro
$resultado = mysqli_query($conexion, "SELECT Libro FROM productos WHERE id=".$id);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_array($resultado);
    $nombreLibro = $fila['Libro'];
} else {
    echo "Error: Producto no encontrado.";
    exit;
}
?>

<h1>Confirma la eliminación</h1><br><br>
Libro: <?php echo htmlspecialchars($nombreLibro); ?><br>
<a href="elimina_producto1.php?id=<?php echo($id);?>"> <input type="button" value="Aceptar"></a>
<a href="productos.php"> <input type="button" value="Cancelar"></a>

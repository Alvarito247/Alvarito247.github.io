<?php
$id = $_GET['id'];
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");
$Libro = mysqli_query($conexion,"DELETE FROM productos WHERE id=".$id);
if ($Libro) {
    mysqli_query($conexion, "SET @count = 0;"); // Reseteamos la variable de conteo
    mysqli_query($conexion, "UPDATE productos SET id = @count := (@count + 1);"); // Asignamos nuevos IDs
    mysqli_query($conexion, "ALTER TABLE productos AUTO_INCREMENT = 1;"); // Reseteamos el AUTO_INCREMENT
    echo ("Producto eliminado");
} else {
    echo ("Error al eliminar el usuario.");
}
?>

<a href="productos.php"> <input type="button" value="Aceptar"></a>
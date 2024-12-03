<?php
$id = $_GET['id'];
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");
$Libro = mysqli_query($conexion,"DELETE FROM proveedor WHERE id=".$id);
if ($Libro) {
    mysqli_query($conexion, "SET @count = 0;"); // Reseteamos la variable de conteo
    mysqli_query($conexion, "UPDATE proveedor SET id = @count := (@count + 1);"); // Asignamos nuevos IDs
    mysqli_query($conexion, "ALTER TABLE proveedor AUTO_INCREMENT = 1;"); // Reseteamos el AUTO_INCREMENT
    echo ("Proveedor eliminado");
} else {
    echo ("Error al eliminar el proveedor.");
}
?>

<a href="proveedor.php"> <input type="button" value="Aceptar"></a>
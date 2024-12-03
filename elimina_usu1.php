<?php
$id = $_GET['id'];
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");
$usuarios = mysqli_query($conexion,"DELETE FROM usuarios WHERE id=".$id);
if ($usuarios) {
    mysqli_query($conexion, "SET @count = 0;"); // Reseteamos la variable de conteo
    mysqli_query($conexion, "UPDATE usuarios SET id = @count := (@count + 1);"); // Asignamos nuevos IDs
    mysqli_query($conexion, "ALTER TABLE usuarios AUTO_INCREMENT = 1;"); // Reseteamos el AUTO_INCREMENT
    echo ("Usuario eliminado");
} else {
    echo ("Error al eliminar el usuario.");
}
?>

<a href="usuario.php"> <input type="button" value="Aceptar"></a>

<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los datos de los proveedores
$proveedor = mysqli_query($conexion, "SELECT * FROM proveedor");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Proveedores</title>
</head>
<body>
    <h1>Administración de Proveedores</h1><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Acciones</th>
        </tr>
        <?php
        while ($fila = mysqli_fetch_array($proveedor)) {
            echo ("<tr>
                    <td>" . $fila['id'] . "</td>
                    <td>" . $fila['Nombre'] . "</td>
                    <td>" . $fila['Apellidos'] . "</td>
                    <td>
                        <a href='informacion_proveedor.php?id=" . $fila['id'] . "'>Información</a>
                        <br>
                        <a href='eliminar_proveedor.php?id=" . $fila['id'] . "'>Eliminar</a>
                    </td>
                </tr>");
        }
        ?>
    </table>

    <br>
    <a href="agregar_proveedor.php"><input type="button" value="Agregar Proveedor"></a>
    <a href="administrar.php"><input type="button" value="Regresar a la Página Principal"></a>
</body>
</html>

<?php
// Cerrar conexión
mysqli_close($conexion);
?>

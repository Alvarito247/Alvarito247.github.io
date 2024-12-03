<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$usuarios = mysqli_query($conexion,"SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Usuarios</title>
</head>
<body>
    <h1>Administración De Usuarios</h1><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Password</th>
            <th>Acciones</th>
        </tr>
        <?php
        while ($fila = mysqli_fetch_array($usuarios)) {
            echo ("<tr>
                    <td>" . $fila['id'] . "</td>
                    <td>" . $fila['usuario'] . "</td>
                    <td>" . $fila['password'] . "</td>
                    <td>
                        <a href='modificar.php?id=" . $fila['id'] . "'>Modificar</a>
                        <br>
                        <a href='elimina_usu.php?id=" . $fila['id'] . "'>Eliminar</a>
                    </td>
                </tr>");
        }
        ?>
    </table>

    <br>
    <a href="agregar.php"><input type="button" value="Agregar Usuario"></a>
    <a href="administrar.php"><input type="button" value="Regresar a la Página Principal"></a>
</body>
</html>

<?php
// Cerrar conexión
mysqli_close($conexion);
?>

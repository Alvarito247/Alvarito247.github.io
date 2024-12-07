<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para obtener todos los registros de la tabla 'ventas'
$consulta = "SELECT * FROM ventas";
$resultado = mysqli_query($conexion, $consulta);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido del Carrito</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .boton-regresar {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }
        .boton-regresar:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Compras Realizadas</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Libro</th>
                <th>Precio</th>
                <th>Nombre Completo</th>
                <th>Teléfono</th>
                <th>Código Postal</th>
                <th>Colonia</th>
                <th>Calle</th>
                <th>Número de Casa</th>
                <th>Fecha de Compra</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verificar si la consulta devolvió resultados
            if (mysqli_num_rows($resultado) > 0) {
                // Iterar a través de los resultados y mostrarlos en la tabla
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['libro'] . "</td>";
                    echo "<td>" . $fila['precio'] . "</td>";
                    echo "<td>" . $fila['nombre_completo'] . "</td>";
                    echo "<td>" . $fila['Numero_Telefono'] . "</td>";
                    echo "<td>" . $fila['codigo_postal'] . "</td>";
                    echo "<td>" . $fila['colonia'] . "</td>";
                    echo "<td>" . $fila['Calle'] . "</td>";
                    echo "<td>" . $fila['numero_casa'] . "</td>";
                    echo "<td>" . $fila['fecha_compra'] . "</td>";
                    echo "<td>";
                    echo "<a href='informacion_ventas.php?id=" . $fila['id'] . "'>Información</a> | ";
                    echo "<a href='elimina_venta.php?id=" . $fila['id'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\");'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No hay registros en el carrito.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Botón para regresar a la página principal de administración -->
    <a href="administrar.php" class="boton-regresar">Regresar a la Administración</a>

    <?php
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
    ?>
</body>
</html>

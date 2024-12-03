<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="administrar.css">
</head>
<body>
    <h1>Administración</h1>
    <div>
        <!-- Botón para administrar usuarios -->
        <form action="usuario.php" method="get">
            <button type="submit" class="admin-button">Administrar Usuarios</button>
        </form>

        <!-- Botón para administrar productos -->
        <form action="productos.php" method="get">
            <button type="submit" class="admin-button">Administrar Productos</button>
        </form>

        <!-- Botón para administrar ventas -->
        <form action="ventas.php" method="get">
            <button type="submit" class="admin-button">Administrar Ventas</button>
        </form>

        <!-- Botón para administrar proveedor -->
        <form action="proveedor.php" method="get">
            <button type="submit" class="admin-button">Administrar Proveedor</button>
        </form>
    </div>
</body>
</html>
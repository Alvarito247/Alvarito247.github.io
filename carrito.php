<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_completo = $_POST['nombre_completo'];
    $Numero_Telefono = $_POST['Numero_Telefono'];
    $codigo_postal = $_POST['codigo_postal'];
    $colonia = $_POST['colonia'];
    $Calle = $_POST['Calle'];
    $numero_casa = $_POST['numero_casa'];
    $fecha_compra = date("Y-m-d H:i:s");

    // Conectar a la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Proteger contra inyección SQL
    $nombre_completo = mysqli_real_escape_string($conexion, $nombre_completo);
    $Numero_Telefono = mysqli_real_escape_string($conexion, $Numero_Telefono);
    $codigo_postal = mysqli_real_escape_string($conexion, $codigo_postal);
    $colonia = mysqli_real_escape_string($conexion, $colonia);
    $Calle = mysqli_real_escape_string($conexion, $Calle);
    $numero_casa = mysqli_real_escape_string($conexion, $numero_casa);

    // Decodificar el JSON del carrito
    $cartData = json_decode($_POST['cart'], true);

    if ($cartData && is_array($cartData)) {
        foreach ($cartData as $item) {
            $libro = mysqli_real_escape_string($conexion, $item['title']);
            $precio = mysqli_real_escape_string($conexion, $item['price']);

            // Insertar cada libro en la base de datos
            $consulta = "INSERT INTO ventas (libro, precio, nombre_completo, Numero_Telefono, codigo_postal, colonia, Calle, numero_casa, fecha_compra) 
                         VALUES ('$libro', '$precio', '$nombre_completo', '$Numero_Telefono', '$codigo_postal', '$colonia', '$Calle', '$numero_casa', '$fecha_compra')";

            if (!mysqli_query($conexion, $consulta)) {
                echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
            }
        }

        echo "Compra registrada exitosamente.";
        header("Location: libreria.html");
        exit();
    } else {
        echo "Error en los datos del carrito.";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}

?>

<?php
$id = $_GET['id'];
$conexion = mysqli_connect("127.0.0.1", "root", "", "proyecto");
$usuarios = mysqli_query($conexion,"select * from usuarios where id=".$id);
if ($usuarios)
{
    while ($fila=mysqli_fetch_array($usuarios))
    {
        $usuario=$fila['usuario'];
        $password=$fila['password'];
    }
}
?>

<h1>Confirma la eliminacion</h1><br><br>
usuario: <?php echo ($usuario);?><br>
contraseña: <?php echo ($password);?><br>
<a href="elimina_usu1.php?id=<?php echo($id);?>"> <input type="button" value="Aceptar"></a>
<a href="usuario.php"> <input type="button" value="cancelar"></a>
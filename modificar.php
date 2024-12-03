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
<form action="modificar_1.php" method="post">
        <input type="hidden" name="id" value="<?php echo($id)?>">
   <input type="text" name="usuario" value = "<?php echo ($usuario);?>"><br>
   <input type="text" name="password" value = "<?php echo ($password);?>"><br>
    <input type="submit"  value="guardar">
    <a href="usuario.php"> <input type="button" value="cancelar"></a>
</form>
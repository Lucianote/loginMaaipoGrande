<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","portafolio");

$consulta="SELECT*FROM usuario where NombreUsuario='$usuario' and Clave='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['TipoUsuario']=='admin'){ //administrador
    header("location:home.php");

}else
if($filas['TipoUsuario']=='cliente'){ //cliente
header("location:home2.php");
}else
if($filas['TipoUsuario']=='transportista'){ //transportista
  header("location:home3.php");
}
else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

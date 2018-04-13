<?php
$cx=mysqli_connect("localhost","root","","tienda");
session_start();
if(isset($_GET['cerrar']) && $_GET['cerrar']=="ok"){
	session_destroy();
	header("Location: index.php");
}

if(!$_SESSION['usuario']){
header("Location: index.php");	
}

echo '<h1 align=center>Bienvenido usuario:'.$_SESSION["usuario"].'</h1>';
$sql="SELECT * FROM usuario WHERE user='".$_SESSION['usuario']."'";
$query=$cx->query($sql);
$row=$query->fetch_assoc();
echo $row['tipo']."<br>";
if($row['tipo']){
	echo "<a href='productos.php'>Productos</a>";

}
echo '<p align=center><a href="logout.php">Logout</a></p>';

?>

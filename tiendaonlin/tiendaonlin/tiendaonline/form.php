<?php 
$cx=mysqli_connect("localhost","root","","tienda");
	$u=$_POST['usuario'];
	$p=md5($_POST['password']);
	$n=$_POST['nombre'];
	$t=$_POST['tipo'];
	$sql="SELECT * FROM usuario WHERE user='".$u."' AND pass='".$p."'";
	$query=$cx->query($sql);
	$row=$query->num_rows;
	if($row==1){
		echo "Ya existe";
	}else{
		$sql="INSERT INTO usuario VALUES('$u','$p','$n','$t')";
		$query=$cx->query($sql);
		if($query){
			echo "Registro exitoso";
		}
	}
 ?>
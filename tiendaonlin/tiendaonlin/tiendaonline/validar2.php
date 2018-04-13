<?php 
	if(isset($_REQUEST['submit'])){
		if(empty($usuario)){
      		echo "<script>alert('Error: agrega el usuario'); </script>";
	    }else{
	    	if(!filter_var($usuario,FILTER_VALIDATE_EMAIL)){
	    		echo "<script>alert('Correo con sintaxis invalida'); </script>";
	    	}
	    }
	    if(empty($password)){
	    	echo "<script>alert('Error: agrega la contraseña'); </script>";

	    }
	}
	
 ?>
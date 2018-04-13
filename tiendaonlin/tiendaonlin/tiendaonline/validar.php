<?php 
	if(isset($_REQUEST['submit'])){
		if(empty($user)){
      		echo "<script>alert('Error: agrega el usuario'); </script>";
	    }else{
	    	if(!filter_var($user,FILTER_VALIDATE_EMAIL)){
	    		echo "<script>alert('Correo con sintaxis invalida'); </script>";
	    	}
	    }
	    if(empty($pass)){
	    	echo "<script>alert('Error: agrega la contraseña'); </script>";

	    }
	}
	
 ?>
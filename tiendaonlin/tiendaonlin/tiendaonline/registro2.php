 
 
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registro|MexicoTech</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <link rel="stylesheet" href="styleregis.css">
  <script src="jquery-3.3.1.js"></script>
  <script src="script.js"></script>
 
</head>
<body background="681840.jpg">
  <h1 class="register-title">Bienvenido</h1>
  <form class="register"  method="POST">
    
    <input type="text" class="register-input" placeholder="Correo electrónico" name="usuario" id="usuario">
    <input type="password" class="register-input" placeholder="Contraseña" id="password" name="password">
    <input type="text" class="register-input" placeholder="Nombre" id="nombre" name="nombre">
    <input type="hidden" name="nuevo" value="ok"><input type="hidden" name="status" value="nuevo">
    <input type="hidden" value="Cliente" id="tipo" name="tipo">
    <input type="submit" value="Registro" name="submit" class="register-button">
    
  </form>
</body>
</html>
<?php 
$cx=mysqli_connect("localhost","root","","tienda");
  session_start();
if(isset($_SESSION['usuario'])){  
    header("Location: index2.php");
}
if(isset($_REQUEST['submit'])){
  if($u=$_REQUEST['usuario']==""){
    echo "<script>alert('Usuario incompleto'); </script>";
    }else{
      if(!filter_var($u=$_REQUEST['usuario'],FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Correo con sintaxis invalida'); </script>";
      }else{
          if($_REQUEST['password']==""){
            echo "<script>alert('Error: agrega la contraseña'); </script>";
          }else{
              if(strlen($_REQUEST['password'])<8){
                   echo "<script>alert('Contraseña con 8 caracteres minimo'); </script>";
              }else{
                if(!preg_match('`[A-Z]`', $_REQUEST['password'])){
                   echo "<script>alert('La contraseña debe tener al menos una mayuscula'); </script>";
                }else{
                  if(!preg_match('`[0-9]`', $_REQUEST['password'])){
                    echo "<script>alert('La contraseña debe tener al menos un numero'); </script>";
                  }else{
                    if($_REQUEST['nombre']==""){
                    echo "<script>alert('Agregar nombre'); </script>";

                    }else{
                      if(isset($_REQUEST['nuevo']) && $_REQUEST['nuevo']=="ok"){
                      $email=$_REQUEST['usuario'];
                      $pass=md5($_REQUEST['password']);
                      $nom=$_REQUEST['nombre'];
                      $tipo=$_REQUEST['tipo'];
                      $query="SELECT * FROM usuario WHERE email='".$email."'";
                      $checasiesta=$cx->query($query);
                      $numfilas=$checasiesta->num_rows;
                      if($numfilas==0){
                        $insertar="INSERT INTO usuario VALUES(NULL,'$pass','$email','$nom','$tipo')";
                        
                        $ejecutar=$cx->query($insertar);
                        echo "<script type='text/javascript'>alert('El Registro ha sido exitoso');</script>";
                        header("Location:index2.php");
                      }else{
                        echo "<script type='text/javascript'>alert('No se encuentra disponible el email: ".$email." utiliza otro');</script>";
                      
                      }
                    }
                  }
                 }
              }
          }
          
        }
      }
    }
  }
   

?>



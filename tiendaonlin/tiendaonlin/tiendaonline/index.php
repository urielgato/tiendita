<?php 
$cx=mysqli_connect("localhost","root","","tienda");
session_start();
if(isset($_SESSION['usuario'])){  
    header("Location: index2.php");
}
if(isset($_REQUEST['submit'])){
  if($_REQUEST['user']==""){
    echo "<script>alert('Ingrese usuario'); </script>";
  }else{
    if($_REQUEST['pass']==""){
      echo "<script>alert('Ingrese contraseña'); </script>";
    }else{
      $email=$_REQUEST['user'];
      $pass=md5($_REQUEST['pass']);     
      $query="SELECT * FROM usuario WHERE user='".$email."' AND pass='".$pass."'";
      echo $query;
      $ver=$cx->query($query);
      $siesta=$ver->num_rows;
      if($siesta==1){
          $_SESSION['usuario']=$email;
          header("Location: index2.php");
      }else{
        echo "<script type='text/javascript'>alert('Usuario o contraseña incorrecta');</script>";
      }
    }
  }

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>INICIO</title>
</head>
<body>
    <header style="background: red;">
        <form action="index.php" method="REQUEST">
          <table style="margin-left: 800px;" border>
            <tr>
              <td>Usuario</td>
              <td>Contraseña</td>
            </tr>
            <tr>
              <td><input type="text" name="user" placeholder="Correo electronico: "></td>
              <td><input type="password" name="pass" placeholder="Contraseña: "></td>
              <td><input type="submit" value="Enviar" name="submit"></td>

            </tr>  
            <a href="registro2.php" style="margin-left: 800px;">¿Deseas registrarte?</a>

          </table>
          
          
          <?php 
            include("validar.php");
           ?>
        </form>
    </header>
</body>
</html>
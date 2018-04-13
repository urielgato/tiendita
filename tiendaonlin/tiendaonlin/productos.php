<?php 
	$cx=mysqli_connect("localhost","root","","tienda3");
	$productos="SELECT * FROM articulo order by idarticulo";
	$query=$cx->query($productos);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>PRODUCTOS</title>
 	<script src="jquery-3.3.1.js"></script>
 </head>
 <body>
 	<form name="data" id="insert">
    <input type="text" name="articulo[]" value="">
    <input type="text" name="piezas[]" value="">
    <input type="text" name="descripcion[]" value="">
    <input type="submit" id="btn_insert" value="Guardar">
</form>
 </body>
 </html>
 <script>
 $(document).ready(function(){
    $("#insert").submit( function () {    
        $.post('insertar.php',$(this).serialize(),function(data){
                   $("#resultado").html(data)
               }
        );
        return false;   
    });   
});
 </script>
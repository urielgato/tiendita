<?php 
session_start();
if(!isset($_SESSION['cuantos'])){
  $_SESSION['cuantos']=1;
}
	$cx=mysqli_connect("localhost","root","","tiendaonline");
	$productos="SELECT * FROM articulo order by idarticulo";
	$query=$cx->query($productos);
  $cuantos=1;
 ?>
<!DOCTYPE html>
 <html lang="es">
 <head>
  <meta charset="UTF-8">
  <title>PRODUCTOS</title>
  <script src="jquery-3.3.1.js"></script>
  <script src="js/jquery.min.js"></script>

 </head>
 <body>
  <a href="index2.php">Inicio</a>
  <header><div class="alert-alert-info"><h2>Insertar registros a la BD</h2></div></header>
  <section><table class="table"><tr class="info"><th>ID Articulo</th><th>Articulo</th><th>Piezas</th><th>Descripcion</th></tr>
  <?php 
    while($registro=$query->fetch_array(MYSQLI_BOTH)){
      echo '<tr>
        <td>'.$registro['idarticulo'].'</td>
        <td>'.$registro['articulo'].'</td>
        <td>'.$registro['piezas'].'</td>
        <td>'.$registro['descripcion'].'</td>
      </tr>';
    }
   ?>
  </table>
<script>
function loadTabla(valor){
  $.get("tabla.php","cuantos="+valor,function(data){
    $("#tabla").html(data);
  })
}

$("#add").click(function(e){
  
  alert("add")
  loadTabla(1);  
});

$("#del").click(function(e){
  alert("del")  
  loadTabla(-1);  
});
function agregar() {   
  //alert("add")
  loadTabla(1);
}
function quitar() {
  //alert("del")
  loadTabla(-1);
}
</script>
  <div id="tabla"></div>
  <button onclick="agregar()" name='adicional' type="button">Mas+</button>
      <button onclick="quitar()" name='menos' type="button">Menos-</button>
  <?php 
    if(isset($_POST['insertar'])){
      
      $its2=($_POST['articulo']);
      $its3=($_POST['piezas']);
      $its4=($_POST['descripcion']);
      while(true){
        
        $it2=current($its2);
        $it3=current($its3);
        $it4=current($its4);
        
        $articulo=(($it2 !==false)?$it2: ",&nbsp;");
        $piezas=(($it3 !==false)?$it3: ",&nbsp;");
        $descripcion=(($it4 !==false)?$it4: ",&nbsp;");
        $valores='("'.$articulo.'","'.$piezas.'","'.$descripcion.'"),';
        $valoresQ=substr($valores,0,-1);
        $i="INSERT INTO articulo VALUES (NULL,'$valoresQ')";
        echo $i;
        $sqlRes=$cx->query($i);
        $item2=next($its2);
        $item3=next($its3);
        $item4=next($its4);
        if( $item2===false && $item3===false && $item4===false) break;
      }
    }
   ?>
 </section>
 </body>
 </html>
 
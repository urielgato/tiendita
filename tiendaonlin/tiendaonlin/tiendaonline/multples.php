<!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<title>PRODUCTOS</title>
 	<script src="jquery-3.3.1.js"></script>
 	<script>
 		$(function(){
 			$("#adicional").on('click',function(){
 				$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
 			});
 			$(document).on("#click",".eliminar",function(){
 				var parent=$(this).parents().get(0);
 				$(parent).remove();
 			});
 		});
 	</script>
 </head>
 <body>
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
	<form method="post">
		<h3>Agregar nuevo alumno</h3>
		<table>
			<tr class="fila-fija">
				<td><input type="text" name="articulo[]" placeholder="Articulo" ></td>
				<td><input type="text" name="piezas[]" placeholder="Piezas"></td>
				<td><input type="text" name="descripcion[]" placeholder="Descripcion" ></td>
				<td class="eliminar"><input type="button" value="Menos-">
				</td>
			</tr>
		</table>
		<div>
			<input type="submit" value="Insertar alumno" name="insertar">
			<button id='adicional' name='adicional' type="button">Mas+</button>
		</div>
	</form>
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
				$valores='('.$articulo.'","'.$piezas.'","'.$descripcion.'"),';
				$valoresQ=substr($valores,0,-1);
				$i="INSERT INTO articulo VALUES (NULL,'$valoresQ')";
				$sqlRes=$cx->query($i) or die mysqli_error();
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
 
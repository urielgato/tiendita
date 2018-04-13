
<?php
session_start();
if(isset($_REQUEST['cuantos'])){ 
  $_SESSION['cuantos']+=$_REQUEST['cuantos']; 
  $x=0;?>
<form method="post">
    <h3>Agregar nuevo alumno</h3>
    <table>
      <?php while($x<$_SESSION['cuantos']){?>
      <tr class="fila-fija">
        <td><input type="text" name="articulo[]" placeholder="Articulo" ></td>
        <td><input type="text" name="piezas[]" placeholder="Piezas"></td>
        <td><input type="text" name="descripcion[]" placeholder="Descripcion" ></td>
        <td class="eliminar">
        </td>
      </tr>
      <?php 
      $x++;
      } 
    ?>
    </table>
    <div>
      <input type="submit" value="Insertar alumno" name="insertar">
      
      
    </div>
  </form>

  <?php }else{ ?>
  <form method="post">
    <h3>Agregar nuevo alumno</h3>
    <table>
      <tr class="fila-fija">
        <td><input type="text" name="articulo[]" placeholder="Articulo" ></td>
        <td><input type="text" name="piezas[]" placeholder="Piezas"></td>
        <td><input type="text" name="descripcion[]" placeholder="Descripcion" ></td>
        <td class="eliminar">
        </td>
      </tr>
    </table>
    <div>
      <input type="submit" value="Insertar alumno" name="insertar">
      
    </div>
  </form>
  <?php } ?>
<?php 
$id=$_POST['id'];

for($i=0;$i<count($id);$i++){
    $q="INSERT INTO tabla (nombre, telefono, apellido, direccion) VALUES ('".$_POST['nombre'][$i]."','".$_POST['telefono'][$i]."','".$_POST['apellido'][$i]."','".$_POST['direccion'][$i]."') "; 
    $result = $conexion->query($q);
}
if ($conexion->query($sql) === TRUE) {
   echo "Insertado exitosamente";
} else {
    echo "Hubo un error ". $conn->error;
}

$conn->close();
 ?>
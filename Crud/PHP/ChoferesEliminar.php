<?php
    require_once('Config.php');
    $conexion = new mysqli($servername, $username, $password, $dbname);
    
    $id=$_GET["IdChofer"];

    $sql = "UPDATE Chofer SET Estatus = 0 where IdChofer=". $id;

   // Ejecutar la consulta
   if (mysqli_query($conexion, $sql)) 
   {
    header("Location: ChoferesTablaPHP.php"); 
   } 
   else 
   {
       echo "Error al insertar datos: " . mysqli_error($conexion);
   }
   // Cerrar la conexión
   Mysqli_close($conexion)
?>
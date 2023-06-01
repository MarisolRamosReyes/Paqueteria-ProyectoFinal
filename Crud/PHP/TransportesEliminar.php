<?php
    require_once('Config.php');
    $conexion = new mysqli($servername, $username, $password, $dbname);
    
    $id=$_GET["IdTransporte"];

    $sql = "UPDATE Transporte SET Estatus = 0 where IdTransporte=". $id;

   // Ejecutar la consulta
   if (mysqli_query($conexion, $sql)) 
   {
    header("Location: TransportesTablaPHP.php"); 
   } 
   else 
   {
       echo "Error al insertar datos: " . mysqli_error($conexion);
   }
   // Cerrar la conexión
   Mysqli_close($conexion)
?>
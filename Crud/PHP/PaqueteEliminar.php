<?php
    require_once('Config.php');
    $conexion = new mysqli($servername, $username, $password, $dbname);
    
    $id=$_GET["IdPaquete"];

    $sql = "UPDATE paquete SET Estatus = 0 where IdPaquete=". $id;

   // Ejecutar la consulta
   if (mysqli_query($conexion, $sql)) 
   {
    header("Location: PaquetesTablaPHP.php"); 
   } 
   else 
   {
       echo "Error al insertar datos: " . mysqli_error($conexion);
   }
   // Cerrar la conexión
   Mysqli_close($conexion)
?>
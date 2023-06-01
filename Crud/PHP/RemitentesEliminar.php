<?php
    require_once('Config.php');
    $conexion = new mysqli($servername, $username, $password, $dbname);
    
    $id=$_GET["IdRemitente"];

    $sql = "UPDATE remitente SET Estatus = 0 where IdRemitente=". $id;

   // Ejecutar la consulta
   if (mysqli_query($conexion, $sql)) 
   {
    header("Location: RemitentesTablaPHP.php"); 
   } 
   else 
   {
       echo "Error al insertar datos: " . mysqli_error($conexion);
   }
   // Cerrar la conexión
   Mysqli_close($conexion)
?>
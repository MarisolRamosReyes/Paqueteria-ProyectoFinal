<?php
    require_once('Config.php');
    $conexion = new mysqli($servername, $username, $password, $dbname);
    
    $id=$_GET["IdDestinatario"];

    $sql = "UPDATE Destinatario SET Estatus = 0 where IdDestinatario=". $id;

   // Ejecutar la consulta
   if (mysqli_query($conexion, $sql)) 
   {
    header("Location: DestinatariosTablaPHP.php"); 
   } 
   else 
   {
       echo "Error al insertar datos: " . mysqli_error($conexion);
   }
   // Cerrar la conexión
   Mysqli_close($conexion)
?>
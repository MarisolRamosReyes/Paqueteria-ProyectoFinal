<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
    $conexion = new mysqli($servername, $username, $password, $dbname);
    $IdRuta = $_GET['IdRuta'];
    $Origen=$_GET["Origen"];
    $Destino=$_GET["Destino"];
    $Distancia=$_GET["Distancia"];
    $TiempoEntrega=$_GET["TiempoEntrega"];
    $CostoEnvio=$_GET["CostoEnvio"];

      
    $sql = "UPDATE ruta SET Origen='$Origen', Destino='$Destino', Distancia='$Distancia', TiempoEntrega='$TiempoEntrega', CostoEnvio='$CostoEnvio' WHERE IdRuta =" .$IdRuta;
   

    // Ejecutar la consulta
      if (mysqli_query($conexion, $sql)) 
      {
       header("Location: RutaTablaPHP.php"); 
      } 
      else 
      {
          echo "Error al insertar datos: " . mysqli_error($conexion);
      }
      // Cerrar la conexión
      Mysqli_close($conexion)
      ?>
   </body>
   </html>
</body>
</html>
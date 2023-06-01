<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
    $conexion = new mysqli($servername, $username, $password, $dbname);
    $IdTransporte = $_GET['IdTransporte'];
    $Modelo=$_GET["Modelo"];
    $Año=$_GET["Año"];
    $VelMax=$_GET["VelMax"];
    $TipoCombustible=$_GET["TipoCombustible"];

      
    $sql = "UPDATE transporte SET Modelo='$Modelo', Año='$Año', VelMax='$VelMax', TipoCombustible='$TipoCombustible' WHERE IdTransporte =" .$IdTransporte;
   

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
   </body>
   </html>
</body>
</html>
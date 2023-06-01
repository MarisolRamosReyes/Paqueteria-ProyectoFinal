<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
       $conexion = new mysqli($servername, $username, $password, $dbname);

       $Origen = $_POST['Origen'];
       $Destino = $_POST['Destino'];
       $Distancia = $_POST['Distancia'];
       $TiempoEntrega = $_POST['TiempoEntrega'];
       $CostoEnvio = $_POST['CostoEnvio'];

      // Preparar la consulta SQL
      $sql = "INSERT INTO ruta (Origen, Destino, Distancia, TiempoEntrega, CostoEnvio) VALUES ('".$Origen."','".$Destino."','".$Distancia."', '".$TiempoEntrega."', '".$CostoEnvio."')";
       
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
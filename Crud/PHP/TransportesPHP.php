<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
       $conexion = new mysqli($servername, $username, $password, $dbname);

       $Modelo = $_POST['Modelo'];
       $CapacidadCarga = $_POST['CapacidadCarga'];
       $Año = $_POST['Año'];
       $VelMax = $_POST['VelMax'];
       $TipoCombustible = $_POST['TipoCombustible'];

      // Preparar la consulta SQL
      $sql = "INSERT INTO transporte (Modelo, CapacidadCarga, Año, VelMax, TipoCombustible) VALUES ('".$Modelo."','".$CapacidadCarga."','".$Año."', '".$VelMax."', '".$TipoCombustible."')";
       
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
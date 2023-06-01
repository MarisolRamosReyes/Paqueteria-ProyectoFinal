<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
       $conexion = new mysqli($servername, $username, $password, $dbname);

       $IdUsuario= $_POST['IdUsuario'];
       $IdDestinatario = $_POST['IdDestinatario'];
       $IdRemitente = $_POST['IdRemitente'];
       $IdChofer = $_POST['IdChofer'];
       $NumPaquete= $_POST['NumPaquete'];
       $Peso= $_POST['Peso'];
       $DimLargo = $_POST['DimLargo'];
       $DimAncho = $_POST['DimAncho'];
       $DimAltura = $_POST['DimAltura'];
       $TipoRelleno = $_POST['TipoRelleno'];
       
       

      // Preparar la consulta SQL
      $sql = "INSERT INTO paquete (IdUsuario, IdDestinatario, IdRemitente, IdChofer, NumPaquete, Peso, DimLargo,DimAncho, DimAltura, TipoRelleno) VALUES ('".$IdUsuario."','".$IdDestinatario."','".$IdRemitente."', '".$IdChofer."', '".$NumPaquete."', '".$Peso."', '".$DimLargo."', '".$DimAncho."', '".$DimAltura."', '".$TipoRelleno."')";
       
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
  </body>
</html>
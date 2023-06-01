<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
    $conexion = new mysqli($servername, $username, $password, $dbname);
    $IdPaquete= $_GET['IdPaquete'];
    $IdUsuario= $_GET['IdUsuario'];
    $IdDestinatario = $_GET['IdDestinatario'];
    $IdRemitente = $_GET['IdRemitente'];
    $IdChofer = $_GET['IdChofer'];
    $NumPaquete= $_GET['NumPaquete'];
    $Peso= $_GET['Peso'];
    $DimLargo = $_GET['DimLargo'];
    $DimAncho = $_GET['DimAncho'];
    $DimAltura = $_GET['DimAltura'];
    $TipoRelleno = $_GET['TipoRelleno'];
      
    $sql = "UPDATE Paquete SET IdUsuario='$IdUsuario', IdDestinatario='$IdDestinatario', IdRemitente='$IdRemitente', IdChofer='$IdChofer', NumPaquete='$NumPaquete', Peso='$Peso', DimLargo='$DimLargo', DimAncho='$DimAncho', DimAltura='$DimAltura', TipoRelleno='$TipoRelleno' WHERE IdPaquete =" .$IdPaquete;
   

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
</body>
</html>
<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
    $conexion = new mysqli($servername, $username, $password, $dbname);
    $IdDestinatario = $_GET['IdDestinatario'];
    $Nombre = $_GET["Nombre"];
    $APaterno = $_GET["APaterno"];
    $AMaterno = $_GET["AMaterno"];
    $Calle = $_GET["Calle"];
    $Numero = $_GET["Numero"];
    $Colonia = $_GET["Colonia"];
    $Municipio = $_GET["Municipio"];
    $Estado = $_GET["Estado"];
      
    $sql = "UPDATE Destinatario SET Nombre='$Nombre', APaterno='$APaterno', AMaterno='$AMaterno', Calle='$Calle', Numero='$Numero', Colonia='$Colonia', Municipio='$Municipio', Estado='$Estado' WHERE IdDestinatario =" .$IdDestinatario;
   

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
   </body>
   </html>
</body>
</html>
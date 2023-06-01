<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">
<head>
<title>Choferes</title>
</head>
<body>
    <?php

       require_once('Config.php');
       $conexion = new mysqli($servername, $username, $password, $dbname);

       // Variables con los datos a insertar en la base de datos
       $Nombre = $_POST["Nombre"];
       $APaterno = $_POST["APaterno"];
       $AMaterno = $_POST["AMaterno"];
       $Celular = $_POST["Celular"];

       // Preparar la consulta SQL
       $sql = "INSERT INTO chofer (Nombre, APaterno, AMaterno, Celular) VALUES ('".$Nombre."','".$APaterno."','".$AMaterno."', '".$Celular."')";
       
       // Ejecutar la consulta
      if (mysqli_query($conexion, $sql)) 
      {
       header("Location: ChoferesTablaPHP.php"); 
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
<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">
<head>
<title>Destinatarios</title>
</head>
<body>
    <?php

       require_once('Config.php');
       $conexion = new mysqli($servername, $username, $password, $dbname);

       // Variables con los datos a insertar en la base de datos
       $Nombre = $_POST["Nombre"];
       $APaterno = $_POST["APaterno"];
       $AMaterno = $_POST["AMaterno"];
       $Calle = $_POST["Calle"];
       $Numero = $_POST["Numero"];
       $Colonia = $_POST["Colonia"];
       $Municipio = $_POST["Municipio"];
       $Estado = $_POST["Estado"];

       // Preparar la consulta SQL
       $sql = "INSERT INTO destinatario (Nombre, APaterno, AMaterno, Calle, Numero, Colonia, Municipio, Estado) VALUES ('".$Nombre."','".$APaterno."','".$AMaterno."', '".$Calle."', '".$Numero."', '".$Colonia."', '".$Municipio."', '".$Estado."')";
       
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
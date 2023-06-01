<!DOCTYPE html>
<html">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
    $conexion = new mysqli($servername, $username, $password, $dbname);
    $IdUsuario = $_GET['IdUsuario'];
    $Nombre=$_GET["Nombre"];
    $APaterno=$_GET["APaterno"];
    $AMaterno=$_GET["AMaterno"];
    $Correo=$_GET["Correo"];
    $Contraseña = password_hash($_GET["Contraseña"], PASSWORD_DEFAULT);

      
    $sql = "UPDATE usuario SET Nombre='$Nombre', APaterno='$APaterno', AMaterno='$AMaterno', Correo='$Correo', Contraseña='$Contraseña' WHERE IdUsuario =" .$IdUsuario;
   

    // Ejecutar la consulta
      if (mysqli_query($conexion, $sql)) 
      {
       header("Location: UsuariosTablaPHP.php"); 
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
<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
       $conexion = new mysqli($servername, $username, $password, $dbname);

       // Variables con los datos a insertar en la base de datos
       $Nombre = $_POST["Nombre"];
       $APaterno = $_POST["APaterno"];
       $AMaterno = $_POST["AMaterno"];
       $Correo = $_POST["Correo"];
       $Contraseña = password_hash($_POST["Contraseña"], PASSWORD_DEFAULT);

       // Preparar la consulta SQL
       $sql = "INSERT INTO usuario (Nombre, APaterno, AMaterno, Correo, Contraseña) VALUES ('".$Nombre."','".$APaterno."','".$AMaterno."', '".$Correo."', '".$Contraseña."')";
       
       // Ejecutar la consulta
       if (mysqli_query($conexion, $sql)) 
       {
        header("Location: ../html/Usuario-Login.html"); 
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
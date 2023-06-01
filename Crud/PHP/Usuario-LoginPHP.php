<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">
<head>
</head>
<body>
    <?php

       require_once('Config.php');
       $conexion = new mysqli($servername, $username, $password, $dbname);

       $Correo = $_POST['Correo'];
       $Contraseña = $_POST['Contraseña'];

       // Consultar la base de datos para validar el Correo y contraseña
       $sql = "SELECT Contraseña FROM usuario WHERE correo = '$Correo'";
       $result = $conexion->query($sql);
        if ($result ->num_rows == 1) {
            // Usuario y contraseña válidos
            header("Location: ../html/PaginaInicio.html"); 
            //echo "Inicio de sesión exitoso!";

        } else {
            // Usuario y/o contraseña incorrectos
            //header("Location: ../html/Usuario-Login.html");
        }

// Cerrar la conexión a la base de datos
$conexion->close();
?>

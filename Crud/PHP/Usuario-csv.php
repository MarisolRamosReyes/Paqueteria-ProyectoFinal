<?php
require('config.php');
$conexion = new mysqli($servername, $username, $password, $dbname);
require('vendor/autoload.php');
  
$consulta="SELECT * FROM usuario WHERE estatus = 1";
$datos = $conexion->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Usuario.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'APaterno', 'AMaterno','Correo','Contraseña'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['Nombre'],
        $rows['APaterno'],
        $rows['AMaterno'],
        $rows['Correo'],
        $rows['Contraseña'],
    ));
}

fclose($output);
exit;

?>
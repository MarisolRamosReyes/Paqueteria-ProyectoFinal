<?php
require('config.php');
$conexion = new mysqli($servername, $username, $password, $dbname);
require('vendor/autoload.php');
  
$consulta="SELECT * FROM Transporte WHERE estatus = 1";
$datos = $conexion->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Transporte.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Modelo', 'Capacidad de Carga', 'Año','Velocidad Maxima','Tipo de Combustible'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['Modelo'],
        $rows['CapacidadCarga'],
        $rows['Año'],
        $rows['VelMax'],
        $rows['TipoCombustible'],
    ));
}

fclose($output);
exit;

?>
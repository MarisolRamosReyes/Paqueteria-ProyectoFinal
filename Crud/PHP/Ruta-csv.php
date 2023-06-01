<?php
require('config.php');
$conexion = new mysqli($servername, $username, $password, $dbname);
require('vendor/autoload.php');
  
$consulta="SELECT * FROM ruta WHERE estatus = 1";
$datos = $conexion->query($consulta);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="ruta.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Origen', 'Destino', 'Distania','TiempoEntrega','CostoEnvio'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['Origen'],
        $rows['Destino'],
        $rows['Distancia'],
        $rows['TiempoEntrega'],
        $rows['CostoEnvio'],
    ), ';'); // Usa ';' como delimitador para evitar conflictos con caracteres especiales
}

fclose($output);
exit;
?>
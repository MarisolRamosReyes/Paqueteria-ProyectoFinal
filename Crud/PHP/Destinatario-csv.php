<?php
require('config.php');
$conexion = new mysqli($servername, $username, $password, $dbname);
require('vendor/autoload.php');
  
$consulta="SELECT * FROM Destinatario WHERE estatus = 1";
$datos = $conexion->query($consulta);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="Destinatarios.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'APaterno', 'AMaterno','Calle','Numero','Colonia','Municipio','Estado'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['Nombre'],
        $rows['APaterno'],
        $rows['AMaterno'],
        $rows['Calle'],
        $rows['Numero'],
        $rows['Colonia'],
        $rows['Municipio'],
        $rows['Estado'],
    ), ';'); // Usa ';' como delimitador para evitar conflictos con caracteres especiales
}

fclose($output);
exit;
?>
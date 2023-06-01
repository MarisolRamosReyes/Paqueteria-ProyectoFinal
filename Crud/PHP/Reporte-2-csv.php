<?php
require('cn.php');
require('vendor/autoload.php');

$consulta="SELECT * FROM vista_ultimos_modelos";
$datos = $conexion->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="vista_ultimos_modelos.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Modelo', 'Año'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['Modelo'],
        $rows['Año'],
    ));
}

fclose($output);
exit;

    ?>
<?php
require('cn.php');
require('vendor/autoload.php');

$consulta="SELECT * FROM vista_rutas_envio_hora";
$datos = $conexion->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="vista_rutas_envio_hora.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Origen', 'Destino', 'Distancia', 'TiempoEntrega'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['Origen'],
        $rows['Destino'],
        $rows['Distancia'],
        $rows['TiempoEntrega'],
    ));
}

fclose($output);
exit;

    ?>
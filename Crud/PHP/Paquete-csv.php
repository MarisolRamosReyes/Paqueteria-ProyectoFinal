<?php
require('config.php');
$conexion = new mysqli($servername, $username, $password, $dbname);
require('vendor/autoload.php');
  
$consulta="SELECT
p.IdPaquete,
u.Nombre AS Usuario,
d.Nombre AS Destinatario,
r.Nombre As Remitente,
c.Nombre As Chofer,
p.NumPaquete,
p.Peso,
p.DimLargo,
p.DimAncho,
p.DimAltura,
p.TipoRelleno
FROM
paquete p
JOIN usuario u ON
p.IdUsuario = u.IdUsuario
JOIN destinatario d ON
p.IdDestinatario = d.IdDestinatario
JOIN remitente r ON
p.IdRemitente = r.IdRemitente
JOIN chofer c ON
p.IdChofer = c.IdChofer
WHERE
p.Estatus = 1";
$datos = $conexion->query($consulta);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="Paquetes.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Usuario', 'Destinatario', 'Remitente','Chofer','NumPaquete','Peso','DimLargo','DimAncho','DimAltura','TipoRelleno'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['Usuario'],
        $rows['Destinatario'],
        $rows['Remitente'],
        $rows['Chofer'],
        $rows['NumPaquete'],
        $rows['Peso'],
        $rows['DimLargo'],
        $rows['DimAncho'],
        $rows['DimAltura'],
        $rows['TipoRelleno'],
    ), ';'); // Usa ';' como delimitador para evitar conflictos con caracteres especiales
}

fclose($output);
exit;
?>
<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$consulta = "SELECT
    p.IdPaquete,
    u.Nombre AS Usuario,
    d.Nombre AS Destinatario,
    r.Nombre AS Remitente,
    c.Nombre AS Chofer,
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

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Paquete");

$hojaActiva->setCellValue('A1', 'Usuario');
$hojaActiva->setCellValue('B1', 'Destinatario');
$hojaActiva->setCellValue('C1', 'Remitente');
$hojaActiva->setCellValue('D1', 'Chofer');
$hojaActiva->setCellValue('E1', 'NumPaquete');
$hojaActiva->setCellValue('F1', 'Peso');
$hojaActiva->setCellValue('G1', 'DimLargo');
$hojaActiva->setCellValue('H1', 'DimAncho');
$hojaActiva->setCellValue('I1', 'DimAltura');
$hojaActiva->setCellValue('J1', 'TipoRelleno');
$Fila = 2;

while ($row = $datos->fetch_assoc()) {
    $hojaActiva->setCellValue('A' . $Fila, $row['Usuario']);
    $hojaActiva->setCellValue('B' . $Fila, $row['Destinatario']);
    $hojaActiva->setCellValue('C' . $Fila, $row['Remitente']);
    $hojaActiva->setCellValue('D' . $Fila, $row['Chofer']);
    $hojaActiva->setCellValue('E' . $Fila, $row['NumPaquete']);
    $hojaActiva->setCellValue('F' . $Fila, $row['Peso']);
    $hojaActiva->setCellValue('G' . $Fila, $row['DimLargo']);
    $hojaActiva->setCellValue('H' . $Fila, $row['DimAncho']);
    $hojaActiva->setCellValue('I' . $Fila, $row['DimAltura']);
    $hojaActiva->setCellValue('J' . $Fila, $row['TipoRelleno']);
    $Fila++;
}

$writer = new Xlsx($excel);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Paquete.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
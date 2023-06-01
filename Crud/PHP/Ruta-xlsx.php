<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$consulta = "SELECT * FROM Ruta WHERE estatus = 1";
$datos = $conexion->query($consulta);

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Ruta");

$hojaActiva->setCellValue('A1', 'Origen');
$hojaActiva->setCellValue('B1', 'Destino');
$hojaActiva->setCellValue('C1', 'Distancia');
$hojaActiva->setCellValue('D1', 'Tiempo de Entrega');
$hojaActiva->setCellValue('E1', 'Costo de Envio');
$Fila = 2;

while ($row = $datos->fetch_assoc()) {
    $hojaActiva->setCellValue('A' . $Fila, $row['Origen']);
    $hojaActiva->setCellValue('B' . $Fila, $row['Destino']);
    $hojaActiva->setCellValue('C' . $Fila, $row['Distancia']);
    $hojaActiva->setCellValue('D' . $Fila, $row['TiempoEntrega']);
    $hojaActiva->setCellValue('E' . $Fila, $row['CostoEnvio']);
    $Fila++;
}

$writer = new Xlsx($excel);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Ruta.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
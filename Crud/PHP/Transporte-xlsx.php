<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$consulta = "SELECT * FROM Transporte WHERE estatus = 1";
$datos = $conexion->query($consulta);

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Transporte");

$hojaActiva->setCellValue('A1', 'Modelo');
$hojaActiva->setCellValue('B1', 'Capacidad de Carga');
$hojaActiva->setCellValue('C1', 'Año');
$hojaActiva->setCellValue('D1', 'Velocidad Maxima');
$hojaActiva->setCellValue('E1', 'Tipo de Combustible');
$Fila = 2;

while ($row = $datos->fetch_assoc()) {
    $hojaActiva->setCellValue('A' . $Fila, $row['Modelo']);
    $hojaActiva->setCellValue('B' . $Fila, $row['CapacidadCarga']);
    $hojaActiva->setCellValue('C' . $Fila, $row['Año']);
    $hojaActiva->setCellValue('D' . $Fila, $row['VelMax']);
    $hojaActiva->setCellValue('E' . $Fila, $row['TipoCombustible']);
    $Fila++;
}

$writer = new Xlsx($excel);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Transporte.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$consulta = "SELECT * FROM Destinatario WHERE estatus = 1";
$datos = $conexion->query($consulta);

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Destinatario");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'APatrno');
$hojaActiva->setCellValue('C1', 'AMaterno');
$hojaActiva->setCellValue('D1', 'Calle');
$hojaActiva->setCellValue('E1', 'Numero');
$hojaActiva->setCellValue('F1', 'Colonia');
$hojaActiva->setCellValue('G1', 'Municipio');
$hojaActiva->setCellValue('H1', 'Estado');
$Fila = 2;

while ($row = $datos->fetch_assoc()) {
    $hojaActiva->setCellValue('A' . $Fila, $row['Nombre']);
    $hojaActiva->setCellValue('B' . $Fila, $row['APaterno']);
    $hojaActiva->setCellValue('C' . $Fila, $row['AMaterno']);
    $hojaActiva->setCellValue('D' . $Fila, $row['Calle']);
    $hojaActiva->setCellValue('E' . $Fila, $row['Numero']);
    $hojaActiva->setCellValue('F' . $Fila, $row['Colonia']);
    $hojaActiva->setCellValue('G' . $Fila, $row['Municipio']);
    $hojaActiva->setCellValue('H' . $Fila, $row['Estado']);
    $Fila++;
}

$writer = new Xlsx($excel);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Destinatario.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
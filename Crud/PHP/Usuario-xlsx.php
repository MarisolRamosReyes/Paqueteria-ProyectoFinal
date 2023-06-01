<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$consulta = "SELECT * FROM Usuario WHERE estatus = 1";
$datos = $conexion->query($consulta);

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Usuario");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'Apellido Paterno');
$hojaActiva->setCellValue('C1', 'Apellido Materno');
$hojaActiva->setCellValue('D1', 'Correo');
$hojaActiva->setCellValue('E1', 'Contraseña');
$Fila = 2;

while ($row = $datos->fetch_assoc()) {
    $hojaActiva->setCellValue('A' . $Fila, $row['Nombre']);
    $hojaActiva->setCellValue('B' . $Fila, $row['APaterno']);
    $hojaActiva->setCellValue('C' . $Fila, $row['AMaterno']);
    $hojaActiva->setCellValue('D' . $Fila, $row['Correo']);
    $hojaActiva->setCellValue('E' . $Fila, $row['Contraseña']);
    $Fila++;
}

$writer = new Xlsx($excel);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Usuario.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
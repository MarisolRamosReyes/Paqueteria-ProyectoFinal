<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 9.5);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70, 10, ' ', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
        
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30, 10, 'Origen', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Destino', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Distancia', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Tiempo de entrega', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Costo de envío', 1, 1, 'C', 0);
    }
    
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

require("cn.php");
$consulta = "SELECT * FROM ruta WHERE estatus = 1";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 8);

$columnWidth = 30;
$rowHeight = 10;

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell($columnWidth, $rowHeight, utf8_decode($row['Origen']), 1, 0, 'C', 0);
    $pdf->Cell($columnWidth, $rowHeight, utf8_decode($row['Destino']), 1, 0, 'C', 0);
    $pdf->Cell($columnWidth, $rowHeight, utf8_decode($row['Distancia']), 1, 0, 'C', 0);
    $pdf->Cell($columnWidth, $rowHeight, utf8_decode($row['TiempoEntrega']), 1, 0, 'C', 0);
    $pdf->Cell($columnWidth, $rowHeight, utf8_decode($row['CostoEnvio']), 1, 1, 'C', 0);
}

$pdf->Output('Ruta.pdf', 'I');
?>
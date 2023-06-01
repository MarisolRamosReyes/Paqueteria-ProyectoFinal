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
        $this->Cell(30, 10, 'Modelo', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Capacidad de carga', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Año', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Velocidad Maxima', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Tipo de combustible', 1, 1, 'C', 0);
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
$consulta = "SELECT * FROM Transporte WHERE estatus = 1";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 8);

$columnWidth = 30;
$rowHeight = 10;

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell($columnWidth, $rowHeight, $row['Modelo'], 1, 0, 'C', 0);
    $pdf->Cell($columnWidth, $rowHeight, $row['CapacidadCarga'], 1, 0, 'C', 0);
    $pdf->Cell($columnWidth, $rowHeight, $row['Año'], 1, 0, 'C', 0);
    $pdf->Cell($columnWidth, $rowHeight, $row['VelMax'], 1, 0, 'C', 0);
    $pdf->Cell($columnWidth, $rowHeight, $row['TipoCombustible'], 1, 1, 'C', 0);
}

$pdf->Output('Transporte.pdf', 'I');
?>
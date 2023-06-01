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
        $this->Cell(30, 10, 'Usuario', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Destinatario', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Remitente', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Chofer', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'NumeroPaquete', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Peso', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'DimensionLargo', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'DimensionAncho', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'DimensionAlto', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Tipo de Relleno', 1, 1, 'C', 0);
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
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'Letter'); // Establecer la orientación vertical y el tamaño de página 'Letter'

$columnWidth = 30;
$rowHeight = 10;

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetFont('Arial', '', 8);
    
    // Concatenar los datos en una sola cadena
    $data = utf8_decode($row['Usuario']) . "\n" .
        utf8_decode($row['Destinatario']) . "\n" .
        utf8_decode($row['Remitente']) . "\n" .
        utf8_decode($row['Chofer']) . "\n" .
        utf8_decode($row['NumPaquete']) . "\n" .
        utf8_decode($row['Peso']) . "\n" .
        utf8_decode($row['DimLargo']) . "\n" .
        utf8_decode($row['DimAncho']) . "\n" .
        utf8_decode($row['DimAltura']) . "\n" .
        utf8_decode($row['TipoRelleno']);
    
    // Dividir la cadena en líneas y agregarlas al PDF
    $lines = explode("\n", $data);
    foreach ($lines as $line) {
        $pdf->Cell($columnWidth, $rowHeight, $line, 1, 0, 'C', 0);
        $pdf->Ln(); // Agrega un salto de línea después de cada línea
    }
}

$pdf->Output('Paquetes.pdf', 'I');
?>
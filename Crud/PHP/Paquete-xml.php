<?php
require('cn.php');

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
$resultado = $conexion->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Paquete.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('IdPaquete', $row['IdPaquete']);
    $xml->writeElement('Usuario', $row['Usuario']);
    $xml->writeElement('Destinatario', $row['Destinatario']);
    $xml->writeElement('Remitente', $row['Remitente']);
    $xml->writeElement('Chofer', $row['Chofer']);
    $xml->writeElement('NumPaquete', $row['NumPaquete']);
    $xml->writeElement('Peso', $row['Peso']);
    $xml->writeElement('DimLargo', $row['DimLargo']);
    $xml->writeElement('DimAncho', $row['DimAncho']);
    $xml->writeElement('DimAltura', $row['DimAltura']);
    $xml->writeElement('TipoRelleno', $row['TipoRelleno']);

    $xml->endElement(); // Fin del elemento registro
}
// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();

// Cerrar la conexión a la base de datos
$conexion->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Paquete.xml"');
readfile('Paquete.xml');
?>
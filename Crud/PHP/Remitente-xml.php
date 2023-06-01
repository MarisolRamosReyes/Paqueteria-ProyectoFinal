<?php
require('cn.php');

$consulta="SELECT * FROM Remitente WHERE estatus = 1";

$resultado = $conexion->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Remitente.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('IdRemitente', $row['IdRemitente']);
    $xml->writeElement('Nombre', $row['Nombre']);
    $xml->writeElement('APaterno', $row['APaterno']);
    $xml->writeElement('AMaterno', $row['AMaterno']);
    $xml->writeElement('Calle', $row['Calle']);
    $xml->writeElement('Numero', $row['Numero']);

    $xml->endElement(); // Fin del elemento registro
}
// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();

// Cerrar la conexión a la base de datos
$conexion->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Remitente.xml"');
readfile('Remitente.xml');
?>
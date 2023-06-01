<?php
require('cn.php');

$consulta="SELECT * FROM Chofer WHERE estatus = 1";

$resultado = $conexion->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Chofer.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('IdChofer', $row['IdChofer']);
    $xml->writeElement('Nombre', $row['Nombre']);
    $xml->writeElement('ApellidoPaterno', $row['APaterno']);
    $xml->writeElement('ApellidoMaterno', $row['AMaterno']);
    $xml->writeElement('Celular', $row['Celular']);

    $xml->endElement(); // Fin del elemento registro
}
// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();

// Cerrar la conexión a la base de datos
$conexion->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Chofer.xml"');
readfile('Chofer.xml');
?>
<?php
require('cn.php');

$consulta="SELECT * FROM Transporte WHERE estatus = 1";

$resultado = $conexion->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Transporte.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('IdTransporte', $row['IdTransporte']);
    $xml->writeElement('Modelo', $row['Modelo']);
    $xml->writeElement('Capacidad_de_Carga', $row['CapacidadCarga']);
    $xml->writeElement('Año', $row['Año']);
    $xml->writeElement('Velocidad_Maxima', $row['VelMax']);
    $xml->writeElement('Tipo_de_Combustible', $row['TipoCombustible']);

    $xml->endElement(); // Fin del elemento registro
}
// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();

// Cerrar la conexión a la base de datos
$conexion->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Transporte.xml"');
readfile('Transporte.xml');
?>
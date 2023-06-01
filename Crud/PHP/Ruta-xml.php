<?php
require('cn.php');

$consulta="SELECT * FROM Ruta WHERE estatus = 1";

$resultado = $conexion->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Ruta.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('IdRuta', $row['IdRuta']);
    $xml->writeElement('Origen', $row['Origen']);
    $xml->writeElement('Destino', $row['Destino']);
    $xml->writeElement('Distancia', $row['Distancia']);
    $xml->writeElement('Costo_de_Envio', $row['CostoEnvio']);
    $xml->writeElement('Tiempo_de_entrega', $row['TiempoEntrega']);

    $xml->endElement(); // Fin del elemento registro
}
// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();

// Cerrar la conexión a la base de datos
$conexion->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Ruta.xml"');
readfile('Ruta.xml');
?>
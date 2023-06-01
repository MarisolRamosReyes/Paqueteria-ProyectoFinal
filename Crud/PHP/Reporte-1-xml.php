<?php
require('cn.php');

// Consulta SQL con JOIN
$consulta="SELECT * FROM `vista_rutas_envio`";

$resultado = $conexion->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('vista_rutas_envio.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('Origen', $row['Origen']);
    $xml->writeElement('Destino', $row['Destino']);
    $xml->writeElement('Distancia', $row['Distancia']);
    $xml->writeElement('TiempoEntrega', $row['TiempoEntrega']);

    $xml->endElement(); // Fin del elemento registro
}

// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();

// Cerrar la conexión a la base de datos
$conexion->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="vista_rutas_envio.xml"');
readfile('vista_rutas_envio.xml');
?>
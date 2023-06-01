<?php
require('Config.php');
$conexion = new mysqli($servername, $username, $password, $dbname);

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

// Obtener los datos de la consulta como un array
$cliente = array();
while ($row = $resultado->fetch_assoc()) {
    $cliente[] = $row;
}

// Generar el archivo JSON
$jsonData = json_encode($cliente, JSON_PRETTY_PRINT);

// Establecer los encabezados de la respuesta HTTP
header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="Remitente.json"');

// Imprimir el contenido JSON
echo $jsonData;

// Cerrar la conexión a la base de datos
$conexion->close();
?>
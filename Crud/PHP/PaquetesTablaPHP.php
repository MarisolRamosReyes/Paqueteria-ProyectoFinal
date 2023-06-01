<!DOCTYPE html>
<html>
<head>
<title>Paquete</title>
<link rel="stylesheet" href="../CSS/BarraSuperior.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<?php
require_once('config.php');
// Create conexionection
$conexion = new mysqli($servername, $username, $password,$dbname);
echo'
<div class="barra-superior">
<center><h2>Paquete</h2></center>
    
  </div><br>
';
echo '<form method="GET" action="../PHP/PaquetesAdd.php">';
echo '<center><button type="submit" class="btn btn-success btn-block mb-4">Agregar</button></center>
</form>
<center><a href="Paquete-pdf.php"><button type="submit" class="btn btn-danger btn-block mb-4">pdf</button></a>
<a href="Paquete-xlsx.php"><button type="submit" class="btn btn-primary btn-block mb-4">xlsx</button></a>
<a href="Paquete-csv.php"><button type="submit" class="btn btn-dark btn-block mb-4">csv</button></a>
<a href="Paquete-xml.php"><button type="submit" class="btn btn-info btn-block mb-4">xml</button></a>
<a a href="Paquete-json.php"><button type="submit" class="btn btn-warning btn-block mb-4">json</button></a></center>';

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
$datos = $conexion->query($consulta);
echo '<center><table style="width: 75%;" class="table"></center>';
echo "<tr>";
echo "<th><p>Usuario</th></p>";
echo "<th><p>Destinatario</th></p>";
echo "<th><p>Remitente</th></p>";
echo "<th><p>Chofer</th></p>";
echo "<th><p>Número Paquete</th></p>";
echo "<th><p>Peso</th></p>";
echo "<th><p>Dimención Largo</th></p>";
echo "<th><p>Dimención Ancho</th></p>";
echo "<th><p>Dimención Altura</th></p>";
echo "<th><p>Tipo de Relleno</th></p>";
while ($registro = $datos->fetch_assoc()){
echo '
            <tr>
                <td>'.$registro["Usuario"].'</td>
                <td>'.$registro["Destinatario"].'</td>
                <td>'.$registro["Remitente"].'</td>
                <td>'.$registro["Chofer"].'</td>
                <td>'.$registro["NumPaquete"].'</td>
                <td>'.$registro["Peso"].'</td>
                <td>'.$registro["DimLargo"].'</td>
                <td>'.$registro["DimAncho"].'</td>
                <td>'.$registro["DimAltura"].'</td>
                <td>'.$registro["TipoRelleno"].'</td>';

                $IdPaquete = $registro["IdPaquete"];

                echo '<td><a href="../PHP/PaquetesModificar.php?IdPaquete='.$IdPaquete.'"><i class="bi bi-pencil-square"></i></a></td>';
                echo '<td><a href="../PHP/PaqueteEliminar.php?IdPaquete='.$IdPaquete.'"><i class="bi bi-trash-fill"></i></a></td>';

               echo "</tr>";
}
echo"</table>";
$conexion->close();
?>
</body>
</html>
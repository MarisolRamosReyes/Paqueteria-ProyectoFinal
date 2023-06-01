<!DOCTYPE html>
<html>
<head>
<title>Transportes</title>
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
<center><h2>Transportes</h2></center>
    
  </div><br>
';
echo '<form method="GET" action="../html/Transportes.html">';
echo '<center><button type="submit" class="btn btn-success btn-block mb-4">Agregar</button></center>
</form>
<center><a href="Transporte-pdf.php"><button type="submit" class="btn btn-danger btn-block mb-4">pdf</button></a>
<a href="Transporte-xlsx.php"><button type="submit" class="btn btn-primary btn-block mb-4">xlsx</button></a>
<a href="Transporte-csv.php"><button type="submit" class="btn btn-dark btn-block mb-4">csv</button></a>
<a href="Transporte-xml.php"><button type="submit" class="btn btn-info btn-block mb-4">xml</button></a>
<a href="Transporte-json.php"><button type="submit" class="btn btn-warning btn-block mb-4">json</button></a></center>';

$consulta="select * from transporte where estatus = 1";
$datos = $conexion->query($consulta);
echo '<center><table style="width: 75%;" class="table"></center>';
echo "<tr>";
echo "<th><p>Modelo</th></p>";
echo "<th><p>CapacidadCarga</th></p>";
echo "<th><p>Año</th></p>";
echo "<th><p>VelMax</th></p>";
echo "<th><p>TipoCombustible</th></p>";
while ($registro = $datos->fetch_assoc()){
echo '
            <tr>
                <td>'.$registro["Modelo"].'</td>
                <td>'.$registro["CapacidadCarga"].'</td>
                <td>'.$registro["Año"].'</td>
                <td>'.$registro["VelMax"].'</td>
                <td>'.$registro["TipoCombustible"].'</td>';
              $IdTransporte = $registro["IdTransporte"]; // ID del registro a recuperar;
              echo '<td><a href="../PHP/TransportesModificar.php?IdTransporte='.$IdTransporte.'"><i class="bi bi-pencil-square"></i></a></td>';
                echo '<td><a href="../PHP/TransportesEliminar.php?IdTransporte='.$IdTransporte.'"><i class="bi bi-trash-fill"></i></a></td>';

 echo "</tr>";
}
echo"</table>";
$conexion->close();
?>
</body>
</html>
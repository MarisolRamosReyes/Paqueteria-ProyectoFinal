<!DOCTYPE html>
<html>
<head>
<title>Remitentes</title>
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
<center><h2>Remitentes</h2></center>
    
  </div><br>
';
echo '<form method="GET" action="../html/Remitentes.html">';
echo '<center><button type="submit" class="btn btn-success btn-block mb-4">Agregar</button></center>
</form>
<center><a href="Remitentes-pdf.php"><button type="submit" class="btn btn-danger btn-block mb-4">pdf</button></a>
<a href="Remitentes-xlsx.php"><button type="submit" class="btn btn-primary btn-block mb-4">xlsx</button></a>
<a href="Remitente-csv.php"><button type="submit" class="btn btn-dark btn-block mb-4">csv</button></a>
<a href="Remitente-xml.php"><button type="submit" class="btn btn-info btn-block mb-4">xml</button></a>
<a href="Remitente-json.php"><button type="submit" class="btn btn-warning btn-block mb-4">json</button></a></center>';

$consulta="SELECT * FROM remitente WHERE estatus = 1";
$datos = $conexion->query($consulta);
echo '<center><table style="width: 75%;" class="table"></center>';
echo "<tr>";
echo "<th><p>Nombre</th></p>";
echo "<th><p>APaterno</th></p>";
echo "<th><p>AMaterno</th></p>";
echo "<th><p>Calle</th></p>";
echo "<th><p>Número</th></p>";
echo "<th><p>Colonia</th></p>";
echo "<th><p>Municipio</th></p>";
echo "<th><p>Estado</th></p>";
while ($registro = $datos->fetch_assoc()){
echo '
            <tr>
                <td>'.$registro["Nombre"].'</td>
                <td>'.$registro["APaterno"].'</td>
                <td>'.$registro["AMaterno"].'</td>
                <td>'.$registro["Calle"].'</td>
                <td>'.$registro["Numero"].'</td>
                <td>'.$registro["Colonia"].'</td>
                <td>'.$registro["Municipio"].'</td>
                <td>'.$registro["Estado"].'</td>';
                $IdRemitente = $registro["IdRemitente"]; // ID del registro a recuperar;

    echo '<td><a href="../PHP/RemitentesModificar.php?IdRemitente='.$IdRemitente.'"><i class="bi bi-pencil-square"></i></a></td>';
    echo '<td><a href="../PHP/RemitentesEliminar.php?IdRemitente='.$IdRemitente.'"><i class="bi bi-trash-fill"></i></a></td>';

 echo "</tr>";
}
echo"</table>";
$conexion->close();
?>
</body>
</html>
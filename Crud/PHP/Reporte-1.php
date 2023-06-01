
<!DOCTYPE html>
<html>
<head>
<title>Envio-Junio</title>
<link rel="stylesheet" href="../CSS/BarraSuperior.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<?php
// Conexión a la base de datos
require_once('config.php');
$conexion = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if (mysqli_connect_errno()) {
echo "Falló la conexión a la base de datos: " . mysqli_connect_error();
exit();
}

// Consultar los datos de la vista
$consulta = "SELECT * FROM vista_rutas_envio";
$resultado = mysqli_query($conexion, $consulta);

// Cerrar la conexión
mysqli_close($conexion);
?>

<div class="barra-superior">
<center><h2>Reporte del mes de Junio</h2></center>
  </div><br>
  <center>
    <a href="Reporte-1-pdf.php"><button type="submit" class="btn btn-danger btn-block mb-4">pdf</button></a>
    <a href="Reporte-1-xlsx.php"><button type="submit" class="btn btn-primary btn-block mb-4">xlsx</button></a>
    <a href="Reporte-1-csv.php"><button type="submit" class="btn btn-dark btn-block mb-4">csv</button></a>
    <a href="Reporte-1-xml.php"><button type="submit" class="btn btn-info btn-block mb-4">xml</button></a>
    <a href="Reporte-1-json.php"><button type="submit" class="btn btn-warning btn-block mb-4">json</button></a>
  </center>
  <center>
    <table style="width: 50%;" class="table">
      <thead>
        <tr>
          <th>Origen</th>
          <th>Destino</th>
          <th>Distancia</th>
          <th>Tiempo de Entrega</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $row['Origen']; ?></td>
            <td><?php echo $row['Destino']; ?></td>
            <td><?php echo $row['Distancia']; ?></td>
            <td><?php echo $row['TiempoEntrega']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </center>
</body>
</html>
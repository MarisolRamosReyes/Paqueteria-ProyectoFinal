<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">

    <head>
        <title>Destinatario</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>

    <body>
        <form action="../PHP/PaquetesAddPHP.php" method="post">
            <!-- Section: Design Block -->
            <section
                class="">
                <!-- Jumbotron -->
                <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
                    <div class="container">
                        <div class="row gx-lg-5 align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <center>
                                    <h1 class="my-5 display-3 fw-bold ls-tight">
                                        Paque
                                        <span class="text-warning">tería</span>
                                    </h1>
                                    <img src="../img/reverse-logistic.png" alt="Paqueteria" width="420" height="350"></center>
                                <p style="color: hsl(217, 10%, 50.8%)"></p>
                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="card">
                                    <div class="card-body py-5 px-md-5">
                                        <center>
                                            <h3>
                                                <span class="text-warning">Crear Paquete</span>
                                            </h3>
                                        </center>

                                        <div class="form-outline">
                                            <select class="form-control" name="IdUsuario" id="IdUsuario">
                                                <?php
                                                include('Config.php');
                                                $conexion = new mysqli($servername, $username, $password, $dbname);
                                                $sql = "SELECT * FROM usuario WHERE estatus = 1";
                                                $result= mysqli_query($conexion,$sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '
                                                    <option value="'.$row['IdUsuario'].'">'.$row['Nombre'].'</option>
                                                    ';
                                                }
                                                ?>
                                            </select>
                                            <label class="form-label" for="NumPaquete">Usuario</label>
                                        </div>
                                        
                                        <div class="form-outline">
                                            <select class="form-control" name="IdDestinatario" id="IdDestinatario">
                                                <?php
                                                include('Config.php');
                                                $conexion = new mysqli($servername, $username, $password, $dbname);
                                                $sql = "SELECT * FROM Destinatario WHERE estatus = 1";
                                                $result= mysqli_query($conexion,$sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '
                                                    <option value="'.$row['IdDestinatario'].'">'.$row['Nombre'].'</option>
                                                    ';
                                                }
                                                ?>
                                            </select>
                                            <label class="form-label" for="NumPaquete">Destinatario</label>
                                        </div>
                                        <div class="form-outline">
                                            <select class="form-control" name="IdRemitente" id="IdRemitente">
                                                <?php
                                                include('Config.php');
                                                $conexion = new mysqli($servername, $username, $password, $dbname);
                                                $sql = "SELECT * FROM Remitente WHERE estatus = 1";
                                                $result= mysqli_query($conexion,$sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '
                                                    <option value="'.$row['IdRemitente'].'">'.$row['Nombre'].'</option>
                                                    ';
                                                }
                                                ?>
                                            </select>
                                            <label class="form-label" for="NumPaquete">Remitente</label>
                                        </div>
                                        <div class="form-outline">
                                            <select class="form-control" name="IdChofer" id="IdChofer">
                                                <?php
                                                include('Config.php');
                                                $conexion = new mysqli($servername, $username, $password, $dbname);
                                                $sql = "SELECT * FROM Chofer WHERE estatus = 1";
                                                $result= mysqli_query($conexion,$sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '
                                                    <option value="'.$row['IdChofer'].'">'.$row['Nombre'].'</option>
                                                    ';
                                                }
                                                ?>
                                            </select>
                                            <label class="form-label" for="NumPaquete">Chofer</label>
                                        </div>
                                        <!-- 2 column grid layout with text inputs for the first and last names -->

                                        <div>
                                            <div class="form-outline">
                                                <input type="number" id="NumPaquete" name="NumPaquete" class="form-control"/>
                                                <label class="form-label" for="NumPaquete">Número de paquete</label>
                                            </div>
                                                <div class="form-outline">
                                                    <input type="number" id="Peso" name="Peso" class="form-control"/>
                                                    <label class="form-label" for="Peso">Peso</label>
                                                </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <div class="form-outline">
                                                    <input type="number" id="DimLargo" name="DimLargo" class="form-control"/>
                                                    <label class="form-label" for="DimLargo">Dimención Largo</label>
                                                </div>
                                              </div>
                                                <div class="col-md-6 mb-2">
                                                <div class="form-outline">
                                                    <input type="number" id="DimAncho" name="DimAncho" class="form-control"/>
                                                    <label class="form-label" for="DimAncho">Dimención Ancho</label>
                                                </div>
                                               </div>
                                               <center><div class="col-md-6 mb-2">
                                                <div class="form-outline">
                                                    <input type="number" id="DimAltura" name="DimAltura" class="form-control"/>
                                                    <label class="form-label" for="DimAltura">Dimención Altura</label>
                                                </div>
                                            </div></center>
                                            </div>
                                            <input type="text" id="TipoRelleno" name="TipoRelleno" class="form-control"/>
                                            <label class="form-label" for="TipoRelleno">Tipo de Relleno</label>
                                        </div>

                                        <!-- Submit button -->
                                        <center>
                                            <button type="submit" class="btn btn-warning btn-block mb-4">
                                                Guardar
                                            </button>
                                           
                                        </center>
                                        <!-- Register buttons -->
                                        <div class="text-center">
                                            <p>Siguenos en nuestras redes sociales</p>
                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="bi bi-facebook"></i>
                                            </button>

                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="bi bi-google"></i>
                                            </button>

                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="bi bi-twitter"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
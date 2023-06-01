<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">

    <head>
        <title>Rutas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <body>
        <form action="../PHP/RutaModificarPHP.php" method="get">
            <!-- Section: Design Block -->
            <section
                class="">
                <!-- Jumbotron -->
                <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
                    <div class="container">
                        <div class="row gx-lg-5 align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <center><h1 class="my-5 display-3 fw-bold ls-tight">
                                    Paque
                                    <span class="text-warning">tería</span>
                                </h1>
                                <img src="../img/zone-picking.png" alt="Paqueteria" width="470" height="400"></center>
                                <p style="color: hsl(217, 10%, 50.8%)"></p>
                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="card">
                                    <div class="card-body py-5 px-md-5">
                                        <center><h3><span class="text-warning">Modificar Ruta</span></h3></center>
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="Origen" name="Origen" class="form-control"/>
                                            <label class="form-label" for="Origen">Origen</label>
                                            <div class="form-outline mb-4">
                                                <input type="text" id="Destino" name="Destino" class="form-control"/>
                                                <label class="form-label" for="Destino">Destino</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="number" id="Distancia" name="Distancia" class="form-control"/>
                                                    <label class="form-label" for="Distancia">Distancia (KM)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="datetime-local" id="TiempoEntrega" name="TiempoEntrega" class="form-control"/>
                                                    <label class="form-label" for="TiempoEntrega">TiempoEntrega</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="number" step="0.01" id="CostoEnvio" name="CostoEnvio" class="form-control"/>
                                            <label class="form-label" for="CostoEnvio">Costo de envio (MXN)</label>
                                        </div>
                                    </div>
                                    <?php
                                    $IdRuta = $_GET['IdRuta'];
                                    echo '
                                    <input type="hidden" name="IdRuta" id="IdRuta" value="'.$IdRuta.'">
                                    ';
                                    ?>

                                        <!-- Submit button -->
                                        <center>
                                            <button type="submit" class="btn btn-warning btn-block mb-4">
                                                Modificar
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
                    </div>
                </div>
                <!-- Jumbotron -->
            </section>
            <!-- Section: Design Block -->
        </form>
    </body>

</html>
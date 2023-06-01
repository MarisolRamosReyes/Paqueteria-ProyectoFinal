<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">

    <head>
        <title>Transportes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>

    <body>
        <form
            action="../PHP/TransportesModificarPHP.php" method="get">
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
                                    <img src="../img/backhaul.png" alt="Paqueteria" width="420" height="350"></center>
                                <p style="color: hsl(217, 10%, 50.8%)"></p>
                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="card">
                                    <div class="card-body py-5 px-md-5">
                                        <center>
                                            <h3>
                                                <span class="text-warning">Modificar Transporte</span>
                                            </h3>
                                        </center>
                                        <?php
                                        $IdTransporte = $_GET['IdTransporte'];
                                        echo '
                                        <input type="hidden" name="IdTransporte" id="IdTransporte" value="'.$IdTransporte.'">
                                        ';
                                        ?>

                                        <!-- 2 column grid layout with text inputs for the first and last names -->

                                        <div>
                                            <div class="form-outline">
                                                <input type="text" id="Modelo" name="Modelo" class="form-control"/>
                                                <label class="form-label" for="Modelo">Modelo</label>

                                                <input type="number" id="CapacidadCarga" name="CapacidadCarga" class="form-control"/>
                                                <label class="form-label" for="CapacidadCarga">Capacidad de Carga (KG)</label>

                                                <input type="date" id="Año" name="Año" class="form-control"/>
                                                <label class="form-label" for="Año">Año</label>

                                                <input type="number" id="VelMax" name="VelMax" class="form-control"/>
                                                <label class="form-label" for="VelMax">Velocidad Maxima (KM)</label>

                                                <input type="text" id="TipoCombustible" name="TipoCombustible" class="form-control"/>
                                                <label class="form-label" for="TipoCombustible">Tipo de Combustible</label>
                                            </div>
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
                    </div>
                </div>
            </section>
        </form>
    </body>

</html>

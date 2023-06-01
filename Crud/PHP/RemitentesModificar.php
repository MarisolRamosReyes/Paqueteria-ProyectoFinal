<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="es-ES">

    <head>
        <title>Remitentes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>

    <body>
        <form
            action="RemitentesModificarPHP.php" method="get">
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
                                    <img src="../img/unit.png" alt="Paqueteria" width="420" height="350"></center>
                                <p style="color: hsl(217, 10%, 50.8%)"></p>
                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="card">
                                    <div class="card-body py-5 px-md-5">
                                        <center>
                                            <h3>
                                                <span class="text-warning">Modificar Remitente</span>
                                            </h3>
                                        </center>
                                        <?php
                                    $IdRemitente = $_GET['IdRemitente'];
                                    echo '
                                    <input type="hidden" name="IdRemitente" id="IdRemitente" value="'.$IdRemitente.'">
                                    ';
                                    ?>


                                        <!-- 2 column grid layout with text inputs for the first and last names -->

                                        <div>
                                            <div class="form-outline">
                                                <input type="text" id="Nombre" name="Nombre" class="form-control"/>
                                                <label class="form-label" for="Nombre">Nombre(s)</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="APaterno" name="APaterno" class="form-control"/>
                                                    <label class="form-label" for="APaterno">Apellido Paterno</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="AMaterno" name="AMaterno" class="form-control"/>
                                                    <label class="form-label" for="AMaterno">Apellido Materno</label>
                                                </div>
                                            </div>
                                            <input type="text" id="Calle" name="Calle" class="form-control"/>
                                            <label class="form-label" for="Calle">Calle</label>
                                            <input type="number" id="Numero" name="Numero" class="form-control"/>
                                            <label class="form-label" for="Numero">Numero</label>
                                            <input type="text" id="Colonia" name="Colonia" class="form-control"/>
                                            <label class="form-label" for="Colonia">Colonia</label>
                                            <input type="text" id="Municipio" name="Municipio" class="form-control"/>
                                            <label class="form-label" for="Municipio">Municipio</label>
                                            <input type="text" id="Estado" name="Estado" class="form-control"/>
                                            <label class="form-label" for="Estado">Estado</label>
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
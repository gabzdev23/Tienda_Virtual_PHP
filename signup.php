<?php
    require "db/conexion.php";
    include "controller/ctrlSigNup.php";

     
    // Comprobar si hay una sesión iniciada
    if (!empty($_SESSION["idUsuario"])) {
        header('Location: inicio.php');
    }
    else {
       session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Registrarte</title>

        <link rel="stylesheet" href="public/libs/bootstrap.min.css" />
        <script src="public/libs/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="public/css/styles.css">
    </head>

    <body
        class="d-flex flex-column justify-content-center align-items-center"
        style="min-height: 100vh"
    >

        <div class="shadow form-signup-size">
            <h1 class="text-center">Registrarse</h1>
            
            <div id="msgError">
                <?php 
                    if(!empty($errores)) {
                        echo "<div class='alert alert-danger text-center' role='alert'>
                        $errores[0]
                    </div>";
                    }
                ?>
            </div>
            
            <form action="" class="mt-4" method="post">
                <div class="container">
                    <div class="row">
                        <div class="mb-3 col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Nombre"
                                name="nombre"
                            />
                        </div>

                        <div class="mb-3 col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Apellido"
                                name="apellido"
                            />
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Correo"
                                name="correo"
                            />
                        </div>

                        <div class="mb-3 col">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Contraseña"
                                name="clave"
                            />
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col">
                            <select class="form-select" name="genero">
                                <option selected>Género</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>

                        <div class="mb-3 col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="País"
                                name="pais"
                            />
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Ciudad"
                                name="ciudad"
                            />
                        </div>
                        <div class="mb-3 col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Codigo Postal"
                                name="codPost"
                            />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fechaNacimiento" />
                    </div>

                    <div class="mt-4 d-flex justify-content-between align-items-center">
                        <input
                            type="submit"
                            name="btnRegistro"
                            value="Registrate"
                            class="btn btn-danger px-4 py-2"
                        />

                        <a href="login.php" class="text-decoration-none text-dark"
                            >Iniciar Sesión</a
                        >
                    </div>
                </div>
            </form>
        </div>

        <script src="public/js/app.js"></script>
    </body>
</html>

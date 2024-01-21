<?php
     session_start();
     
    // Comprobar si hay una sesión iniciada
    if (!empty($_SESSION["idUsuario"])) {
        header("Location: inicio.php");
    }
    else {
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarte</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="libs/bootstrap.min.css">
    <script src="libs/bootstrap.min.css"></script>
</head>

<body class="d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">

    <h1>Registrarse</h1>
    
    <?php
        include "db/conexion.php";
        include "controller/ctrlSigNup.php";
    ?>

    <form action="" class="mt-2" method="post">
        <div class="container">
            <div class="row">
                <div class="mb-3 col">
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                </div>

                <div class="mb-3 col">
                    <input type="text" class="form-control" placeholder="Apellido" name="apellido">
                </div>
            </div>
        
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Correo" name="correo">
            </div>
            
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Contraseña" name="clave">

               <!--<div id="passwordHelpBlock" class="form-text">
                    La contraseña no debe ser menor a 8 caracteres
                 </div>  -->
            </div>
        
            <div class="mb-3">
                <select class="form-select" name="genero">
                    <option selected>Género</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Prefiero_no_decirlo">Prefiero no decirlo</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fechaNacimiento">
            </div>
            
            <div class="mt-5 d-flex justify-content-between align-items-center">
                <input type="submit" name="btnRegistro" value="Registrate" class="btn btn-primary px-4 py-2" />

                <a href="login.php" class="text-decoration-none text-primary">Iniciar Sesión</a>
            </div>
        </div>
    </form>
</body>
</html>
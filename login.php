<?php
    include "db/conexion.php";
    include "controller/ctrlLogin.php";

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicion de sesión</title>

    <link rel="stylesheet" href="public/libs/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="public/libs/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">


    <div class="text-center shadow form-login-size">
        <h1>Iniciar sesión</h1>

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
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Correo" name="correo">
                </div>
                
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Contraseña" name="clave">
                </div>
                
                <div class="mt-3 d-flex flex-column">
                    <input type="submit" name="btnIngresar" value="Iniciar sesion" class="btn btn-danger block"/>
                    <a href="signup.php" class="text-decoration-none text-dark mt-4">¿No tienes una cuenta?, Registrate</a>
                </div>
            </div>
        </form>
    </div>

    <script src="public/js/app.js"></script>
</body>
</html>
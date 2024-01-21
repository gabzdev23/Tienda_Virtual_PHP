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
    <title>Inicion de sesión</title>

    <link rel="stylesheet" href="libs/bootstrap.min.css">
    <script src="libs/bootstrap.min.css"></script>
</head>

<body class="d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">

    <h1>Iniciar sesión</h1>

    <?php
        include "db/conexion.php";
        include "controller/ctrlLogin.php";
    ?>

    <form action="" class="mt-2" method="post">
        <div class="container">
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Correo" name="correo">
            </div>
            
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Contraseña" name="clave">
            </div>
            
            <div class="mt-3 d-flex flex-column">
                <input type="submit" name="btnIngresar" value="Iniciar sesion" class="btn btn-primary block"/>
                <a href="signup.php" class="text-decoration-none text-primary mt-4">¿No tienes una cuenta?, Registrate</a>
            </div>
        </div>
    </form>
    
</body>
</html>
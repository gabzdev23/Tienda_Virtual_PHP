<?php
    session_start();
    require 'db/conexion.php';
    require 'controller/ctrlUsuario.php';

    // Comprobar si hay una sesión iniciada
    if(empty($_SESSION["idUsuario"])) { 
        header('location: login.php'); 
    } 

    $id = $_SESSION["idUsuario"];

    $query = "SELECT * FROM usuario WHERE id_usua='$id'";
    $resultado = mysqli_query($conexion, $query);
    $datos = mysqli_fetch_assoc($resultado);
    $nombre = $datos["nom_usua"];
    $apellido = $datos["ape_usua"];
    $correo = $datos["correo"];
    $pais = $datos["pais"];
    $ciudad = $datos["ciudad"];
    $genero = $datos["genero"];
    $codPost = $datos["cod_post"];
    $fechaNacimiento = $datos["fecha"];

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista del calzado</title>

    <link rel="stylesheet" href="public/libs/bootstrap.min.css" />
    <script src="public/libs/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="public/css/app.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark py-3 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-white fs-2 p-0" href="inicio.php"> <h2 class="m-0">Shoes Store</h2> </a>

            <div class="d-flex align-items-center">
                <a href="usuario.php">
                    <img
                        src="public/icons/person.svg"
                        alt=""
                        style="width: 35px; margin-right: 20px"
                    />
                </a>
                <a href="carrito.php">
                    <img src="public/icons/bag.svg" alt="" style="width: 30px" />
                </a>
            </div>
        </div>
    </nav>

    <section class="container mt-5" style="min-height: 55vh;">
        <h1>Usuario</h1>
        <hr>
        <div class="d-flex align-items-center">
            <div >
                <?php
                    echo "<p><span class='fw-semibold'>Nombre:</span> $nombre </p>";
                    echo "<p><span class='fw-semibold'>Apellido:</span> $apellido </p>";
                    echo "<p><span class='fw-semibold'>Correo:</span> $correo </p>";
                    echo "<p><span class='fw-semibold'>Genero:</span> $genero </p>";
                ?>
            </div>

            <div class="ms-5">
                <?php
                    echo "<p><span class='fw-semibold'>Pais:</span> $pais </p>";
                    echo "<p><span class='fw-semibold'>Ciudad:</span> $ciudad </p>";
                    echo "<p><span class='fw-semibold'>Codigo Postal:</span> $codPost </p>";
                    echo "<p><span class='fw-semibold'>Fecha de Nacimiento: </span>$fechaNacimiento </p>";
                ?>
            </div>
        </div>

        <a href="actualizarUsuario.php" class="mt-22 btn btn-warning">Actualizar Datos</a>


        <div class="mt-5">
            <h1>Eliminar cuenta</h1>
            <hr>
            <a href="eliminarCuenta.php" class="btn btn-danger mt-2">Eliminar Cuenta</a>
        </div>
    </section>
    
    <footer class="py-5 text-center" style="margin-top: 60px;">
        <div class="container">
            <p class="text-dark mb-0">
                &copy; 2024 SHoes - Todos los derechos reservados
            </p>
        </div>
    </footer>

    <script src="public/js/app.js"></script>
</body>
</html>
    
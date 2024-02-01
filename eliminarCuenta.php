<?php
    session_start();

    require "db/conexion.php";
    require "controller/ctrlUsuario.php";

    if(empty($_SESSION["idUsuario"])) { 
        header('location: login.php'); 
    } 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Procesar pago</title>

        <link rel="stylesheet" href="public/libs/bootstrap.min.css" />
        <script src="public/libs/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="public/css/styles.css">
    </head>

    <body
    >
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

        <section class="d-flex flex-column justify-content-center align-items-center"
        style="min-height: 100vh">

        <div class="shadow form-signup-size">
            <h1 class="text-center">Eliminar Cuenta</h1>
            
            <div id="msgExito">
                <?php 
                    if(!empty($msgExito)) {
                        echo "<div class='alert alert-success text-center' role='alert'>
                        $msgExito[0]
                    </div>";
                    }
                ?>
            </div>

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
                <div class="container d-flex flex-column">
                    <input
                        type='email'
                        class='form-control'
                        placeholder='Correo'
                        name='correo'/>;

                         
                    <input
                        type='password'
                        class='form-control'
                        placeholder='Contraseña'
                        name='clave'/>

                    <input
                        type="submit"
                        name="btnEliminarCuenta"
                        value="Eliminar Cuenta"
                        class="btn btn-danger w-full px-4 py-2 mt-3"
                    />
                </div>
            </form>
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

<?php 
    require "db/conexion.php";
    require 'controller/ctrlInicio.php';
    session_start(); 

    if(empty($_SESSION["idUsuario"])) { 
        header('location: login.php'); 
    }  

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Inicio</title>

        <link rel="stylesheet" href="public/libs/bootstrap.min.css" />
        <script src="public/libs/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="public/css/styles.css" />
    </head>
    <body>
        <header class="banner">
            <div class="banner-content">

                <nav class="navbar navbar-expand-lg pt-4 w-100">
                <div class="container d-flex justify-content-between align-items-center">
                    <a class="navbar-brand text-white fs-2 p-0" href="inicio.php"><h2 class="m-0">Shoes Store</h2></a>

                    <div class="d-flex align-items-center">
                        <a href="usuario.php" class="icon-hover">
                            <img
                                src="public/icons/person.svg"
                                alt=""
                                style="width: 35px;"
                            />
                        </a>
                        <a href="carrito.php" class="icon-hover">
                            <img src="public/icons/bag.svg" alt="" style="width: 30px; margin: 0 20px" />
                        </a>
                        <a href="controller/ctrlLogout.php" class="icon-hover">
                            <img src="public/icons/logout.svg" alt="" style="width: 30px" />
                        </a>
                    </div>
                </div>
                </nav>

                <div class="container banner-text">
                    <div>
                        <h1 class="bg-black text-white px-4 pt-1" style="width: 210px">Shoes Store</h1>
                    </div>
                    <p style="width: 35%;">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. At iure
                        sapiente quasi voluptate nulla aspernatur ratione eaque!
                    </p>
                </div>
            </div>
        </header>

        <section class="container mt-5">
            <h2>Calzado para Caballeros</h2>
            <ul class="list-unstyled mt-4 d-flex">
                <?php
                    showShoes($conexion, 'M');
                ?>
            </ul>
        </section>

        <section class="container mt-5">
            <h2>Calzado para Damas</h2>
            <ul class="list-unstyled mt-4 d-flex">
                <?php
                    showShoes($conexion, 'F');
                ?>
            </ul>
        </section>

        <section class="container mt-5">
            <h2>Calzado para Niños</h2>
            <ul class="list-unstyled mt-4 d-flex">
                <?php
                    showShoes($conexion, 'N');
                ?>
            </ul>
        </section>


        <footer class="py-5 text-center" style="margin-top: 60px;">
            <div class="container">
                <p class="text-dark mb-0">
                    &copy; 2024 SHoes - Todos los derechos reservados
                </p>
            </div>
        </footer>
    </body>
</html>

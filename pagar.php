<?php
    require "db/conexion.php";
    require "controller/ctrlPagar.php";

    session_start();
    
    if(empty($_SESSION["idUsuario"])) { 
        header('location: login.php'); 
    } 

    $id = $_SESSION["idUsuario"];

    $query= "SELECT * FROM usuario WHERE id_usua='$id'";
    $executeQuery = mysqli_query($conexion, $query);
    $res = mysqli_fetch_assoc($executeQuery);

    $nombre = $res["nom_usua"];
    $apellido = $res["ape_usua"];
    $pais = $res["pais"];
    $ciudad = $res["ciudad"];
    $codPost = $res["cod_post"];

    $subTotal = 0;
    $total = 1;
    
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
            <h1 class="text-center">Pago</h1>
 
            <form action="" class="mt-4" method="post">
                <div class="container d-flex flex-column">
                    <div class="row">
                        <div class="mb-3 col">
                            <?php
                                echo "<input
                                    type='text'
                                    class='form-control'
                                    placeholder='Nombre'
                                    name='nombre'
                                    value='$nombre'
                                />";
                            ?>
                        </div>

                        <div class="mb-3 col">
                           <?php
                                echo "<input
                                type='text'
                                class='form-control'
                                placeholder='Apellido'
                                name='apellido'
                                value='$apellido'
                            />"
                           ?>
                        </div>
                    </div>
                    
                   <div class="row">
                        <div class="mb-3 col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Telefono"
                                name="telefono"
                            />
                        </div>
                        <div class="mb-3 col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Dirección"
                                name="direccion"
                            />
                        </div>
                   </div>
                    
                    <div class="row">
                        <div class="mb-3 col">
                            <?php
                                echo "<input
                                    type='text'
                                    class='form-control'
                                    placeholder='Ciudad'
                                    name='ciudad'
                                    value='$ciudad'
                                />"
                            ?>
                        </div>

                        <div class="mb-3 col">
                            <?php
                                echo "<input
                                    type='text'
                                    class='form-control'
                                    placeholder='País'
                                    name='pais'
                                    value='$pais'
                                />"
                            ?>
                        </div>
                    </div>

                    <div class="mb-3 col">
                        <?php
                            echo "<input
                            type='text'
                            class='form-control'
                            placeholder='Codigo Postal'
                            name='codPost'
                            value='$codPost'
                        />";
                        ?>
                    </div>

                    <div class="mb-3 col">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Número de tarjeta"
                            name="numTarjeta"
                        />
                    </div>
                    
                    <div class="row">
                        <div class="mb-3 col">
                            <input
                                type="number"
                                class="form-control"
                                placeholder="Mes"
                                name="mesTarjeta"
                                min= "1"
                                max="12"
                            />
                        </div>
                        <div class="mb-3 col">
                            <input
                                type="number"
                                class="form-control"
                                placeholder="Año"
                                name="anioTarjeta"
                                min="24"
                                max="32"
                            />
                        </div>

                        <div class="mb-3 col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="CVV"
                                min="3"
                                max="3"
                                name="cvvTarjeta"
                            />
                        </div>
                    </div>

                    <input
                        type="submit"
                        name="btnPagar"
                        value="Pagar"
                        class="btn btn-dark w-full px-4 py-2 mt-3"
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

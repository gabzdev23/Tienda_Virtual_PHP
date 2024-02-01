<?php
    session_start();
    require 'db/conexion.php';
    require 'controller/ctrlBota.php';
    require 'controller/ctrlCarrito.php';
    
    if(empty($_SESSION["idUsuario"])) { 
        header('location: login.php'); 
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista del calzado</title>

    <link rel="stylesheet" href="public/libs/bootstrap.min.css" />
    <script src="public/libs/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="public/css/styles.css" />
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

    <section class="container" style="margin-top: 80px;">
        <div class="d-flex">
            <div>
                <h2>Botas en el carrito</h2>

                <div id="msgExito">
                    <?php 
                        if(!empty($msgExito)) {
                            echo "<div class='alert alert-success' role='alert'>
                            $msgExito[0]
                          </div>";
                        }
                    ?>
                </div>

                <?php
                    $botas = addedShoes($conexion);
                    if(!empty(addedShoes($conexion))) {
                        echo "<ul class='list-group mt-4 overflow-auto' style='height: 50vh;'>";
                        for($i=0; $i < count($botas); $i++) {
                            echo "<li class='d-flex align-items-center list-group-item p-4'
                            >";
                            echo "<img src='public/imgs/".$botas[$i]["imagen"]."' class='card-img-top' style='width: 120px; margin-right: 20px' alt='...' />";
                            echo "<div class='item-text'>";
                            echo "<p class='text-dark fw-bold fs-5 name-shoe'>".$botas[$i]["nom_botas"]."</p>";
                            echo "<p class='text-dark item-descripcion'>".$botas[$i]["descripcion"]."</p>";
                            
                            echo "<div class='d-flex justify-content-between align-items-end'>";
                            
                            echo "<div>";
                            echo "<p class='text-dark'> <span class='text-dark fw-bold'>Talla:</span> ".$botas[$i]["talla"]."</p>";
                            echo "<p class='text-dark'> <span class='text-dark fw-bold'>Cantidad:</span> ".$botas[$i]["cantidad"]."</p>";
                            echo "<p class='text-dark'><span class='text-dark fw-bold'>Precio:</span> $".$botas[$i]["precio"].".00</p>";
                            echo "</div>";
                
                            echo "<form method='post'>";
                            echo "<input type='submit' class='btn btn-danger fw-semibold px-4 py-2' value='Eliminar' name='btnEliminarCarr'>";
                            echo  "<input type='hidden' name='idBotaCarr'"."value='".$botas[$i]["id_carr"]."'>";
                            echo "</form>";
                            echo "</div>";
                            echo "</div> </li>";
                        };
                       echo "</ul>";
                    }
                    else {
                        echo "<p class='mt-4 fs-5 text-dark' style='height: 50vh; width: 696px'>Carrito Vacio</p>";
                    }
                ?>
                
            </div>
            

            <div class="ms-5 d-flex flex-column w-50">
                <h2>Resumen</h2>
                <ul class="p-0">
                    <li class="pt-3 d-flex justify-content-between border-bottom">
                       <p>Subtotal</p>
                       <?php
                        echo "<p>$".paymentSummary($conexion)[0]."</p>"; 
                       ?> 
                    </li>
                    <li class="pt-3 d-flex justify-content-between border-bottom">
                       <p>Gastos de envío</p> 
                       <?php
                        echo "<p>$".paymentSummary($conexion)[1]."</p>"; 
                       ?> 
                    </li>
                    <li class="pt-3 d-flex justify-content-between border-bottom">
                       <p>Total</p> 
                       <?php
                        echo "<p>$".paymentSummary($conexion)[2]."</p>"; 
                       ?> 
                    </li>
                </ul>

                <?php
                    if(!empty(addedShoes($conexion))) {
                        echo "<a href='pagar.php' class='btn btn-dark fw-semibold px-4 py-2 w-full'>Pagar</a>";
                    }
                    else {
                        echo "<button type='button' class='btn btn-secondary' disabled>Pagar</button>";
                    }
                ?>
                

                
            </div>
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
    
<?php
    session_start();
    require 'db/conexion.php';
    require 'controller/ctrlBota.php';
    $data = getShoeById($conexion, $_GET["id"]);

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

    <section class="container">
        <div class="d-flex align-items-center">
            <div style="width: 70%; margin-right: 40px;">
                <?php
                    echo "<img src='public/imgs/".$data["imagen"]."' class='card-img-top' alt='...' />";
                ?>
            </div>

            <div>
                <div>
                    <div id="msgExito">
                        <?php 
                            if(!empty($msgExito)) {
                                echo "<div class='alert alert-success' role='alert'>
                                $msgExito[0]
                            </div>";
                            }
                        ?>
                    </div>
                    <div id="msgError">
                        <?php 
                            if(!empty($errores)) {
                                echo "<div class='alert alert-danger' role='alert'>
                                $errores[0]
                            </div>";
                            }
                        ?>
                    </div>
                    
                    <h1 class="fw-bold all">
                        <?php echo $data["nom_botas"]; ?>
                    </h1>
                    <p class="text-danger fs-3 fw-bold my-2">
                        $<?php echo $data["precio"]; ?>.00
                    </p>
                    
                    <p class="text-wrap" style="width: 70%;">
                        <?php echo $data["descripcion"]; ?>
                    </p>
                </div>
                

                <form action="" method="post" class="d-flex flex-column mt-3">
                    <h3 class="fs-5 fw-bold mt-0">Tallas disponibles</h3>
                    
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <?php
                            $tallas = explode(",", $data["tallas"]);
                            
                            for ($i=0; $i < count($tallas); $i++) { 
                                echo "<div style='margin-right: 10px;'>";
                                echo "<input type='radio' class='btn-check' name='talla' id='btnradio$i' autocomplete='off' value='$tallas[$i]' >";

                                echo "<label class='btn btn-outline-dark' for='btnradio$i'>".$tallas[$i]."</label>";
                                echo "</div>";
                            }
                        ?>
                    </div>

                    <div class="d-flex mt-4">
                        <input type="number" value="1" min="1" class="text-center" style="margin-right: 10px; width: 50px" name="cantidad">
                        
                        <input type="submit" class="btn btn-dark fw-semibold px-4 py-2" value="Añadir al carrito" name="btnAggCarrito">
                    </div>
                </form>
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
    
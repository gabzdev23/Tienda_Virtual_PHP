<?php
    require 'helper/limpiarCadenas.php';
    $errores= [];
    $msgExito = [];
    
    function getShoeById($con, $id) {
        $sql = "SELECT * FROM botas WHERE id_botas='$id'";
        $query = mysqli_query($con, $sql); 
        $botas = mysqli_fetch_assoc($query);
        return $botas;
    }

    if(!empty($_POST["btnAggCarrito"])) {

        $idBota = $_GET["id"];
        $idUsuario = $_SESSION["idUsuario"];

        // Obtener precio de la bota
        $query = "SELECT * FROM botas WHERE id_botas= $idBota";
        $resultado = mysqli_query($conexion, $query);
        $datosBota = mysqli_fetch_assoc($resultado);
        $precio = $datosBota["precio"];
        $envio = $datosBota["envio"];
        
        $cantidad = escaparCadena($_POST["cantidad"]);

        if(empty($_POST["talla"])){
            $errores[] = "Debes eliger una talla para el calzado";
            return $errores;
        } 
        else {
            $talla = escaparCadena($_POST["talla"]);

            $queryCarrito = "INSERT INTO carrito (id_usua, id_botas, talla, cantidad, precio, envio) VALUES ('$idUsuario', '$idBota', '$talla',  '$cantidad', '$precio', '$envio')";
            
            $resultado = mysqli_query($conexion, $queryCarrito);
            $msgExito[] = "Bota agregada al carrito";
        }

    }

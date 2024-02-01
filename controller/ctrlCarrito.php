<?php
    $errores = [];
    $msgExito = [];

    function addedShoes($conexion) {
        $idUsuario = $_SESSION["idUsuario"];

        // Obtener precio de la bota
        $query = "SELECT * FROM carrito JOIN botas ON carrito.id_botas = botas.id_botas WHERE id_usua= $idUsuario";

        $resultado = mysqli_query($conexion, $query);

        $botas = array();
        
        while($row = mysqli_fetch_assoc($resultado)) {
            array_push($botas, $row);
        }

        return $botas;
    }

    function paymentSummary($conexion) {
        $idUsuario = $_SESSION["idUsuario"];

        // Obtener precio de la bota
        $query = "SELECT SUM(carrito.precio) AS sub_total, SUM(carrito.envio) AS shipping_cost FROM carrito WHERE id_usua= $idUsuario";

        $executeQuery = mysqli_query($conexion, $query);
        $res = mysqli_fetch_assoc($executeQuery);
        $sub_total = $res["sub_total"] | 0;
        $shipping_cost = $res["shipping_cost"] | 0;
        $total_price = ($sub_total + $shipping_cost) | 0;


        return [$sub_total, $shipping_cost, $total_price];
    }

    // Eliminar Bota del carrito
    if(!empty($_POST["btnEliminarCarr"])) {
        $idBotaCarr = $_POST["idBotaCarr"];

        // Obtener precio de la bota
        $query = "DELETE FROM carrito WHERE id_carr= $idBotaCarr";
        $resultado = mysqli_query($conexion, $query);

        if($resultado) {
            $msgExito[] = "Bota eliminada del carrito";
        } 
    }
?>
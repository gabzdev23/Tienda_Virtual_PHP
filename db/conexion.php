<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbName = "tiendavirtual_botas";

    $conexion=new mysqli($dbHost, $dbUser, "", $dbName);

    // Reconoce caracteres especiales (ñ,',´. etc)
    $conexion->set_charset("utf8");
?>
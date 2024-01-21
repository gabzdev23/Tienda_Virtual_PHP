<?php
$conexion=new mysqli("localhost", "root", "", "tiendavirtual_botas");

    // Reconoce caracteres especiales (ñ,',´. etc)
$conexion->set_charset("utf8");
?>
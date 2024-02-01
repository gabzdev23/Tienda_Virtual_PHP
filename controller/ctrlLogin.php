<?php
    require 'helper/limpiarCadenas.php';
    session_start();
    $errores = [];

    if(!empty($_POST["btnIngresar"])) {
        
        foreach ($_POST as $campo => $valor) {
            if (empty($valor)) {
                $errores[] = "Los campos no pueden estar vacios";
            }
        }

        if(count($errores) > 0) {
            return $errores;
        }
        else {
            $correo = escaparCadena($_POST["correo"]);
            $clave = escaparCadena($_POST["clave"]);

            $claveHash = hash_hmac("sha512", $clave, "tk");

            $sql=$conexion->query("SELECT * FROM usuario WHERE correo='$correo' AND clave='$claveHash'");

            if($datos=$sql->fetch_object()){
                $_SESSION["idUsuario"]=$datos->id_usua;
                header('location: inicio.php');
            }
            else {
                $errores[] = "Correo o contraseña incorrectos";
            }
        }
    }
?>
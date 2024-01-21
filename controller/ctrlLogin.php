<?php
    session_start();

    if(!empty($_POST["btnIngresar"])) {
        
        $errores = [];

        foreach ($_POST as $campo => $valor) {
            if (empty($valor)) {
                $errores[] = "<div class='alert alert-danger mt-2' role='alert'>Los campos no pueden estar vacios</div>";
            }
        }

        if(count($errores) > 0) {
            echo $errores[0];
        }
        else {
            $correo = filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL);
            $clave = filter_var($_POST["clave"], FILTER_SANITIZE_SPECIAL_CHARS);

            $sql=$conexion->query("SELECT * FROM usuario WHERE correo='$correo' and clave='$clave'");

            if($datos=$sql->fetch_object()){
                $_SESSION["idUsuario"]=$datos->id;
                header("location: inicio.php");
            }
        }
    }
?>
<?php
    require 'helper/limpiarCadenas.php';
    session_start();
    $errores = [];
    
    if(!empty($_POST["btnRegistro"])) {
        
        $nombre = escaparCadena($_POST["nombre"]);
        $apellido = escaparCadena($_POST["apellido"]);
        $correo = escaparCadena($_POST["correo"]);
        $clave = escaparCadena($_POST["clave"]);
        $genero = escaparCadena($_POST["genero"]);
        $pais = escaparCadena($_POST["pais"]);
        $codPost = escaparCadena($_POST["codPost"]);
        $ciudad = escaparCadena($_POST["ciudad"]);
        $fechaNacimiento = escaparCadena($_POST["fechaNacimiento"]);

        // Verificar que el correo no exista en la bd
        $queryCorreo = "SELECT * FROM usuario WHERE correo='$correo'";
        $correoExistente = mysqli_query($conexion, $queryCorreo);

        foreach ($_POST as $campo => $valor) {

            if (empty($valor) || $valor == "Género") {
              $errores[] = "Los campos no pueden estar vacios";
            }
            else if($correoExistente->num_rows > 0) {
                $errores[] = "Ya existe una cuenta con ese correo";
            }
            else if(strlen($valor) > 50) {
                $errores[] = "Los campos deben tener un maximo de 50 caracteres";
            }
            else if($campo == "clave" && strlen($valor) < 5) {
                $errores[] = "La contraseña debe tener un minimo de 5 caracteres";
            }
             
        }

        if(count($errores) > 0) {
            return $errores;
        }
        else {
            $claveHash = hash_hmac("sha512", $clave, "tk");

            $sql = "INSERT INTO usuario (nom_usua, ape_usua, correo, clave, genero, pais, cod_post, ciudad, fecha) VALUES ('$nombre', '$apellido', '$correo', '$claveHash', '$genero', '$pais', '$codPost', '$ciudad', '$fechaNacimiento')";
            
            $resultado = mysqli_query($conexion, $sql);
            
            if($resultado == true){
                $idUsuario = mysqli_insert_id($conexion);
                $_SESSION["idUsuario"] = $idUsuario;
                header('Location: inicio.php');
            }
        }
    }
?>
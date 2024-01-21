<?php
    session_start();
    
    if(!empty($_POST["btnRegistro"])) {
        $errores = [];
        
        $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_SPECIAL_CHARS);
        $apellido = filter_var($_POST["apellido"], FILTER_SANITIZE_SPECIAL_CHARS);
        $correo = filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL);
        $clave = filter_var($_POST["clave"], FILTER_SANITIZE_SPECIAL_CHARS);
        $genero = filter_var($_POST["genero"], FILTER_SANITIZE_SPECIAL_CHARS);
        $fechaNacimiento = filter_var($_POST["fechaNacimiento"], FILTER_SANITIZE_SPECIAL_CHARS);

        $queryCorreo = "SELECT * FROM usuario WHERE correo='$correo'";
        $correoExistente = mysqli_query($conexion, $queryCorreo);

        foreach ($_POST as $campo => $valor) {
            if (empty($valor)) {
              $errores[] = "<div class='alert alert-danger mt-2' role='alert'>Los campos no pueden estar vacios</div>";
            }
            else if($correoExistente->num_rows > 0) {
                $errores[] = "<div class='alert alert-danger mt-2' role='alert'>Ya existe una cuenta con ese correo</div>";
            }
          }

        if(count($errores) > 0) {
            echo $errores[0];
        }
        else {

            $sql = "INSERT INTO usuario (nombre, apellido, correo, clave, genero, fecha_nacimiento) VALUES ('$nombre', '$apellido', '$correo', '$clave', '$genero', '$fechaNacimiento')";
            
            $resultado = mysqli_query($conexion, $sql);
            
            if($resultado == true){
                $idUsuario = mysqli_insert_id($conexion);
                $_SESSION["idUsuario"] = $idUsuario;
                header("location: inicio.php");
            }
        }
    }
?>
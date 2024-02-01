<?php
    require 'helper/limpiarCadenas.php';
    $errores = [];
    $msgExito = [];

    // >>>> Actualizar Usuario
    if(!empty($_POST["btnActUsuario"])) {
        $idUsuario = $_SESSION["idUsuario"];
        
        $nombre = escaparCadena($_POST["nombre"]);
        $apellido = escaparCadena($_POST["apellido"]);
        $ciudad = escaparCadena($_POST["ciudad"]);
        $pais = escaparCadena($_POST["pais"]);
        $correo = escaparCadena($_POST["correo"]);
        $genero = escaparCadena($_POST["genero"]);
        $codPost = escaparCadena($_POST["codPost"]);
        $fechaNacimiento = escaparCadena($_POST["fechaNacimiento"]);

         // Verificar que el correo no exista en la bd
         $queryCorreo = "SELECT * FROM usuario WHERE correo='$correo' AND id_usua != $idUsuario";
         $correoExistente = mysqli_query($conexion, $queryCorreo);

 
         foreach ($_POST as $campo => $valor) {
             if (empty($valor) || $valor == "Género") {
               $errores[] = "Los campos no pueden estar vacios";
             }
             else if($correoExistente->num_rows > 0 ) {
                 $errores[] = "Ya existe una cuenta con ese correo";
             }
             else if(strlen($valor) > 50) {
                $errores[] = "Los campos tienen caracteres muy largos";
             }
         }


        if(count($errores) > 0) {
            return $errores;
        }
        else {
            $query = "UPDATE usuario
                SET nom_usua = '$nombre',
                    ape_usua = '$apellido',
                    ciudad = '$ciudad',
                    pais = '$pais',
                    cod_post = '$codPost',
                    correo = '$correo',
                    fecha = '$fechaNacimiento',
                    genero = '$genero'
                WHERE id_usua = '$idUsuario'";
            $resultado = mysqli_query($conexion, $query);

            if ($resultado) {
                $msgExito[] = "El usuario se actualizó correctamente";
            } else {
                echo "Ocurrió un error al actualizar el registro.";
            }
        }
        
    }


      // >>>> Eliminar cuenta de Usuario
    if(!empty($_POST["btnEliminarCuenta"])) {
        
        $idUsuario = $_SESSION["idUsuario"];

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
                $query = "DELETE FROM usuario WHERE id_usua = '$idUsuario'";

                if(mysqli_query($conexion, $query)) {
                    header('location: login.php');
                    mysqli_close($conexion);
                    session_destroy();
                }
                else{
                    echo "a";
                }
            }
            else {
                $errores[] = "Correo o contraseña incorrectos";
            }
        }
    }
<?php
   session_start();

   if(empty($_SESSION["idUsuario"])) {
       header("location: login.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Sesion iniciada</h1>

    <a href="controller/ctrlLogout.php">Salir</a>
</body>
</html>
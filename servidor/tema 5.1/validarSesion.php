<?php
    session_start();
    $titulo = "Necesitamos tus datos!!";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion Iniciada</title>
</head>
<body>
    <?php include_once"./header.php"; ?>

    <form action="./establecerConexion.php" method="post">
        Nombre: <input type="text" name="name" id="name"><br>
        Contraseña: <input type="password" name="password" id="password"><br>
        <input type="submit" value="Validar">
    </form>
    
</body>
</html>
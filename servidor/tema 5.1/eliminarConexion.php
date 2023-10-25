<?php
    session_start();
    $titulo = "Sesion Cerrada";
    session_destroy();
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
    
</body>
</html>
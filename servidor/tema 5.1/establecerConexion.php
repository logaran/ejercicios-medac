<?php
session_start();
if (isset($_SESSION['name'])) {
    $titulo = "Ya estas conectado";
    $nombre = $_SESSION['name'];
} else if (
    isset($_POST['name'])
    && isset($_POST['password'])
    && $_POST['name'] === "Antonio"
    && $_POST['password'] === "1234"
) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['password'] = $_POST['password'];
    $nombre = $_SESSION['name'];
    $titulo = "Sesion Iniciada";
} else {
    header('Location: ./validarSesion.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion Iniciada</title>
</head>

<body>
    <?php include_once "./header.php"; ?>
    <h2>Bienvenido: <?= $nombre ?></h2>
</body>

</html>
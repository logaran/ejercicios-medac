<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de visitas</title>
</head>

<body>
    <?php
    if (isset($_COOKIE['contador'])) {
        $contador = $_COOKIE['contador'] +1;
    } else {
        $contador = 1;
    }
    setcookie('contador', $contador, time() + 60);
    ?>
    <div class="contenedor">
        <h1>Contador de visitas</h1>
        <div id="visitas">
            <?= $contador ?>
        </div>
        <button onclick="document.cookie = 'contador=;max-age=-1';location.reload(true)">Resetear visitas</button>
    </div>

</body>

</html>
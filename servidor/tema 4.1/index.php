<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar Autentificación</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once("validar.php");
    if (isset($_POST["user"]) && isset($_POST["password"]) && validateUser($_POST["user"]) && validatePassword($_POST["password"])) {
        echo "<h1>Usuario validado</>";
    } else if (isset($_POST["user"]) && isset($_POST["password"])){
    $mensajeUser = validateUser($_POST["user"]) ? "<span class='valido'>Usuario valido</span>" : "<span class='error'>El usuario debe tener entre 6 y 15 caracteres!</span>";
    $mensajePassword = validatePassword($_POST["password"]) ? "<span class='valido'>contraseña valida</span>" : "<span class='error'>La contraseña debe tener 7 caracteres no numéricos!</span>";
    echo
    "<form action='' method='post'>
        <h1>Datos de usuario</h1>
        Usuario: <input type='text' name='user' id='user' placeholder='John Doe'>$mensajeUser<br>
        Contraseña: <input type='password' name='password' id='password' placeholder='John Doe'>$mensajePassword
        <input type='submit' value='Enviar'>    
    </form>";
    } else {
        echo
    "<form action='' method='post'>
        <h1>Datos de usuario</h1>
        Usuario: <input type='text' name='user' id='user' placeholder='John Doe'><br>
        Contraseña: <input type='password' name='password' id='password' placeholder='John Doe'>
        <input type='submit' value='Enviar'>
    </form>";
    }
    ?>
    
</body>
</html>
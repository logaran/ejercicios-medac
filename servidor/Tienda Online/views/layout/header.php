<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imperio Quinqui T-Shirts</title>
    <link rel="stylesheet" href="<?=base_url?>/assets/css/style.css">
</head>

<body>
    <div id="container">
        <!-- HEADER -->
        <header id="header">
            <div class="logo">
                <img src="<?=base_url?>/assets/img/logo.png" alt="Logo de Imperio Quinqui" height="100px">
                <a href="index.php">
                    Imperio Quinqui
                </a>
            </div>
        </header>

        <!-- MENU -->
        <?php $categorias = Utils::showCategorias(); ?>
        <nav id="menu">
            <ul>
                <li><a href="<?=base_url?>">Inicio</a></li>
                <?php while ($cat = $categorias->fetch_object()): ?>
                    <li><a href=""><?=$cat->nombre?></a></li>
                <?php endwhile; ?>
                
            </ul>
        </nav>
    
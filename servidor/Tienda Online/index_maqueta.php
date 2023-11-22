<!-- http://localhost/ejercicios-medac/servidor/Tienda%20Online/ -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imperio Quinqui T-Shirts</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div id="container">
        <!-- HEADER -->
        <header id="header">
            <div class="logo">
                <img src="./assets/img/logo.png" alt="Logo de Imperio Quinqui" height="100px">
                <a href="index.php">
                    Imperio Quinqui
                </a>
            </div>
        </header>

        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="">Categoría 1</a></li>
                <li><a href="">Categoría 2</a></li>
                <li><a href="">Categoría 3</a></li>
                <li><a href="">Categoría 4</a></li>
            </ul>
        </nav>

        <div id="content">
            <!-- ASIDE -->
            <aside id="lateral">
                <div class="login block_aside">
                    <h3>Acceder</h3>
                    <form action="#" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password">
                        <input type="submit" value="Enviar">
                    </form>
                    <ul>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="#">Gestionar pedidos</a></li>
                        <li><a href="#">Gestionar categorías</a></li>
                    </ul>

                </div>
            </aside>

            <!-- MAIN -->
            <main id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="./assets/img/quinqui3.jpg" alt="Camiseta Quinqui modelo 3">
                    <h2>Cruz de navajas</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="./assets/img/quinqui4.jpg" alt="Camiseta Quinqui modelo 3">
                    <h2>Marginal</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="./assets/img/quinqui6.jpg" alt="Camiseta Quinqui modelo 3">
                    <h2>Sound</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
            </main>

        </div>

        <!-- FOOTER -->
        <footer id="footer">
            <p>Desarrollado por Antonio Lozano Dev &copy; <?= date('Y'); ?></p>
        </footer>
    </div>

</body>

</html>
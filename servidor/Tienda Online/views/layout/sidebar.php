<div id="content">
    <!-- ASIDE -->
    <aside id="lateral">
        <div class="block_aside">
            <h3>Carrito</h3>
            <ul><a href="<?=base_url?>carrito/index">
                <?php $stats = Utils::statsCarrito(); ?>
                <li>Productos: <?=$stats['count']?></li>
                <li>Total: <?=$stats['total']?> €</li>
                </a>
                <li><a href="<?=base_url?>carrito/delete_all">Vaciar Carrito</a></li>
            </ul>

        </div>
        <div class="login block_aside">
            <?php if (!isset($_SESSION['identity'])) : ?>
                <h3>Acceder</h3>
                <form action="<?= base_url ?>usuarios/login" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="Enviar">
                </form>
                <a id="link_registro" href="<?=base_url?>usuarios/registro">Regístrate</a>
            <?php else : ?>
                <h3><?= $_SESSION['identity']->nombre . ' ' . $_SESSION['identity']->apellidos ?></h3>
            <?php endif; ?>
            <ul>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <li><a href="<?=base_url?>categorias/index">Gestionar categorías</a></li>
                    <li><a href="<?=base_url?>productos/gestion">Gestionar productos</a></li>
                    <li><a href="<?=base_url?>pedidos/gestion">Gestionar pedidos</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['identity'])) : ?>
                    <li><a href="<?=base_url?>pedidos/misPedidos">Mis pedidos</a></li>
                    <li><a href="<?=base_url?>usuarios/logout">Cerrar sesión</a></li>
                <?php endif; ?>

            </ul>

        </div>
    </aside>
    <main id="central">
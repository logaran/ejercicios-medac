<?php if (isset($_SESSION['identity']) && isset($_SESSION['carrito'])) : ?>
    <h1>Realizar pedido</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Comprobar carrito</a>
    </p>
    <br>
    <h3>Dirección de envío</h3>
    <form action="<?= base_url ?>pedidos/add" method="POST">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" require>

        <label for="localidad">Localidad</label>
        <input type="text" name="localidad" require>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" require>

        <input type="submit" value="Confirmar pedido">
    </form>
<?php else : ?>
    <?php
    $mensaje = isset($_SESSION['carrito']) ? 'Nesitas estar identificado' : 'El carrito está vacío';
    $texto = isset($_SESSION['carrito']) ? 'Identifícate para poder realizar un pedido' : 'Añade algunos artículos a tu carro de la compra';
    ?>
    <h1><?= $mensaje ?></h1>
    <p><?= $texto ?></p>
<?php endif; ?>
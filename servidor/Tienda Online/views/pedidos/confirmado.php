<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1>Pedido confirmado</h1>
    <p>Tu pedido ha sido guardado con éxito, una vez que realices el pago, será procesado y enviado.</p>
    <br>

    <?php if (isset($pedido)) : ?>
        <h3>Datos del pedido:</h3>
        Numero de pedido: <?= $pedido->id ?> <br>
        Total a pagar: <?= $pedido->coste ?> €<br>
        Productos:

        <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()) : ?>
            <tr>
                <?php $imgCamiseta = ($producto->imagen) ? base_url . "uploads/images/" . $producto->imagen : base_url . "assets/img/camiseta.webp" ?>
                <td><img src="<?= $imgCamiseta ?>" width="70px" /></td>
                <td><a href="<?= base_url ?>productos/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a></td>
                <td><?= $producto->precio ?></td>
                <td><?= $producto->unidades ?></td>
            </tr>
        <?php endwhile; ?>

    </table>

        <?php
       unset($_SESSION['pedido']);
       unset($_SESSION['carrito']);
        ?>
    <?php endif; ?>
<?php else : ?>
    <h1>Tu pedido ha fallado</h1>
    <p>Algún error desconocido ha impedido el registro del pedido.</p>

<?php endif; ?>